<?php

namespace App\Http\Requests;

use App\Rules\IranianMobileNumber;
use App\Rules\IranianNationalCode;
use App\Rules\IranianPostalCode;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CreateProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'phone' => ['required', Rule::unique('profiles','phone') , new IranianMobileNumber] ,
            'address' => ['required'],
            'postal_code' => ['required' , new IranianPostalCode]
        ];
    }
}
