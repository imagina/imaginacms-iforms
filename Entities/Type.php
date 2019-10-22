<?php

namespace Modules\Iforms\Entities;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
  const TEXT = 1;
  const TEXTAREA = 2;
  const NUMBER = 3;
  const EMAIL = 4;
  const SELECT = 5;
  const SELECTMULTIPLE = 6;
  const CHECKBOX = 7;
  const RADIO = 8;
  const LOCATION = 9;

  /**
   * @var array
   */
  private $types = [];

  public function __construct()
  {
    $this->types = [
      [
        'id' => self::TEXT,
        'name' => trans('iforms::common.types.text'),
      ],
      [
        'id' => self::TEXTAREA,
        'name' => trans('iforms::common.types.textarea'),
      ],
      [
        'id' => self::NUMBER,
        'name' => trans('iforms::common.types.number'),
      ],
      [
        'id' => self::EMAIL,
        'name' => trans('iforms::common.types.email'),
      ],
      [
        'id' => self::SELECT,
        'name' => trans('iforms::common.types.select'),
      ],
      [
        'id' => self::SELECTMULTIPLE,
        'name' => trans('iforms::common.types.selectmultiple'),
      ],
      [
        'id' => self::CHECKBOX,
        'name' => trans('iforms::common.types.checkbox'),
      ],
      [
        'id' => self::RADIO,
        'name' => trans('iforms::common.types.radio'),
      ],
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
    $id --;
    if (isset($this->types[$id])) {
      return $this->types[$id];
    }
    return $this->types[self::TEXT];
  }
}
