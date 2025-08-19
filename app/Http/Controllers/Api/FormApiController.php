<?php

namespace Modules\Iform\Http\Controllers\Api;

use Imagina\Icore\Http\Controllers\CoreApiController;
//Model
use Modules\Iform\Models\Form;
use Modules\Iform\Repositories\FormRepository;

class FormApiController extends CoreApiController
{
  public function __construct(Form $model, FormRepository $modelRepository)
  {
    parent::__construct($model, $modelRepository);
  }
}
