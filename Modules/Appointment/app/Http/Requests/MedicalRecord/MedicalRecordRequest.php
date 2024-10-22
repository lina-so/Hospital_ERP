<?php

namespace Modules\Appointment\Http\Requests\MedicalRecord;

use Illuminate\Foundation\Http\FormRequest;

class MedicalRecordRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'patient_id' => ['required', 'exists:patients,id'],
            'doctor_id' => ['required', 'exists:doctors,id'],
            'visit_id' => ['required', 'exists:visits,id'],
            'patient_service_id' => ['exists:patient_services,id'],
            'diagnosis' => ['required', 'string','min:3','max:255'],
            'symptoms' => ['required', 'string','min:3','max:255'],
            'allergy' => ['required', 'string', 'min:3','max:255'],
            'treatment' => ['required', 'string','min:3','max:255'],
            'notes' => ['nullable', 'string','min:3','max:255'],
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
