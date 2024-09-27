<?php

namespace Modules\Iforms\Transformers;

use Modules\Core\Icrud\Transformers\CrudResource;

class LeadTransformer extends CrudResource
{
  /**
  * Method to merge values with response
  *
  * @return array
  */
  public function modelAttributes($request)
  {

    
    $form = $this->form;
    $fields = $form->fields ?? [];

    foreach($fields as $field){
      if($field->type == 12) { //FILE
        $data["values"][$field->name] = url($data["values"][$field->name] ?? '');
      }
    }
     
    return $data ?? [];

  }
}
