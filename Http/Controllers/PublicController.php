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


    public function store()
    {

        $response = array();
        $response['status']='error'; //default
        $response['data']=array(); //default

        try {

            $data = Request::all();
            Log::info(var_export($data, true));
            $this->form = Form::find($data['form_id']);
            if (empty($this->form->id)) {
                throw new Exception(trans('iforms::common.forms_not_found'));
            }

            $this->form->fields = $this->form->fields;

            $attr = array();
            $attr['form_id'] = $this->form->id;
            $attr['options'] = array();

            if (array_key_exists('g-recaptcha-response', $data)) {

                $validator = \Validator::make($data, [
                    'g-recaptcha-response' => 'required|captcha'
                ]);
                if ($validator->fails()) {
                    $response['status']="fail";
                    $response['data']["g-recaptcha-response"] = trans('iforms::common.captcha_required');
                }

            }


            foreach ($this->form->fields as $field) {

                if (!empty($field['name']) && !empty($data[$field['name']])) {
                    if ($field['name'] == 'email') {
                        $replyto = $data['email'];
                    } else {
                        $replyto = env('MAIL_FROM_ADDRESS');
                    }
                    if ($field['name'] == 'name') {
                        $replytoname = $data['name'];
                    } else {
                        $replytoname = 'Client';
                    }

                    $attr['options'][$field['name']] = $data[$field['name']];
                }
            }

            //TODO: Verify required parameters here.

            if($response['status']=="fail") {
                return response()->json($response);
            }


            $attr['options'] = json_encode($attr['options']);

            Lead::create($attr);

            /**
             * Send email
             */

            $emails = explode(',', $this->setting->get('iforms::form-emails'));
            if (isset($this->form->options->destination_email) && !empty($this->form->options->destination_email)) {
                array_push($emails, $this->form->options->destination_email);
            }

            $from = $this->setting->get('iforms::from-email');
            if (empty($from)) {
                $from = env('MAIL_FROM_ADDRESS');
            }
            $sender = $this->setting->get('core::site-name');
            $title = $this->form->title;
            Mail::send("iforms::frontend.emails.form",
                [
                    'data' => $data,
                    'form' => $this->form,
                ], function ($message) use ($emails, $sender, $title, $from, $replyto, $replytoname) {
                    $message->to($emails, $sender)
                        ->replyTo($replyto, $replytoname)
                        ->from($from, $sender)
                        ->subject($title);
                });


            $response['status'] = 'success';
            //$response['message'] = '';

        } catch (\Throwable $t) {
            //var_dump($t);
            $response['status'] = 'error';
            $response['message'] = $t->getMessage();
            Log::error($response);
        }


        return response()->json($response);


    }

}
