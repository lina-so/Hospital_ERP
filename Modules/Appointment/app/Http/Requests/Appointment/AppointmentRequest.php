<?php

namespace Modules\Appointment\Http\Requests\Appointment;

use BenSampo\Enum\Rules\EnumValue;
use Illuminate\Foundation\Http\FormRequest;
use Modules\Appointment\Enums\appointment\StatusEnum;

class AppointmentRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'patient_id' => ['required','integer','exists:patients,id'],
            'hospital_service_id' => ['required', 'integer','exists:hospital_services,id'],
            'appointment_date' => ['required', 'date', 'after_or_equal:today'],
            'status' => [new EnumValue(StatusEnum::class)],

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
