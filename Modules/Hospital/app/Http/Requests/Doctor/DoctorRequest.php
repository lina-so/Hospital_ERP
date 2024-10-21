<?php

namespace Modules\Hospital\Http\Requests\Doctor;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class DoctorRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'email'=>['required','email',Rule::unique('doctors','email')->ignore($this->doctor->id ?? null)],
            // 'password'=>['required','string',new PasswordMatchRule($this->email)],
            'password'=>['required','string'],
            'first_name' => ['required', 'string','min:3', 'max:255'],
            'last_name' => ['required', 'string','min:3', 'max:255'],
            'phone_number' => ['required', 'string', 'min:10','max:15'],
            'specialty_id' => ['required', 'exists:specialties,id'],
            'department_id' => ['required', 'exists:departments,id'],
            'department_category_id' => ['required', 'exists:department_categories,id'],
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
