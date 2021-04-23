<?php


namespace Modules\Iforms\Events\Handlers;


use Illuminate\Support\Arr;

class HandleFormeable
{
    public function handle($event = null, $data = [])
    {
        $entity = $event->getEntity();
        $forms = Arr::get($event->getSubmissionData(), 'forms', []);
        count($forms) > 0 ? $entity->forms()->sync($forms) : $entity->forms()->detach();
    }

}
