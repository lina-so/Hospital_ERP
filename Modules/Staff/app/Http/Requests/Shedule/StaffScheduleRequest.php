<?php

namespace Modules\Staff\Http\Requests\Shedule;

use Illuminate\Foundation\Http\FormRequest;

class StaffScheduleRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        // dd(request());
        return [
            'email' => ['required', 'email'],
            'time_id' => ['required', 'integer', 'exists:times,id'],
            'days' => ['required', 'array'],
            'days.*' => ['integer', 'exists:days,id'],
            'type' => ['required', 'string', 'in:doctor,employee'],
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
