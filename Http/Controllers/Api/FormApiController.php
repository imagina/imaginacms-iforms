<?php

namespace Modules\Iforms\Http\Controllers\Api;

use Modules\Core\Icrud\Controllers\BaseCrudController;
use Illuminate\Http\Request;
//Model
use Modules\Iforms\Entities\Form;
use Modules\Iforms\Repositories\FormRepository;
use Modules\Core\Icrud\Transformers\CrudResource;

class FormApiController extends BaseCrudController
{
  public $model;
  public $modelRepository;

  public function __construct(Form $model, FormRepository $modelRepository)
  {
    $this->model = $model;
    $this->modelRepository = $modelRepository;
  }

  /**
   * Controller to create model
   *
   * @param Request $request
   * @return mixed
   */
  public function create(Request $request)
  {
    \DB::beginTransaction();
    try {
      //Get model data
      $modelData = $request->input('attributes') ?? [];

      //Validate Request
      if (isset($this->model->requestValidation['create'])) {
        $this->validateRequestApi(new $this->model->requestValidation['create']($modelData));
      }

      //validate customLeadPDFTemplate
      if(isset($modelData["options"]) && isset($modelData["options"]["customLeadPDFTemplate"]))
        if(!empty($modelData["options"]["customLeadPDFTemplate"]) && !view()->exists($modelData["options"]["customLeadPDFTemplate"]))
          throw new \Exception(trans("iforms::forms.messages.customLeadPDFTemplateExist"),400);

      //Create model
      $model = $this->modelRepository->create($modelData);

      //Response
      $response = ["data" => CrudResource::transformData($model)];
      \DB::commit(); //Commit to Data Base
    } catch (\Exception $e) {
      \DB::rollback();//Rollback to Data Base
      $status = $this->getStatusError($e->getCode());
      $response = $status == 409 ? json_decode($e->getMessage()) :
        ['messages' => [['message' => $e->getMessage(), 'type' => 'error']]];
    }
    //Return response
    return response()->json($response ?? ["data" => "Request successful"], $status ?? 200);
  }

  /**
   * Controller to update model by criteria
   *
   * @param $criteria
   * @param Request $request
   * @return mixed
   */
  public function update($criteria, Request $request)
  {
    \DB::beginTransaction(); //DB Transaction
    try {
      //Get model data
      $modelData = $request->input('attributes') ?? [];
      //Get Parameters from URL.
      $params = $this->getParamsRequest($request);

      //auto-insert the criteria in the data to update
      isset($params->filter->field) ? $field = $params->filter->field : $field = "id";
      $data[$field] = $criteria;

      //Validate Request
      if (isset($this->model->requestValidation['update'])) {
        $this->validateRequestApi(new $this->model->requestValidation['update']($modelData));
      }

      //validate customLeadPDFTemplate
      if(isset($modelData["options"]) && isset($modelData["options"]["customLeadPDFTemplate"]))
        if(!empty($modelData["options"]["customLeadPDFTemplate"]) && !view()->exists($modelData["options"]["customLeadPDFTemplate"]))
          throw new \Exception(trans("iforms::forms.messages.customLeadPDFTemplateExist"),400);

      //Update model
      $model = $this->modelRepository->updateBy($criteria, $modelData, $params);

      //Throw exception if no found item
      if (!$model) throw new \Exception('Item not found', 204);

      //Response
      $response = ["data" => CrudResource::transformData($model)];
      \DB::commit();//Commit to DataBase
    } catch (\Exception $e) {
      \DB::rollback();//Rollback to Data Base
      $status = $this->getStatusError($e->getCode());
      $response = $status == 409 ? json_decode($e->getMessage()) :
        ['messages' => [['message' => $e->getMessage(), 'type' => 'error']]];
    }

    //Return response
    return response()->json($response ?? ["data" => "Request successful"], $status ?? 200);
  }

}
