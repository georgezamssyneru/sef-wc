<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class EmailValidation implements Rule
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
     * Regex checks for a valid email, certian characters are allowed in most cases, and this will verify that
     * Some examples of invalid emails:
     *  - Abc.example.com                             | no @ character
     *  - A@b@c@example.com                           | too many @ characters
     *  - a\"b(c)d,e:f;gi[j\\k]l@example.com          | none of the special characters in this local part are allowed outside quotation marks
     *  - just\"not\"right@example.com                | quoted strings must be dot separated or the only element making up the local part
     *  - this is\"not\\allowed@example.com           | spaces, quotes, and backslashes may only exist when within quoted strings and preceded by a backslash
     *  - this\\ still\\\"not\\allowed@example.com    | even if escaped (preceded by a backslash), spaces, quotes, and backslashes must still be contained by quotes
     *  - john..doe@example.com                       | double dot before @
     *  - john...doe@example.com                      | triple dot before @
     *  - john.doe@example..com                       | double dot after @
     *  - john.doe@example...com                      | triple dot after @
     *  -  john.doe@example.com                       | a valid address with a leading space
     *  - john.doe@example.com                        | a valid address with a trailing space
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // NOTE: for regex to work in php using the '/', you need to escape it with '\/'
        $regex = "/^(?:[a-zA-Z0-9!#$%&'*+\/=?^_`{|}~-]+(?:\.[a-zA-Z0-9!#$%&'*+\/=?^_`{|}~-]+)*@(?:[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?\.)+[a-zA-Z0-9](?:[a-zA-Z0-9-]*[a-zA-Z0-9])?)$/";

        if (!preg_match($regex, $value))
            return false;
        
        // Regex does not check for multiple "." characters, so we will check for that here.
        $splitEmail = explode("@", $value);
        if (substr_count($splitEmail[0], "..") >= 1)
            return false;
        if (substr_count($splitEmail[1], "..") >= 1)
            return false;

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Invalid email entered, please double check.';
    }
}
