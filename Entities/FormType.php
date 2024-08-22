<?php

namespace Modules\Iforms\Entities;

use Modules\Core\Icrud\Entities\CrudStaticModel;

class FormType extends CrudStaticModel
{
  const NORMAL = 1;
  const STEPS = 2;

  public function __construct()
  {
    $this->records = [
      self::NORMAL => [
        'id' => self::NORMAL,
        'name' => trans('iforms::common.formTypes.normal'),
        'value' => 'normal'
      ],
      self::STEPS => [
        'id' => self::STEPS,
        'name' => trans('iforms::common.formTypes.steps'),
        'value' => 'steps'
      ]
    ];
  }

  
}
