<?php

namespace Modules\Iform\Models;

use Illuminate\Database\Eloquent\Model;

class BlockTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'title',
        'description'
    ];
    protected $table = 'iform__block_translations';
}
