<?php

namespace Modules\Iforms\Repositories\Eloquent;

use Modules\Iforms\Repositories\FieldRepository;
use Modules\Core\Icrud\Repositories\Eloquent\EloquentCrudRepository;

use Modules\Iforms\Entities\Type;

class EloquentFieldRepository extends EloquentCrudRepository implements FieldRepository
{
  /**
   * Filter names to replace
   * @var array
   */
  protected $replaceFilters = ['type'];

  /**
   * Relation names to replace
   * @var array
   */
  protected $replaceSyncModelRelations = [];

  /**
   * Attribute to define default relations
   * all apply to index and show
   * index apply in the getItemsBy
   * show apply in the getItem
   * @var array
   */
  protected $with = ['all' => [] ,'index' => ['translations'],'show' => ['translations']];

  /**
   * Filter query
   *
   * @param $query
   * @param $filter
   * @param $params
   * @return mixed
   */
  public function filterQuery($query, $filter, $params)
  {

    /**
     * Note: Add filter name to replaceFilters attribute before replace it
     *
     * Example filter Query
     * if (isset($filter->status)) $query->where('status', $filter->status);
     *
     */

    if (isset($filter->search)) {
      //find search in columns
      $query->where(function ($query) use ($filter) {
        $query->whereHas('translations', function ($query) use ($filter) {
          $query->where('locale', $filter->locale)
            ->where('label', 'like', '%' . $filter->search . '%');
        })->orWhere('id', 'like', '%' . $filter->search . '%')
          ->orWhere('updated_at', 'like', '%' . $filter->search . '%')
          ->orWhere('created_at', 'like', '%' . $filter->search . '%');
      });
    }

     //Filter by type ID
     if (isset($filter->typeId) && !empty($filter->typeId)) {
      $query->where("type", $filter->typeId);
    }

    //Filter by type
    if (isset($filter->type) && !empty($filter->type)) {

      $type = new Type();
      $typeId = $type->getIdByValue($filter->type);

      if (!is_null($typeId))
        $query->where("type", $typeId);
      else
        throw new \Exception('Type not found', 404);

    }

    //Response
    return $query;
  }

  /**
   * Method to sync Model Relations
   *
   * @param $model ,$data
   * @return $model
   */
  public function syncModelRelations($model, $data)
  {
    //Get model relations data from attribute of model
    $modelRelationsData = ($model->modelRelations ?? []);

    /**
     * Note: Add relation name to replaceSyncModelRelations attribute before replace it
     *
     * Example to sync relations
     * if (array_key_exists(<relationName>, $data)){
     *    $model->setRelation(<relationName>, $model-><relationName>()->sync($data[<relationName>]));
     * }
     *
     */

    //Response
    return $model;
  }

  /**
   * Method to create model
   *
   * @param $data
   * @return mixed
   */
  public function create($data)
  {
    //Event creating model
    $this->dispatchesEvents(['eventName' => 'creating', 'data' => $data]);

    // Call function before create it, and take all change from $data
    $this->beforeCreate($data);

    $data["name"] = uniqid("f" . $data["form_id"] . "_b" . $data["block_id"] ?? "" . "_");

    //Create model
    $model = $this->model->create($data);

    // Default sync model relations
    $model = $this->defaultSyncModelRelations($model, $data);

    // Custom sync model relations
    $model = $this->syncModelRelations($model, $data);

    // Call function after create it, and take all change from $data and $model
    $this->afterCreate($model, $data);

    //Event created model
    $this->dispatchesEvents(['eventName' => 'created', 'data' => $data, 'model' => $model]);

    //Response
    return $model;
  }

  public function updateOrders($data)
  {
    $fields = [];
    foreach ($data as $field) {
      $fields[] = $this->model->find($field['id'])->update($field);
    }
    return $fields;
  }

}
