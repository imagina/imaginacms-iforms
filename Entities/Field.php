<?php

namespace Modules\Iforms\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;
use Modules\Iforms\Presenters\FieldPresenter;

class Field extends Model
{
  use Translatable, PresentableTrait;

  protected $table = 'iforms__fields';

  public $translatedAttributes = [
    'label',
    'placeholder',
    'description',
  ];
  protected $fillable = [
    'type',
    'name',
    'required',
    'form_id',
    'selectable',
    'order',
  ];

  protected $presenter = FieldPresenter::class;

  protected $casts = [
    'selectable' => 'array'
  ];

  public function form()
  {
    return $this->belongsTo(Form::class);
  }

  public function getSelectableAttribute($value)
  {
    return json_decode($value);
  }

  public function setSelectableAttribute($value)
  {
    $this->attributes['selectable'] = json_encode($value);
  }


}
