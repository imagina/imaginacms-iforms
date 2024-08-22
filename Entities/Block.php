<?php

namespace Modules\Iforms\Entities;

use Astrotomic\Translatable\Translatable;
use Modules\Core\Icrud\Entities\CrudModel;


class Block extends CrudModel
{
  use Translatable;

  protected $table = 'iforms__blocks';
  public $transformer = 'Modules\Iforms\Transformers\BlockTransformer';
  public $repository = 'Modules\Iforms\Repositories\BlockRepository';
  public $requestValidation = [
      'create' => 'Modules\Iforms\Http\Requests\CreateBlockRequest',
      'update' => 'Modules\Iforms\Http\Requests\UpdateBlockRequest',
    ];
  //Instance external/internal events to dispatch with extraData
  public $dispatchesEventsWithBindings = [
    //eg. ['path' => 'path/module/event', 'extraData' => [/*...optional*/]]
    'created' => [],
    'creating' => [],
    'updated' => [],
    'updating' => [],
    'deleting' => [],
    'deleted' => []
  ];
 
  public $translatedAttributes = [
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
    'options' => 'array',
  ];

  public function form()
  {
    return $this->belongsTo(Form::class);
  }

  public function fields()
  {
    return $this->hasMany(Field::class)->with('translations')->orderBy('order', 'asc');
  }

  public function getOptionsAttribute($value)
  {
      $response = json_decode($value);

      if(is_string($response)) {
        $response = json_decode($response);
      }

      return $response;
  }
  
}
