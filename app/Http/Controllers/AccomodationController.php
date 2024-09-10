<?php

namespace App\Http\Controllers;

use App\Models\Accomodation;
use Illuminate\Http\Request;

class AccomodationController extends Controller
{
    public function index(Request $request)
    {
        $activeLocation = $request->input('location_id', 1);

        $accomodations = Accomodation::query()

            ->where('location_id', $activeLocation)

            ->with(['category', 'location', 'facilities'])

            ->limit(4)

            ->get();

        return response()->json($accomodations);
    }
}
