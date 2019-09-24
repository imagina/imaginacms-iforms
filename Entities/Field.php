<?php

namespace Modules\Iform\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;
use Modules\Iform\Presenters\FieldPresenter;

class Field extends Model
{
  use Translatable, PresentableTrait;

  protected $table = 'iform__fields';

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


}
