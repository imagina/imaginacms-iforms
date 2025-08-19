<?php

namespace Modules\Iform\Events\Handlers;



class DeleteFormeable
{

    public function handle($event)
    {

        // All params Event
        $params = $event->params;

        // Get specific data
        $dataFromRequest = $params['data'];
        $model = $params['model'];

        //Delete form
        $model->form()->detach();
    }
}
