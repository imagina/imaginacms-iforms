<?php

namespace Modules\Iform\Models;

use Imagina\Icore\Models\CoreStaticModel;

class Type extends CoreStaticModel
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
    const FIRST_NAME = 15;
    const LAST_NAME = 16;

    public function __construct()
    {
        $this->records = [
            self::TEXT => [
                'id' => self::TEXT,
                'name' => itrans('iform::type.types.text'),
                'value' => 'text'
            ],
            self::TEXTAREA => [
                'id' => self::TEXTAREA,
                'name' => itrans('iform::type.types.textarea'),
                'value' => 'textarea'
            ],
            self::NUMBER => [
                'id' => self::NUMBER,
                'name' => itrans('iform::type.types.number'),
                'value' => 'number'
            ],
            self::EMAIL => [
                'id' => self::EMAIL,
                'name' => itrans('iform::type.types.email'),
                'value' => 'email'
            ],
            self::SELECT => [
                'id' => self::SELECT,
                'name' => itrans('iform::type.types.select'),
                'value' => 'select'
            ],
            self::SELECT_MULTIPLE => [
                'id' => self::SELECT_MULTIPLE,
                'name' => itrans('iform::type.types.selectmultiple'),
                'value' => 'selectmultiple'
            ],
            self::CHECKBOX => [
                'id' => self::CHECKBOX,
                'name' => itrans('iform::type.types.checkbox'),
                'value' => 'checkbox'
            ],
            self::RADIO => [
                'id' => self::RADIO,
                'name' => itrans('iforms::type.types.radio'),
                'value' => 'radio'
            ],
            self::LOCATION => [
                'id' => self::LOCATION,
                'name' => itrans('iform::type.types.location'),
                'value' => 'location'
            ],
            self::PHONE => [
                'id' => self::PHONE,
                'name' => itrans('iform::type.types.phone'),
                'value' => 'phone'
            ],
            self::DATE => [
                'id' => self::DATE,
                'name' => itrans('iform::type.types.date'),
                'value' => 'date'
            ],
            self::FILE => [
                'id' => self::FILE,
                'name' => itrans('iform::type.types.file'),
                'value' => 'file'
            ],
            self::TREE_SELECT => [
                'id' => self::TREE_SELECT,
                'name' => itrans('iform::type.types.treeSelect'),
                'value' => 'treeSelect'
            ],
            self::HIDDEN => [
                'id' => self::HIDDEN,
                'name' => itrans('iform::type.types.hidden'),
                'value' => 'hidden'
            ],
            self::FIRST_NAME => [
                'id' => self::FIRST_NAME,
                'name' => itrans('iform::type.types.firstName'),
                'value' => 'text'
            ],
            self::LAST_NAME => [
                'id' => self::LAST_NAME,
                'name' => itrans('iform::type.types.lastName'),
                'value' => 'text'
            ],
        ];
    }


    /*
    * GET id by value (email,phone......) | Important: Lo utilizan en un filtro
    */
    public function getIdByValue($value)
    {
        $item = collect($this->records)->where('value', $value)->first();
        return $item['id'] ?? null;
    }
}
