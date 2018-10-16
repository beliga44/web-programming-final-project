<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Hash;

class ComparePassword implements Rule
{
    private $currentPassword;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($currentPassword)
    {
        $this->currentPassword = $currentPassword;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return Hash::check($value, $this->currentPassword);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Old password does not match with current password.';
    }
}
