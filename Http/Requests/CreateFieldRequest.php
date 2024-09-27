<?php

namespace Modules\Iforms\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;
use Modules\Iforms\Rules\OnlyOneNestedChildRule;
use Modules\Iforms\Rules\CheckFieldParentIdRule;

class CreateFieldRequest extends BaseFormRequest
{
    public function rules()
    {
      $fieldId = $this->get('parent_id');
      return [
        'form_id' => ['required', new CheckFieldParentIdRule($fieldId)],
        "parent_id" => [
          new OnlyOneNestedChildRule('iforms__fields')
        ]
      ];
    }

    public function translationRules()
    {
        return [];
    }

    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [];
    }

    public function translationMessages()
    {
        return [];
    }

    public function getValidator(){
        return $this->getValidatorInstance();
    }
    
}
