<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class AcceptedWithCondition implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */

    public $attributeToCheck ;
    public $attributeToCheckValue ;
    public function __construct($attr,$value)
    {
        $this->attributeToCheck = $attr;
        $this->attributeToCheckValue = $value;

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
        dd($this->attributeToCheck, $this->attributeToCheckValue, $attribute,$value);
//        if(!is_null($value->co_applicant_email))
//            return  true;
//        return false;

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The validation error message.';
    }
}
