<?php


namespace Modules\Iforms\Events\Handlers;

class HandleFormeable
{
    public function handle($event = null)
    {
  
      $data = $event->data;
      $entity = $event->entity;
      
        if(!\Schema::hasTable('iforms__formeable')) return;
        if (isset($data['form_id'])) {
        $entity->forms()->sync([$data['form_id']]);
        } else {
        $entity->forms()->sync([]);
      
    }
    }
}
