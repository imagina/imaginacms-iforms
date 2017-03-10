<?php

namespace Modules\Iforms\Http\Controllers;

use Mockery\CountValidator\Exception;
use Modules\Iforms\Entities\Lead;
use Modules\Iforms\Entities\Form;
use Illuminate\Support\Facades\Mail;
use Modules\Setting\Contracts\Setting;
use Illuminate\Contracts\Foundation\Application;
use Modules\Core\Http\Controllers\BasePublicController;
use Request;
use Log;

class PublicController extends BasePublicController
{

    private $lead;

    /**
     * @var Application
     */
    private $app;
    private $form;
    private $setting;

    public function __construct(Application $app, Setting $setting)
    {

        $this->app = $app;
        $this->setting = $setting;
        //parent::__construct();
    }



    public function store() {

        $response = array();

        try {

            $data = Request::all();
            Log::info(var_export($data,true));
            $this->form = Form::find($data['form_id']);
            if(empty($this->form->id)) throw new Exception('Form not found');

            $this->form->fields = $this->form->fields;

            $attr = array();
            $attr['form_id'] = $this->form->id;
            $attr['options'] = array();

            foreach($this->form->fields as $field) {

                if(!empty($field['name']) && !empty($data[$field['name']])) $attr['options'][$field['name']] = $data[$field['name']];
            }


            $attr['options'] = json_encode($attr['options']);

            Lead::create($attr);

            $response['status'] = 'success';
            $response['msg']= '';

            /**
            * Send email
            */

            $emails  = explode(',',$this->setting->get('iforms::form-emails'));

            $sender  = $this->setting->get('core::site-name');
            $title     = $this->form->title;

            Mail::send("iforms::frontend.emails.form",
                [
                    'data' => $data,
                    'form' => $this->form,
                ], function($message) use ($emails,$sender,$title) {
                $message->to($emails, $sender)
                ->from($this->setting->get('iforms::from-email'), $sender)
                        ->subject($title);
            });

        } catch( \Throwable $t) {
            //var_dump($t);
            $response['status'] = 'error';
            $response['msg']= $t->getMessage();
        }



        return response()->json($response);


    }

}
