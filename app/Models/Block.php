<?php

namespace Modules\Iform\Models;

use Astrotomic\Translatable\Translatable;
use Imagina\Icore\Models\CoreModel;

class Block extends CoreModel
{
    use Translatable;

    protected $table = 'iform__blocks';
    public string $transformer = 'Modules\Iform\Transformers\BlockTransformer';
    public string $repository = 'Modules\Iform\Repositories\BlockRepository';
    public array $requestValidation = [
        'create' => 'Modules\Iform\Http\Requests\CreateBlockRequest',
        'update' => 'Modules\Iform\Http\Requests\UpdateBlockRequest',
    ];
    //Instance external/internal events to dispatch with extraData
    public array $dispatchesEventsWithBindings = [
        //eg. ['path' => 'path/module/event', 'extraData' => [/*...optional*/]]
        'created' => [],
        'creating' => [],
        'updated' => [],
        'updating' => [],
        'deleting' => [],
        'deleted' => []
    ];
    public array $translatedAttributes = [
        'title',
        'description'
    ];
    protected $fillable = [
        'form_id',
        'sort_order',
        'options',
        'name',
    ];

    protected $casts = [
        'options' => 'json',
    ];

    public function form()
    {
        return $this->belongsTo(Form::class);
    }

    public function fields()
    {
        return $this->hasMany(Field::class)->with('translations')->orderBy('order', 'asc');
    }

}
