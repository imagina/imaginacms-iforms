<?php

namespace Modules\Iform\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
  use Translatable;

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
    'parent_id',
    'form_id',
  ];

  public function form()
  {
    return $this->belongsTo(Form::class);
  }
}
