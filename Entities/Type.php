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


  public function __construct()
  {
    $this->records = [
      self::TEXT => [
        'id' => self::TEXT,
        'name' => trans('iforms::common.types.text'),
        'value' => 'text'
      ],
      self::TEXTAREA => [
        'id' => self::TEXTAREA,
        'name' => trans('iforms::common.types.textarea'),
        'value' => 'textarea'
      ],
      self::NUMBER => [
        'id' => self::NUMBER,
        'name' => trans('iforms::common.types.number'),
        'value' => 'number'
      ],
      self::EMAIL => [
        'id' => self::EMAIL,
        'name' => trans('iforms::common.types.email'),
        'value' => 'email'
      ],
      self::SELECT => [
        'id' => self::SELECT,
        'name' => trans('iforms::common.types.select'),
        'value' => 'select'
      ],
      self::SELECT_MULTIPLE => [
        'id' => self::SELECT_MULTIPLE,
        'name' => trans('iforms::common.types.selectmultiple'),
        'value' => 'selectmultiple'
      ],
      self::CHECKBOX => [
        'id' => self::CHECKBOX,
        'name' => trans('iforms::common.types.checkbox'),
        'value' => 'checkbox'
      ],
      self::RADIO => [
        'id' => self::RADIO,
        'name' => trans('iforms::common.types.radio'),
        'value' => 'radio'
      ],
      self::LOCATION => [
        'id' => self::LOCATION,
        'name' => trans('iforms::common.types.location'),
        'value' => 'location'
      ],
      self::PHONE => [
        'id' => self::PHONE,
        'name' => trans('iforms::common.types.phone'),
        'value' => 'phone'
      ],
      self::DATE => [
        'id' => self::DATE,
        'name' => trans('iforms::common.types.date'),
        'value' => 'date'
      ],
      self::FILE => [
        'id' => self::FILE,
        'name' => trans('iforms::common.types.file'),
        'value' => 'file'
      ],
      self::TREE_SELECT => [
        'id' => self::TREE_SELECT,
        'name' => trans('iforms::common.types.treeSelect'),
        'value' => 'treeSelect'
      ],
      self::HIDDEN => [
        'id' => self::HIDDEN,
        'name' => trans('iforms::common.types.hidden'),
        'value' => 'hidden'
      ],
    ];
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
