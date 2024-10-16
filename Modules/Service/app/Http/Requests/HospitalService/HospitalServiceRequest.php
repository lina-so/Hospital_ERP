<?php

namespace Modules\Service\Http\Requests\HospitalService;

use Illuminate\Validation\Rule;
use BenSampo\Enum\Rules\EnumValue;
use Illuminate\Foundation\Http\FormRequest;
use Modules\Service\Enums\hospital_service\StatusEnum;
use Modules\Service\Enums\hospital_service\CategoryEnum;

class HospitalServiceRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'service_name' => ['required', 'string','min:3','max:50', Rule::unique('hospital_services','service_name')->ignore($this->service->id ?? null)],
            'department_id' => ['required', 'exists:departments,id'],
            'department_category_id' => ['required', 'exists:department_categories,id'],
            'price' => ['required', 'numeric', 'between:0,99999999.99'],
            'description' => ['nullable', 'string','min:3','max:255'],
            'category' => ['required', new EnumValue(CategoryEnum::class)],
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
