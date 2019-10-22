<?php


namespace Modules\Iforms\Transformers;
use Illuminate\Http\Resources\Json\Resource;
use Modules\Iprofile\Transformers\UserTransformer;

class FormTransformer extends Resource
{

  public function toArray($request)
  {
    $data = [
      'id' => $this->when($this->id, $this->id),
      'title' => $this->when($this->title, $this->title),
      'userId' => $this->when($this->user_id, $this->user_id),
      'options' => $this->when($this->options, $this->options),
      'fields' => FieldTransformer::collection($this->whenLoaded('fields')),
      'leads' => LeadTransformer::collection($this->whenLoaded('leads')),
      'user' => new UserTransformer($this->whenLoaded('user')),
    ];

    $filter = json_decode($request->filter);
    // Return data with available translations
    if (isset($filter->allTranslations) && $filter->allTranslations) {
      // Get langs avaliables
      $languages = \LaravelLocalization::getSupportedLocales();
      foreach ($languages as $lang => $value) {
        $data[$lang]['title'] = $this->hasTranslation($lang) ? $this->translate("$lang")['title'] : '';
      }
    }

    return $data;
  }
}
