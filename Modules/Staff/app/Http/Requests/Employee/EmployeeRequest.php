<?php

namespace Modules\Staff\Http\Requests\Employee;

use Illuminate\Validation\Rule;
use App\Enums\Gender\GenderEnum;
use BenSampo\Enum\Rules\EnumValue;
use Illuminate\Foundation\Http\FormRequest;
use Modules\Staff\Enums\employee\StatusEnum;
use Modules\Auth\Rules\Auth\PasswordMatchRule;

class EmployeeRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'first_name' => ['required','string','max:255'],
            'last_name' => ['required','string','max:255'],
            'email'=>['required','email',Rule::unique('employees','email')->ignore($this->employee->id ?? null)],
            // 'password'=>['required','string',new PasswordMatchRule($this->email)],
            'password'=>['required','string'],
            'job_title' => ['required','string','max:255'],
            'department_id' =>['required','integer','exists:departments,id'],
            'hire_date' => ['required','date'],
            'salary' => ['required','numeric','min:0'],
            'phone_number' => ['required', 'string', Rule::unique('employees','phone_number')->ignore($this->employee->id ?? null),'min:10','max:15'],
            'employment_status' => ['required', new EnumValue(StatusEnum::class)],
            'gender' => ['required', new EnumValue(GenderEnum::class)],

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
