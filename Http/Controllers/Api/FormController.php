<?php


namespace Modules\Iforms\Http\Controllers\Api;

use Modules\Ihelpers\Http\Controllers\Api\BaseApiController;
use Mockery\CountValidator\Exception;
use Modules\Iforms\Entities\Lead;
use Modules\Iforms\Entities\Form;
use Illuminate\Support\Facades\Mail;
use Modules\Setting\Contracts\Setting;
use Illuminate\Contracts\Foundation\Application;
use Request;
use Log;
class FormController extends BaseApiController
{
    private $app;
    private $form;
    private $setting;

    public function __construct(Application $app, Setting $setting)
    {

        $this->app = $app;
        $this->setting = $setting;
        parent::__construct();
    }


    public function send()
    {

        $response = array();
        $response['status']='error'; //default
        $response['data']=array(); //default

        try {

            $data = Request::input('attributes');
            Log::info(var_export($data, true));
            $this->form = Form::find($data['form_id']);
            if (empty($this->form->id)) {
                throw new Exception(trans('iforms::common.forms_not_found'));
            }

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
            Mail::send(['iforms::frontend.emails.form', 'iforms::frontend.emails.textform'],
                [
                    'data' => $data,
                    'form' => $this->form,
                ], function ($message) use ($emails, $sender, $title, $from, $replyto, $replytoname) {
                    $message->to($emails, $sender)
                        ->replyTo($replyto, $replytoname)
                        ->from($from, $sender)
                        ->subject($title);
                });


            $status = 200;
            $response = [
                'susses' => [
                    'code' => '201',
                    "source" => [],
                    "title" => trans('core::core.messages.resource created', ['name' => trans('iforms::forms.sendEmail')]),
                    "detail" => [
                        'id' => $this->form->id
                    ]
                ]
            ];

        } catch (\Throwable $t) {
            //var_dump($t);
            $response['status'] = 'error';
            $response['message'] = $t->getMessage();
            Log::error($response);
        }


        return response()->json($response, $status ?? 200);

    }

}