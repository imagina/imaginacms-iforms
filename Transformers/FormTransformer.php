<?php

namespace Modules\Iforms\Transformers;

use Modules\Core\Icrud\Transformers\CrudResource;

class FormTransformer extends CrudResource
{
  /**
  * Method to merge values with response
  *
  * @return array
  */
  public function modelAttributes($request)
  {
    return [];
  }
}
