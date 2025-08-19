<?php

namespace Modules\Iform\Http\Controllers\Api;

use Imagina\Icore\Http\Controllers\CoreApiController;
//Model
use Modules\Iform\Models\Block;
use Modules\Iform\Repositories\BlockRepository;

class BlockApiController extends CoreApiController
{
  public function __construct(Block $model, BlockRepository $modelRepository)
  {
    parent::__construct($model, $modelRepository);
  }
}
