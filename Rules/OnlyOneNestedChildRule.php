<?php

namespace Modules\Iforms\Rules;

use Illuminate\Contracts\Validation\Rule;

class OnlyOneNestedChildRule implements Rule
{
  /**
   * Create a new rule instance.
   *
   * @return void
   */
  public $message;
  public $table;

  public function __construct($table, $message = null)
  {
    $this->message = $message ?? 'There are another register with the same email.';
    $this->table = $table;
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
    if (is_null($value)) {
      return true;
    } else {
      $parent = \DB::table($this->table)->where('id', $value)->first();
      if (is_null($parent->parent_id)) {
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
