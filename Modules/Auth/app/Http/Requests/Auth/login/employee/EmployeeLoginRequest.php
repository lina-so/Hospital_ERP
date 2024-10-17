<?php

namespace Modules\Auth\Http\Requests\Auth\login\employee;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Auth\Rules\Auth\PasswordMatchRule;

class EmployeeLoginRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'email'=>['required','exists:employees,email'],
            // 'password'=>['required','string',new PasswordMatchRule($this->email)],
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
