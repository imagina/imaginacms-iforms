<?php

namespace Modules\Iform\Http\Controllers\Api;

use Imagina\Icore\Http\Controllers\CoreApiController;
//Model
use Modules\Iform\Models\Field;
use Modules\Iform\Repositories\FieldRepository;

class FieldApiController extends CoreApiController
{
  public function __construct(Field $model, FieldRepository $modelRepository)
  {
    parent::__construct($model, $modelRepository);
  }
}
