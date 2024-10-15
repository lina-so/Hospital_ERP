<?php

namespace Modules\Hospital\Http\Requests\Room;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class RoomCategoryRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string','min:3','max:50', Rule::unique('department_categories','name')->ignore($this->id ?? null)],

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
