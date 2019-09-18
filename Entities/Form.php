<?php

namespace Modules\Iform\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
  use Translatable;

  protected $table = 'iform__forms';

  public $translatedAttributes = [
    'title'
  ];

  protected $fillable = [
    'user_id',
    'options',
  ];

  protected $casts = [
    'options' => 'array'
  ];

  public function fields()
  {
    return $this->hasMany(Field::class);
  }

  public function lead()
  {
    return $this->hasMany(Lead::class);
  }
}
