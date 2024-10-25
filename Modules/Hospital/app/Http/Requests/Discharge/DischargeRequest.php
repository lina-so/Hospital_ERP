<?php

namespace Modules\Hospital\Http\Requests\Discharge;

use Illuminate\Foundation\Http\FormRequest;

class DischargeRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'patient_id'=>['required','integer','exists:patients,id']
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
