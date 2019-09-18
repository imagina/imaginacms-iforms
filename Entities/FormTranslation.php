<?php

namespace Modules\Iform\Entities;

use Illuminate\Database\Eloquent\Model;

class FormTranslation extends Model
{
    public $timestamps = false;

    protected $fillable = [
      'title'
    ];

    protected $table = 'iform__form_translations';
}
