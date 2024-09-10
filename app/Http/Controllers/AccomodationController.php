<?php

namespace App\Http\Controllers;

use App\Models\Accomodation;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AccomodationController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $activeLocation = $request->input('location_id', 1);

        $accomodations = Accomodation::query()

            ->where('location_id', $activeLocation)

            ->with(['category', 'location', 'facilities'])

            ->get();

        return response()->json($accomodations);
    }
}
