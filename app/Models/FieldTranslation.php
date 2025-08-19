<?php

namespace Modules\Iform\Models;

use Illuminate\Database\Eloquent\Model;

class FieldTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'label',
        'placeholder',
        'description'
    ];
    protected $table = 'iform__field_translations';
}
