<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class StartsWith implements Rule
{
    private $prefix;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($prefix)
    {
        $this->prefix = $prefix;
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
        return substr($value, 0, strlen($this->prefix) - 1) === $this->prefix;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return ':attribute must starts with ' . $this->prefix;
    }
}
