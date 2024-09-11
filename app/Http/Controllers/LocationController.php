<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\JsonResponse;

class LocationController extends Controller
{
    public function index(): JsonResponse
    {
        $locations = Location::all();

        return response()->json($locations);
    }
}
