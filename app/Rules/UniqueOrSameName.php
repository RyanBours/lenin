<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Validation\Rules\Unique;

class UniqueOrSameName implements Rule
{
    private $uniqueRule;
    private $curName;

    public function __construct($table, $column, $currentName)
    {
        $this->uniqueRule = new Unique($table, $column);
        $this->curName = $currentName;
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
        return $value === $this->curName || $this->uniqueRule.passes($attribute, $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute already exists.';
    }
}