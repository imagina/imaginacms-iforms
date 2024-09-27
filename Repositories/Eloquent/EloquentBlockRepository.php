<?php

namespace Modules\Iforms\Repositories\Eloquent;

use Modules\Iforms\Repositories\BlockRepository;
use Modules\Core\Icrud\Repositories\Eloquent\EloquentCrudRepository;

class EloquentBlockRepository extends EloquentCrudRepository implements BlockRepository
{
  /**
   * Filter names to replace
   * @var array
   */
  protected $replaceFilters = [];

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

    if (isset($filter->search)) { //si hay que filtrar por rango de precio
      $criterion = $filter->search;
      $param = explode(' ', $criterion);
      $criterion = $filter->search;
      //find search in columns
      $query->where(function ($query) use ($filter, $criterion) {
        $query->whereHas('translations', function (Builder $q) use ($criterion) {
          $q->where('title', 'like', "%{$criterion}%");
        });
      })->orWhere('id', 'like', '%' . $filter->search . '%');
    }

    if (isset($filter->ids)) {
      is_array($filter->ids) ? true : $filter->ids = [$filter->ids];
      $query->whereIn('iform__blocks.id', $filter->ids);
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

  public function batchUpdate($data)
  {
    $blocks = [];
    foreach ($data as $block) {

      $model = $this->model->find($block['id']);

      if (isset($model->id))
        $model->update((array)$block);

    }
    return $blocks;
  }
  
}
