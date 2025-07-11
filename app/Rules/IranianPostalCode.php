<?php


namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class IranianPostalCode implements Rule
{
    public function passes($attribute, $value)
    {
        // حذف هرگونه کاراکتر غیرعددی
        $postalCode = preg_replace('/[^0-9]/', '', $value);
        
        // الگوی کد پستی ایرانی (10 رقم و شروع از غیر صفر)
        return preg_match('/^[1-9][0-9]{9}$/', $postalCode);
    }

    public function message()
    {
        return "Invalid Postal Code!";
    }
}