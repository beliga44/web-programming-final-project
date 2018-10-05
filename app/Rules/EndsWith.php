<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class EndsWith implements Rule
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
        return substr($value, strlen($value) - strlen($this->prefix)) === $this->prefix;
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
