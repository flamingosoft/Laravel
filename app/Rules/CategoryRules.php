<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CategoryRules implements Rule
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
        $res = [];
        return preg_match("/[а-яё0-9.?!,\-+_'\"@%$*()&^;: ]+/ium", $value, $res)
            && $res[0] == $value;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Должен быть обычный текст из букв, цифр, знаков препинания и пробелов';
    }
}
