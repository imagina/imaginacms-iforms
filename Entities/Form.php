<?php

namespace Modules\Iforms\Entities;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Stancl\Tenancy\Database\Concerns\BelongsToTenant;
use Modules\Isite\Traits\RevisionableTrait;

use Modules\Core\Support\Traits\AuditTrait;

class Form extends Model
{
  use Translatable, BelongsToTenant, AuditTrait, RevisionableTrait;

  public $transformer = 'Modules\Iforms\Transformers\FormTransformer';
  public $entity = 'Modules\Iforms\Entities\Form';
  public $repository = 'Modules\Iforms\Repositories\FormRepository';

  protected $table = 'iforms__forms';

  public $translatedAttributes = [
    'title',
    'submit_text',
    'success_text',
  ];

  protected $fillable = [
    'system_name',
    'active',
    'destination_email',
    'user_id',
    'options',
    'form_type',
    'organization_id',
    'parent_id'
  ];

  protected $casts = [
    'options' => 'array',
    'destination_email' => 'array'
  ];

  public $tenantWithCentralData = true;

  public function __construct(array $attributes = [])
  {
    try {
      $entitiesWithCentralData = json_decode(setting("iforms::tenantWithCentralData", null, "[]", true));
      $this->tenantWithCentralData = in_array("forms", $entitiesWithCentralData);
    } catch (\Exception $e) {
    }
    parent::__construct($attributes);

  }

  public function fields()
  {
    return $this->hasMany(Field::class)->with('translations')->orderBy('order', 'asc');
  }

  public function parent()
  {
    return $this->belongsTo('Modules\Iforms\Entities\Form', 'parent_id');
  }

  public function leads()
  {
    return $this->hasMany(Lead::class);
  }

  public function blocks()
  {
    return $this->hasMany(Block::class)->orderBy('sort_order', 'asc');
  }

  public function user()
  {
    $driver = config('asgard.user.config.driver');
    return $this->belongsTo("Modules\\User\\Entities\\{$driver}\\User", 'user_id');
  }

  public function getDestinationEmailAttribute($value)
  {
    return json_decode($value);
  }

  public function getOptionsAttribute($value)
  {
    return json_decode($value);
  }

  public function formeable()
  {
    return $this->morphTo();
  }

  public function getUrlAttribute()
  {
    return \LaravelLocalization::localizeUrl('/iforms/view/' . $this->id);
  }

  public function getEmbedAttribute()
  {
    $elementUid = uniqid();
    //$embed = "<iframe src='$this->url' title='$this->title' frameborder='0' allowfullscreen></iframe>";
    $embed = "<script id='scriptIframeId-{$elementUid}' src='".url("")."/iforms/external/render/{$this->id}?iframeId={$elementUid}'></script>";
    return $embed;
  }
}
