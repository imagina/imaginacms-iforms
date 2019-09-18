<?php

namespace Modules\Iform\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use Translatable;

    protected $table = 'iform__leads';
    public $translatedAttributes = [];
    protected $fillable = [];
}
