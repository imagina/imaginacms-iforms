<?php

namespace Modules\Iform\Http\Controllers\Api;

use Imagina\Icore\Http\Controllers\CoreApiController;
//Model
use Modules\Iform\Models\Lead;
use Modules\Iform\Repositories\LeadRepository;

class LeadApiController extends CoreApiController
{
  public function __construct(Lead $model, LeadRepository $modelRepository)
  {
    parent::__construct($model, $modelRepository);
  }
}
