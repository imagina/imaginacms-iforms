<?php

namespace Modules\Iform\Entities;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
  const TEXT = 0;
  const NUMBER = 1;


  /**
   * @var array
   */
  private $types = [];

  public function __construct()
  {
    $this->types = [
      self::TEXT => trans('iform::common.types.text'),
      self::NUMBER => trans('iform::common.types.number'),
    ];
  }

  /**
   * Get the available statuses
   * @return array
   */
  public function lists()
  {
    return $this->types;
  }

  /**
   * Get the post status
   * @param int $id
   * @return string
   */
  public function get($id)
  {
    if (isset($this->types[$id])) {
      return $this->types[$id];
    }
    return $this->types[self::TEXT];
  }
}
