<?php

namespace Modules\Iforms\Rules;

use Illuminate\Contracts\Validation\Rule;

class CheckFieldParentIdRule implements Rule
{
  /**
   * Create a new rule instance.
   *
   * @return void
   */
  public $message;
  public $parentFieldId;

  public function __construct($parentFieldId, $message = null)
  {
    $this->message = $message ?? 'There are another register with the same email.';
    $this->parentFieldId = $parentFieldId;
  }

  /**
   * Determine if the validation rule passes.
   *
   * @param string $attribute
   * @param mixed $value
   * @return bool
   */
  public function passes($attribute, $value)
  {
    $form = \DB::table('iforms__forms')->where('id', $value)->get()->first();
    if (is_null($form->parent_id)) {
      return true;
    } else {
      $parentFieldsIds = \DB::table('iforms__fields')->where('form_id', $form->parent_id)->get()->pluck('id')->toArray();
      if (in_array($this->parentFieldId, $parentFieldsIds)) {
        return true;
      } else {
        return false;
      }
    }
  }

  /**
   * Get the validation error message.
   *
   * @return string
   */
  public function message()
  {
    return $this->message;
  }
}
