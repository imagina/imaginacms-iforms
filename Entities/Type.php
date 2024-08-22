<?php

namespace Modules\Iforms\Entities;

use Illuminate\Database\Eloquent\Model;

use Modules\Core\Icrud\Entities\CrudStaticModel;

class Type extends CrudStaticModel
{
  const TEXT = 1;
  const TEXTAREA = 2;
  const NUMBER = 3;
  const EMAIL = 4;
  const SELECT = 5;
  const SELECT_MULTIPLE = 6;
  const CHECKBOX = 7;
  const RADIO = 8;
  const LOCATION = 9;
  const PHONE = 10;
  const DATE = 11;
  const FILE = 12;
  const TREE_SELECT = 13;
  const HIDDEN = 14;

  /**
   * @var array
   */
  protected $records = [];

  public function __construct()
  {
    $this->records = [
      [
        'id' => self::TEXT,
        'name' => trans('iforms::common.types.text'),
        'value' => 'text'
      ],
      [
        'id' => self::TEXTAREA,
        'name' => trans('iforms::common.types.textarea'),
        'value' => 'textarea'
      ],
      [
        'id' => self::NUMBER,
        'name' => trans('iforms::common.types.number'),
        'value' => 'number'
      ],
      [
        'id' => self::EMAIL,
        'name' => trans('iforms::common.types.email'),
        'value' => 'email'
      ],
      [
        'id' => self::SELECT,
        'name' => trans('iforms::common.types.select'),
        'value' => 'select'
      ],
      [
        'id' => self::SELECT_MULTIPLE,
        'name' => trans('iforms::common.types.selectmultiple'),
        'value' => 'selectmultiple'
      ],
      [
        'id' => self::CHECKBOX,
        'name' => trans('iforms::common.types.checkbox'),
        'value' => 'checkbox'
      ],
      [
        'id' => self::RADIO,
        'name' => trans('iforms::common.types.radio'),
        'value' => 'radio'
      ],
      [
        'id' => self::LOCATION,
        'name' => trans('iforms::common.types.location'),
        'value' => 'location'
      ],
      [
        'id' => self::PHONE,
        'name' => trans('iforms::common.types.phone'),
        'value' => 'phone'
      ],
      [
        'id' => self::DATE,
        'name' => trans('iforms::common.types.date'),
        'value' => 'date'
      ],
      [
        'id' => self::FILE,
        'name' => trans('iforms::common.types.file'),
        'value' => 'file'
      ],
      [
        'id' => self::TREE_SELECT,
        'name' => trans('iforms::common.types.treeSelect'),
        'value' => 'treeSelect'
      ],
      [
        'id' => self::HIDDEN,
        'name' => trans('iforms::common.types.hidden'),
        'value' => 'hidden'
      ],
    ];
  }

  /**
   * Get id | Important: Si se agrega el show genera un error de vistas, parece que necesitan un default
   * @param int $id
   * @return string
   */
  public function get($id)
  {
    $id--;
    if (isset($this->records[$id])) {
      return $this->records[$id];
    }
    return $this->records[0];
  }

  /*
  * GET id by value (email,phone......) | Important: Lo utilizan en un filtro
  */
  public function getIdByValue($value)
  {
    
    $onlyValues = array_column($this->records, 'value');
    $key = array_search($value, $onlyValues);
    if($key)
      return $this->records[$key]['id'];

    return null;
        
  }


}
