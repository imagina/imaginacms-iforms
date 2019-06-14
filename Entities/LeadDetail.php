<?php

namespace Modules\Iforms\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class LeadDetail extends Model
{

    protected $table = 'iforms_lead_details';

    protected $fillable = [
        'title',
        'options',
    ];


    public function form()
    {
        return $this->belongsTo(Form::class);
    }

    public function lead()
    {
        return $this->belongsTo(Lead::class);
    }
}
