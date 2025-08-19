<?php

namespace Modules\Iform\Models;

use Astrotomic\Translatable\Translatable;
use Imagina\Icore\Models\CoreModel;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Field extends CoreModel
{
    use Translatable;

    protected $table = 'iform__fields';
    public string $transformer = 'Modules\Iform\Transformers\FieldTransformer';
    public string $repository = 'Modules\Iform\Repositories\FieldRepository';
    public array $requestValidation = [
        'create' => 'Modules\Iform\Http\Requests\CreateFieldRequest',
        'update' => 'Modules\Iform\Http\Requests\UpdateFieldRequest',
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
        'label',
        'placeholder',
        'description',
    ];
    protected $fillable = [
        'type',
        'system_name',
        'required',
        'form_id',
        'selectable',
        'order',
        'prefix',
        'suffix',
        'width',
        'block_id',
        'options',
        'rules',
        'parent_id',
        'visibility'
    ];

    protected $casts = [
        'selectable' => 'json',
        'prefix' => 'json',
        'suffix' => 'json',
        'options' => 'json',
        'rules' => 'json',
    ];

    public function form()
    {
        return $this->belongsTo(Form::class);
    }

    public function parent()
    {
        return $this->belongsTo('Modules\Iform\Models\Field', 'parent_id');
    }

    public function block()
    {
        return $this->belongsTo(Block::class);
    }

    public function rules(): Attribute
    {
        return Attribute::set(function (?array $value) {
            $rules = $value;
            if (isset($rules["mimes"]) && !empty($rules["mimes"])) {
                foreach ($rules["mimes"] as $index => $availableExtension) {
                    $rules["mimes"][$index] = Str::replace('.', '', $availableExtension);
                }
            }
            $rules["required"] = $this->required;

            return json_encode($rules);
        });
    }

    public function ruleAccept(): Attribute
    {
        return Attribute::get(function () {
            $rules = $this->rules;
            $accept = "";
            if (isset($rules->mimes) && !empty($rules->mimes)) {
                $accept = join(",", array_map(
                    function ($valor) {
                        return "." . $valor;
                    }, $rules->mimes));
            }

            return $accept;
        });
    }

    public function FieldOptions(): Attribute
    {
        return Attribute::get(function () {
            $fieldOptions = $this->fields->where('name', 'field_options')->first();
            if ($fieldOptions) return $fieldOptions->value ?? [];
            //getting the options from the selectable attribute for old sites created with the Iform before Dec, 2021
            return $this->options['fieldOptions'] ?? json_decode($this->selectable) ?? [];
        });
    }

    public function label()
    {
        return Attribute::get(function (?string $value) {
            return $value . ($this->required ? config('asgard.iforms.config.requiredFieldLabel') : '');
        });
    }

    public function systemName(): Attribute
    {
        return Attribute::get(function (?string $value) {
            $formSystemName = $this->form->system_name ?? '';
            return \Str::slug("{$formSystemName}-{$value}");
        });
    }
}
