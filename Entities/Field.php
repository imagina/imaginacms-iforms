<?php

namespace Modules\Iforms\Entities;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;
use Modules\Iforms\Presenters\FieldPresenter;
use Illuminate\Support\Str;

class Field extends Model
{
  use Translatable, PresentableTrait;

  protected $table = 'iforms__fields';

  public $translatedAttributes = [
    'label',
    'placeholder',
    'description',
  ];
  protected $fillable = [
    'type',
    'name',
    'required',
    'form_id',
    'selectable',
    'order',
    'prefix',
    'suffix',
    'width',
    'block_id',
    'options',
  ];

  protected $presenter = FieldPresenter::class;

  protected $casts = [
    'selectable' => 'array',
    'prefix' => 'array',
    'suffix' => 'array',
    'options' => 'array',
  ];

  public function form()
  {
    return $this->belongsTo(Form::class);
  }

  public function block()
  {
    return $this->belongsTo(Block::class);
  }

  public function getSelectableAttribute($value)
  {
    return json_decode($value);
  }

  public function setSelectableAttribute($value)
  {
    $this->attributes['selectable'] = json_encode($value);
  }

  public function getPrefixAttribute($value)
  {
    return json_decode($value);
  }

  public function getLabelAttribute($value)
  {
    return $value . ($this->required ? config('asgard.iforms.config.requiredFieldLabel') : '');
  }

  public function setPrefixAttribute($value)
  {
    $this->attributes['prefix'] = json_encode($value);
  }

  public function getSuffixAttribute($value)
  {
    return json_decode($value);
  }

  public function setSuffixAttribute($value)
  {
    $this->attributes['suffix'] = json_encode($value);
  }
  
  public function setOptionsAttribute($value)
  {
    $options = $value;
    if (isset($options["availableExtensions"]) && !empty($options["availableExtensions"])) {
      foreach ($options["availableExtensions"] as $index => $availableExtension) {
        $options["availableExtensions"][$index] = Str::replace('.', '', $availableExtension);
      }
  
      $options["availableExtensionsAccept"] = join(",", array_map(
        function ($valor) {
          return "." . $valor;
        }, $options["availableExtensions"]));
    }

    $this->attributes['options'] = json_encode($options);
  }
  
  public function getOptionsAttribute($value)
  {
    return json_decode($value);
    
  }

}
