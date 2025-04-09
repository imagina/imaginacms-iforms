<?php

namespace Modules\Iforms\Repositories\Eloquent;

use Modules\Iforms\Repositories\FormRepository;
use Modules\Core\Icrud\Repositories\Eloquent\EloquentCrudRepository;

class EloquentFormRepository extends EloquentCrudRepository implements FormRepository
{
  /**
   * Filter names to replace
   * @var array
   */
  protected $replaceFilters = ['userId'];

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
  protected $with = ['all' => ['translations','fields','fields.translations']];

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

    //Filter by parent ID
    if (isset($filter->userId) && !empty($filter->userId)) {
      $query->where("user_id", $filter->userId);
    }

    //add filter by search
    if (isset($filter->search)) {
      //find search in columns
      $query->where(function ($query) use ($filter) {
        $query->whereHas('translations', function ($query) use ($filter) {
          $query->where('locale', $filter->locale)
            ->where('title', 'like', $filter->search . '%');
        })->orWhere('id', 'like', $filter->search . '%')->orWhere('system_name', 'like', $filter->search . '%');
      });
    }

    if (isset($this->model->tenantWithCentralData) && $this->model->tenantWithCentralData && isset(tenant()->id)) {
      $model = $this->model;

      $query->withoutTenancy();
      $query->where(function ($query) use ($model) {
        $query->where($model->qualifyColumn(BelongsToTenant::$tenantIdColumn), tenant()->getTenantKey())
          ->orWhereNull($model->qualifyColumn(BelongsToTenant::$tenantIdColumn));
      });
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

    //Create model
    $model = $this->model->create($data);

    if($model) {
      $model->fields()->update(\Arr::get($data, 'fields', []));
    }

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

  /**
  * @param string $systemName
  * @return Slider
  */
  public function findBySystemName($systemName)
  {
    return $this->model->with('translations', 'fields')->where('system_name', '=', $systemName)->first();
  }


}
