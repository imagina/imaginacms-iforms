<?php
if (! function_exists('iform')) {
    function iform($id,$templates,$options=array()) {

        $iform = Form::find($id);
        $view = View::make($templates)
            ->with([
                'form' => $iform,
                'options' => $options,
            ]);
        return $view->render();
    }
}