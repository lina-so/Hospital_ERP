<?php

namespace Modules\Auth\Http\Requests\Auth\login\doctor;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Auth\Rules\Auth\PasswordMatchRule;

class DoctorLoginRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'email'=>['required','exists:doctors,email'],
            'password'=>['required','string'],
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
}
