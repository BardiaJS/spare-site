<?php


namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class IranianMobileNumber implements Rule
{
    public function passes($attribute, $value)
    {
        // حذف هرگونه کاراکتر غیرعددی
        $mobile = preg_replace('/[^0-9]/', '', $value);
        
        // الگوی شماره موبایل ایرانی
        $pattern = '/^(((98)|(\+98)|(0098)|0)(9){1}[0-9]{9})$/';
        
        return preg_match($pattern, $mobile);
    }

    public function message()
    {
        return "This phone is invalid!";
    }
}