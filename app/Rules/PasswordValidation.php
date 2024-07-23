<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class PasswordValidation implements Rule
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
        $isValidLength = false;
        $isValidLowercase = false;
        $isValidUppercase = false;
        $isValidNumber = false;
        $isValidSpecialChar = false;

        #We want to ensure that we have a unicode character present
        if (mb_detect_encoding($value, ['UTF-8']) == True)
        {
            $isValidSpecialChar = true;
            
            if (mb_strlen($value) >= 8)
                $isValidLength = true;
            
                for ($i = 0; $i < mb_strlen($string); $i++)
            {
                if (ctype_lower($string[$i]))
                    $isValidLowercase = true;

                if (ctype_upper($string[$i]))
                    $isValidUppercase = true;

                if (ctype_digit($string[$i]))
                    $isValidNumber = true;

                if (preg_match('[@_!#$%^&*()<>?\/|}{~:]', $value))
                    $isValidSpecialChar = true;
            }
        }
        else
        {
            if (strlen($value) >= 8)
                $isValidLength = true;

            for ($i = 0; $i < strlen($string); $i++)
            {
                if (ctype_lower($string[$i]))
                    $isValidLowercase = true;

                if (ctype_upper($string[$i]))
                    $isValidUppercase = true;

                if (ctype_digit($string[$i]))
                    $isValidNumber = true;

                if (preg_match('[@_!#$%^&*()<>?\/|}{~:]', $value))
                    $isValidSpecialChar = true;

                if (mb_detect_encoding($value, ['UTF-8']) == true)
                    $isValidSpecialChar = true;
            }
        }

        if (!($isValidLength && $isValidLowercase && $isValidUppercase && $isValidNumber && $isValidSpecialChar))
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
        return 'An invlid password was entered. Please ensure that the password is at least 8 characters long, contains at least one lowercase letter, one uppercase letter, one number and one special character.';
    }
}
