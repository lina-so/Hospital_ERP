<?php

namespace Modules\Service\Http\Requests\PatientService;

use BenSampo\Enum\Rules\EnumValue;
use Illuminate\Foundation\Http\FormRequest;
use Modules\Service\Enums\patient_service\StatusEnum;

class PatientServiceRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'patient_id' => ['required', 'exists:patients,id'],
            'hospital_service_id' => ['required', 'exists:hospital_services,id'],
            'category' => ['required',new EnumValue(StatusEnum::class)],
            'service_type' => ['required', 'string','min:3','max:255'],
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
