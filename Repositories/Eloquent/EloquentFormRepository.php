<?php

namespace Modules\Iforms\Repositories\Eloquent;

use Illuminate\Support\Arr;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;
use Modules\Iforms\Repositories\FormRepository;
use Stancl\Tenancy\Database\Concerns\BelongsToTenant;
use Modules\Iforms\Entities\Form;

class EloquentFormRepository extends EloquentBaseRepository implements FormRepository
{
  public function getItemsBy($params)
  {
    // INITIALIZE QUERY
    $query = $this->model->query();
    /*== RELATIONSHIPS ==*/
    if (in_array('*', $params->include ?? [])) {//If Request all relationships
      $query->with([]);
    } else {//Especific relationships
      $includeDefault = ['translations','fields','fields.translations'];//Default relationships
      if (isset($params->include))//merge relations with default relationships
        $includeDefault = array_merge($includeDefault, $params->include);
      $query->with($includeDefault);//Add Relationships to query
    }
    // FILTERS
    if ($params->filter) {
      $filter = $params->filter;
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
      //Filter by date
      if (isset($filter->date)) {
        $date = $filter->date;//Short filter date
        $date->field = $date->field ?? 'created_at';
        if (isset($date->from))//From a date
          $query->whereDate($date->field, '>=', $date->from);
        if (isset($date->to))//to a date
          $query->whereDate($date->field, '<=', $date->to);
      }
      //Order by
      if (isset($filter->order)) {
        $orderByField = $filter->order->field ?? 'created_at';//Default field
        $orderWay = $filter->order->way ?? 'desc';//Default way
        $query->orderBy($orderByField, $orderWay);//Add order to query
      }
      //Filter by parent ID
      if (isset($filter->userId) && !empty($filter->userId)) {
        $query->where("user_id", $filter->userId);
      }

      if (isset($filter->id)) {
        !is_array($filter->id) ? $filter->id = [$filter->id] : false;
        $query->where('id', $filter->id);
      }

      if (in_array("parentId",array_keys(get_object_vars($filter)))) {
        $query->where('parent_id', $filter->parentId);
      }
      
    }

    if (isset($this->model->tenantWithCentralData) && $this->model->tenantWithCentralData && isset(tenant()->id)) {
      $model = $this->model;

      $query->withoutTenancy();
      $query->where(function ($query) use ($model) {
        $query->where($model->qualifyColumn(BelongsToTenant::$tenantIdColumn), tenant()->getTenantKey())
          ->orWhereNull($model->qualifyColumn(BelongsToTenant::$tenantIdColumn));
      });
    }

    /*== FIELDS ==*/
    if (isset($params->fields) && count($params->fields))
      $query->select($params->fields);
    /*== REQUEST ==*/
    if (isset($params->page) && $params->page) {
      return $query->paginate($params->take);
    } else {
      isset($params->take) && $params->take ? $query->take($params->take) : false;//Take
      return $query->get();
    }
  }

  public function getItem($criteria, $params = false)
  {

    // INITIALIZE QUERY
    $query = $this->model->query();
    /*== RELATIONSHIPS ==*/
    if (in_array('*', $params->include ?? [])) {//If Request all relationships
      $query->with([]);
    } else {//Especific relationships
      $includeDefault = ['translations','fields','fields.translations'];//Default relationships
      if (isset($params->include))//merge relations with default relationships
        $includeDefault = array_merge($includeDefault, $params->include);
      $query->with($includeDefault);//Add Relationships to query
    }
    /*== FIELDS ==*/
    if (isset($params->fields) && count($params->fields))
      $query->select($params->fields);
    /*== FILTER ==*/
    if (isset($params->filter)) {
      $filter = $params->filter;
      if (isset($filter->field))//Filter by specific field
        $field = $filter->field;
      // find translatable attributes
      $translatedAttributes = $this->model->translatedAttributes;
      // filter by translatable attributes
      if (isset($field) && in_array($field, $translatedAttributes))//Filter by slug
        $query->whereHas('translations', function ($query) use ($criteria, $filter, $field) {
          $query->where('locale', $filter->locale)
            ->where($field, $criteria);
        });
      else
        // find by specific attribute or by id
        $query->where($field ?? 'id', $criteria);

      if (isset($filter->organizationId) && !empty($filter->organizationId)) {
        $query->where("organization_id", $filter->organizationId);
      }

      //Filter by not organization
      if (isset($filter->notOrganization) && !empty($filter->notOrganization)) {
        $query->withoutTenancy();
      }


    }

    if (isset($this->model->tenantWithCentralData) && $this->model->tenantWithCentralData && isset(tenant()->id)) {
      $model = $this->model;

      $query->withoutTenancy();
      $query->where(function ($query) use ($model) {
        $query->where($model->qualifyColumn(BelongsToTenant::$tenantIdColumn), tenant()->getTenantKey())
          ->orWhereNull($model->qualifyColumn(BelongsToTenant::$tenantIdColumn));
      });
    }

    if (!isset($params->filter->field)) {
      $query->where('id', $criteria);
    }

    /*== REQUEST ==*/
    return $query->first();
  }

  public function create($data)
  {
    $form = $this->model->create($data);
    if ($form) {
      $form->fields()->update(Arr::get($data, 'fields', []));
    }
    return $form;
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
