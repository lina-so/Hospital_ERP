<?php

namespace Modules\Hospital\Http\Requests\Department;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class DepartmentRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string','min:3','max:50', Rule::unique('department_categories','name')->ignore($this->id ?? null)],
            'description'=>['nullable','string','max:255'],
            'department_category_id'=>['required','integer','exists:department_categories,id'],
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
