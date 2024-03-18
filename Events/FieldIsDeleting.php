<?php


namespace Modules\Iforms\Events;


class FieldIsDeleting
{
  public $model;

  public function __construct($model)
  {
    $this->model = $model;
  }

  /**
   * Return the entity
   * @return \Illuminate\Database\Eloquent\Model
   */
  public function getEntity()
  {
    return $this->model;
  }

  /**
   * Return the ALL data sent
   * @return array
   */
  public function getSubmissionData()
  {
    return [];
  }

}
