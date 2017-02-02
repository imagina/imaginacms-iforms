<?php

namespace Modules\Iforms\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Modules\Bcrud\Support\Traits\CrudTrait;

class Form extends Model
{

    use CrudTrait;

    protected $table = 'iforms_forms';

    protected $fillable = ['title','user_id','options','fields'];


    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'options' => 'array',
        'fields' => 'array'
    ];


    public function user()
    {
        $driver = config('asgard.user.config.driver');

        return $this->belongsTo("Modules\\User\\Entities\\{$driver}\\User");
    }


    public function leads()
    {
        return $this->hasMany("Modules\\Iforms\\Entities\\Lead");
    }


}
