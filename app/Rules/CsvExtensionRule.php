<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CsvExtensionRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
        if (!is_file($value)) {
            return false;
        }

        return $value->getClientOriginalExtension() == "csv";
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'O campo arquivo deve receber um arquivo com extensão .csv';
    }
}
