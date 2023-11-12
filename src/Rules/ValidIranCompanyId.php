<?php

namespace Milwad\LaravelValidate\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidIranCompanyId implements Rule
{
    /**
     * Check company id is valid.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if (empty($value))
            return false;

        if(strlen($value) != 11)
            return false;

        $invalidIds = [
            00000000000,
            11111111111,
            22222222222,
            33333333333,
            44444444444,
            55555555555,
            66666666666,
            77777777777,
            88888888888,
            99999999999
        ];

        if (in_array($value, $invalidIds)) 
            return false;
        
        $multiplier = [29, 27, 23, 19, 17, 29, 27, 23, 19, 17];
        $checkNumber = substr($value, 10, 1);
        $decimalNumber = substr($value, 9, 1);
        $multiplication = $decimalNumber + 2;
        $sum = 0;

        for ($i = 0; $i < 10; $i++)
            $sum += (substr($value, $i, 1) + $multiplication) * $multiplier[$i];

        $remain = $sum % 11;
        if($remain == 10)
            $remain = 0;

        if ($remain == $checkNumber)
            return true;
        
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('validate.company-id');
    }
}
