<?php


namespace App\Applications\CustomValidation;


use Illuminate\Validation\Validator;

class CustomValidator extends Validator
{
    public function validateIndex($attribute, $value)
    {
        if ($value >= 111000 and $value < 169000) {
            return true;
        }

        return false;
    }
}