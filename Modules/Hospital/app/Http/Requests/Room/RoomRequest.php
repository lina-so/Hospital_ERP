<?php

namespace Modules\Hospital\Http\Requests\Room;

use Illuminate\Validation\Rule;
use BenSampo\Enum\Rules\EnumValue;
use Illuminate\Foundation\Http\FormRequest;
use Modules\Hospital\Enums\room\StatusEnum;

class RoomRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'room_number'=>['integer','min:1','max:255'],
            'department_id'=>['required','integer','exists:departments,id'],
            'room_category_id'=>['required','integer','exists:room_categories,id'],
            'floor_id'=>['required','integer','exists:floors,id'],
            'status' => ['required', new EnumValue(StatusEnum::class)],


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
