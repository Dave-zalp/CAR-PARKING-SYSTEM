<?php

namespace App\Http\Controllers;

use App\Http\Resources\ParkSpaceResource;
use App\Models\Parking_Space;
use Illuminate\Http\Request;

class SpaceController extends Controller
{
    //
    public function __invoke(){
        $space = Parking_Space::query()
        ->where('status',1)
        ->latest()
        ->get();

        return ParkSpaceResource::collection($space);
    }
}
