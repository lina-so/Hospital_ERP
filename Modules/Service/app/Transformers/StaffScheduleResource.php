<?php

namespace Modules\Service\Transformers;

use Illuminate\Http\Request;
use Modules\Core\Transformers\Day\DayResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Core\Transformers\Time\TimeResource;

class StaffScheduleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
      return [
            'id' => $this->id,
            'employeeable_type' => $this->employeeable_type,
            'employeeable_id' => $this->employeeable_id,
            'day' => DayResource::collection($this->days),
            'time' => new TimeResource($this->time),
      ];
    }
}
