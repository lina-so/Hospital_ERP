<?php

namespace Modules\Hospital\Http\Requests\Doctor;

use Illuminate\Foundation\Http\FormRequest;

class DoctorRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
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
