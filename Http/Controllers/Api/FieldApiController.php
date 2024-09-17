<?php

namespace Modules\Iforms\Http\Controllers\Api;

use Modules\Core\Icrud\Controllers\BaseCrudController;
//Model
use Modules\Iforms\Entities\Field;
use Modules\Iforms\Repositories\FieldRepository;

class FieldApiController extends BaseCrudController
{
  public $model;
  public $modelRepository;

  public function __construct(Field $model, FieldRepository $modelRepository)
  {
    $this->model = $model;
    $this->modelRepository = $modelRepository;
  }

  public function batchUpdate(Request $request)
  {
    \DB::beginTransaction();
    try {
      $params = $this->getParamsRequest($request);

      $data = $request->input('attributes');

      //Update data
      $newData = $this->resource->updateOrders($data);
      //Response
      $response = ['data' => 'updated items'];
      \DB::commit(); //Commit to Data Base
    } catch (\Exception $e) {
      \DB::rollback();//Rollback to Data Base
      $status = $this->getStatusError($e->getCode());
      $response = ["messages" => [["message" => $e->getMessage(), "type" => "error"]]];
    }
    return response()->json($response, $status ?? 200);

  }
  
}
