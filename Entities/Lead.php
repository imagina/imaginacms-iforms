<?php

namespace Modules\Iforms\Entities;

use Modules\Core\Icrud\Entities\CrudModel;
use Stancl\Tenancy\Database\Concerns\BelongsToTenant;
use Modules\Media\Support\Traits\MediaRelation;
use Modules\User\Entities\Sentinel\User;

class Lead extends CrudModel
{
  use BelongsToTenant, MediaRelation;

  protected $table = 'iforms__leads';
  public $transformer = 'Modules\Iforms\Transformers\LeadTransformer';
  public $repository = 'Modules\Iforms\Repositories\LeadRepository';
  public $requestValidation = [
      'create' => 'Modules\Iforms\Http\Requests\CreateLeadRequest',
      'update' => 'Modules\Iforms\Http\Requests\UpdateLeadRequest',
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
  
  protected $fillable = [
    'form_id',
    'assigned_to_id',
    'values'
  ];
  
  protected $casts = [
    'values' => 'array'
  ];
  
  public function form()
  {
    return $this->belongsTo(Form::class);
  }
  
  public function assignedTo()
  {
    return $this->belongsTo(User::class, 'assigned_to_id');
  }
  
}
