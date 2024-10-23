<?php

namespace Modules\Hospital\Http\Controllers\Room;

use Illuminate\Http\Request;
use App\Traits\APi\ResponseTrait;
use App\Http\Controllers\Controller;
use Modules\Hospital\Models\Room\Room;
use Modules\Hospital\Http\Requests\Room\RoomRequest;
use Modules\Hospital\Transformers\Room\RoomResource;

class RoomController extends Controller
{
    use ResponseTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = collect();

        Room::with('department')->chunk(100, function ($roomChunk) use ($rooms) {
            foreach ($roomChunk as $room) {
                $rooms->push($room);
            }
        });
        return $this->apiSuccess(RoomResource::collection($rooms), 'rooms retrieved successfully',200);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoomRequest $request)
    {
        $validated = $request->validated();
        $room = Room::create($validated);
        return $this->apiSuccess(new RoomResource($room), 'room added successfully',201);


    }

    /**
     * Show the specified resource.
     */
    public function show(Room $room)
    {
        $room = $room->with('department')->first();
        return $this->apiSuccess(new RoomResource($room), 'room details successfully',200);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoomRequest $request,Room $room)
    {
        $validated = $request->validated();
        $room->update($validated);
        return $this->apiSuccess(new RoomResource($room), 'room updated successfully',201);

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        $room->delete();
        return $this->apiSuccess(new RoomResource($room), 'room deleted successfully',201);

    }
}
