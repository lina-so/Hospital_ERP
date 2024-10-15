<?php

namespace Modules\Hospital\Http\Controllers\Room;

use Illuminate\Http\Request;
use App\Traits\APi\ResponseTrait;
use App\Http\Controllers\Controller;
use Modules\Hospital\Models\Room\RoomCategory;
use Modules\Hospital\Http\Requests\Room\RoomCategoryRequest;

class RoomCategoryController extends Controller
{
    use ResponseTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $room_categories = RoomCategory::all();
        return $this->apiSuccess($room_categories, 'room_categories fetched successfully',200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoomCategoryRequest $request)
    {
        $validated = $request->validated();
        $room = RoomCategory::create($validated);
        return $this->apiSuccess($room, 'room_category added successfully',201);


    }

    /**
     * Show the specified resource.
     */
    public function show(RoomCategory $room_category)
    {
        return $this->apiSuccess($room_category, 'room_category retrieved successfully',200);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoomCategoryRequest $request,RoomCategory $room_category)
    {

        $validated = $request->validated();
        $room_category->update($validated);
        return $this->apiSuccess($room_category, 'room_category updated successfully',201);

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RoomCategory $room_category)
    {
        $room_category->delete();
        return $this->apiSuccess($room_category, 'room_category deleted successfully',201);

    }
}
