<?php

namespace Modules\Iforms\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;
use Modules\Iforms\Rules\OnlyOneNestedChildRule;

class CreateFormRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
            "parent_id" => [
              new OnlyOneNestedChildRule('iforms__forms')
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
