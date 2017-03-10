<?php

use Modules\Iforms\Entities\Form;

if (! function_exists('iform')) {

    function iform($id,$template,$options=array()) {

        $iform = Form::find($id);

        $view = View::make($template)
            ->with([
                'form' => $iform,
                'options' => $options,
            ]);
        return $view->render();
    }
}