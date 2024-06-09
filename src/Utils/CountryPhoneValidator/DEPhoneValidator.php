<?php

namespace Milwad\LaravelValidate\Utils\CountryPhoneValidator;

class DEPhoneValidator implements CountryPhoneValidator
{
    /**
     * Validate Iran phone numbers.
     */
    public function validate($value): bool
    {
        return preg_match('/^((\+49)|(0))(1|15|16|17|19|30|31|32|33|34|40|41|42|43|44|49|151|152|153|155|156|157|159|160|162|163|180|181|182|183|184|185|186|187|188|170|171|172|173|174|175|176|177|178|179)\d{7,8}$/', $value);
    }
}
