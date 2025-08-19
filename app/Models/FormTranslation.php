<?php

namespace Modules\Iform\Models;

use Illuminate\Database\Eloquent\Model;

class FormTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'title',
        'submit_text',
        'success_text',
        'description'
    ];
    protected $table = 'iform__form_translations';
}
