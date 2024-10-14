<?php

namespace Modules\Auth\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Auth\Rules\Auth\PasswordMatchRule;

class LoginRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'email'=>['required','exists:users,email'],
            'password'=>['required','string',new PasswordMatchRule($this->email)],
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