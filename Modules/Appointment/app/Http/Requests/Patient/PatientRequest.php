<?php

namespace Modules\Appointment\Http\Requests\Patient;

use Illuminate\Validation\Rule;
use App\Enums\Gender\GenderEnum;
use BenSampo\Enum\Rules\EnumValue;
use Illuminate\Foundation\Http\FormRequest;

class PatientRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'sequence_number' => ['string','min:5' ,'max:255'],
            'first_name' => ['required', 'string', 'min:3','max:255'],
            'last_name' => ['required', 'string', 'min:3','max:255'],
            'ID_number'=>['required','string','max:11','regex:/^[0-9][0-9]{10}$/',Rule::unique('patients','ID_number')->ignore($this->patient->id ?? null)],
            'date_of_birth' => ['required', 'date', 'before:today'],
            'age' => ['nullable', 'integer', 'min:0'],
            'gender' => ['required',new EnumValue(GenderEnum::class)],
            'phone_number' => ['required', 'string', Rule::unique('patients','phone_number')->ignore($this->patient->id ?? null),'min:10','max:15'],
            'address' => ['nullable', 'string'],
            'allergies' => ['nullable', 'string'],
            'admission_date' => ['nullable', 'date'],
            'discharge_date' => ['nullable', 'date', 'after:admission_date'],
            'room_id'=>['required','integer','exists:rooms,id'],
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
