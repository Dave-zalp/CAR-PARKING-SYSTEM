<?php

namespace App\Http\Controllers;

use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use App\Models\Parking_Space;
use App\Http\Requests\AddSpaceRequest;
use App\Http\Resources\ParkSpaceResource;

class ParkingController extends Controller
{
    use HttpResponses;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $space = Parking_Space::all();

        return ParkSpaceResource::collection($space);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddSpaceRequest $request)
    {
            $validated = $request->validated();

            $validated['status'] = $validated['status'] ?? 0;

            $space = Parking_Space::create($validated);

            return new ParkSpaceResource($space);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $space = Parking_Space::findorFail($id);

        return new ParkSpaceResource($space);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AddSpaceRequest $request, string $id)
    {
        $validated = $request->validated();

        $space = Parking_Space::findorFail($id);

        $space->update($validated);

        return new ParkSpaceResource($space);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $space = Parking_Space::findorFail($id);

        $space->delete();

        return $this->success('','successfully deleted');
    }
}
