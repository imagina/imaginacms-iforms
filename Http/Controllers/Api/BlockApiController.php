<?php

namespace Modules\Iforms\Http\Controllers\Api;

use Modules\Core\Icrud\Controllers\BaseCrudController;
//Model
use Modules\Iforms\Entities\Block;
use Modules\Iforms\Repositories\BlockRepository;

class BlockApiController extends BaseCrudController
{
  public $model;
  public $modelRepository;

  public function __construct(Block $model, BlockRepository $modelRepository)
  {
    $this->model = $model;
    $this->modelRepository = $modelRepository;
  }

  public function batchUpdate (Request $request)
  {
    \DB::beginTransaction();
    try {
      $params = $this->getParamsRequest($request);
      
      $data = $request->input('attributes');
      
      //Update data
      $newData = $this->block->batchUpdate($data);
      //Response
      $response = ['data' => 'updated items'];
      \DB::commit(); //Commit to Data Base
    } catch (\Exception $e) {
      \DB::rollback();//Rollback to Data Base
      $status = $this->getStatusError($e->getCode());
      $response = ["errors" => $e->getMessage()];
    }
    return response()->json($response, $status ?? 200);
    
  }
  
}
