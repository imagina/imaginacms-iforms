<?php

namespace Modules\Iforms\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Modules\Bcrud\Support\Traits\CrudTrait;

class Lead extends Model
{

    use CrudTrait;

    protected $table = 'iforms_leads';

    protected $fillable = ['options','form_id'];

    protected $fakeColumns = ['options'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'options' => 'array'
    ];


    public function form()
    {
        return $this->belongsTo(Form::class);
    }



}
