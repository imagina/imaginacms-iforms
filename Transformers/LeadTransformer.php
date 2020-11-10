<?php


namespace Modules\Iforms\Transformers;
use Illuminate\Http\Resources\Json\JsonResource;

class LeadTransformer extends JsonResource
{
  public function toArray($request)
  {
    $data = [
      'id' => $this->when($this->id, $this->id),
      'formId' => $this->when($this->form_id, $this->form_id),
      'values' => $this->when($this->values, $this->values),
      'form' => new FormTransformer($this->whenLoaded('form')),
    ];

    return $data;
  }
}
