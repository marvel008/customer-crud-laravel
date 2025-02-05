<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'image'=>['nullable','image','mimes:png,jpg','max:3000'],
            'first_name'=>['required','string','max:255'],
            'last_name'=>['required','string','max:255'],
            'phone'=>['required','string','max:50'],
            'email'=>['required','email','max:255'],
            'bank_account_number'=>['required','numeric'],
            'about'=>['nullable','string' ,'max:500']
        ];
    }
}
