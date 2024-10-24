<?php

namespace Modules\Hospital\Transformers\Room;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RoomResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        $data =  [
            'id' => $this->id,
            'department_id' => $this->department_id,
            'department' => $this->department->name,
            'room_category_id' => $this->roomCategory->id,
            'room_category' => $this->roomCategory->name,
            'floor_id' => $this->floor->id,
            'floor' => $this->floor->name,
            'room_number' => $this->room_number,
            'status' => $this->status,
        ];
        // dd($data);
        return $data;

    }
}
