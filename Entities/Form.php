<?php

namespace Modules\Iform\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use Translatable;

    protected $table = 'iform__forms';
    public $translatedAttributes = [];
    protected $fillable = [];
}
