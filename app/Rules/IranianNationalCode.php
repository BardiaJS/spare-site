<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class IranianNationalCode implements Rule
{
    public function passes($attribute, $value)
    {
        // حذف هرگونه کاراکتر غیرعددی
        $nationalCode = preg_replace('/[^0-9]/', '', $value);
        
        // بررسی طول کد ملی
        if (strlen($nationalCode) != 10) {
            return false;
        }
        
        // بررسی اعداد تکراری (مانند 1111111111)
        if (preg_match('/^(\d)\1{9}$/', $nationalCode)) {
            return false;
        }
        
        // الگوریتم صحت سنجی کد ملی
        $sum = 0;
        for ($i = 0; $i < 9; $i++) {
            $sum += (int) $nationalCode[$i] * (10 - $i);
        }
        
        $remainder = $sum % 11;
        $controlDigit = (int) $nationalCode[9];
        
        if ($remainder < 2) {
            return $controlDigit == $remainder;
        } else {
            return $controlDigit == (11 - $remainder);
        }
    }

    public function message()
    {
        return 'National code is invalid!';
    }
}