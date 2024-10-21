<?php

namespace Modules\Appointment\Http\Requests\Visit;

use Illuminate\Foundation\Http\FormRequest;

class VisitRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'department_id' =>['required','integer','exists:departments,id'],
            'doctor_id' =>['required','integer','exists:doctors,id'],
            'room_id' =>['required','integer','exists:rooms,id'],
            'visit_reason' => ['nullable','string','min:3','max:1000'],
            'visit_date'=>['nullable','date','after_or_equal:today'],

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