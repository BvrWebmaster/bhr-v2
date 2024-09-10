<?php

namespace App\Http\Controllers;

use App\Models\Accomodation;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AccomodationController extends Controller
{
    public function filterAccomodation(Request $request): JsonResponse
    {
        $activeLocation = $request->input('location_id', 1);

        $accomodations = Accomodation::query()

            ->where('location_id', $activeLocation)

            ->with(['category', 'location', 'facilities'])

            ->limit(4)

            ->get();

        return response()->json($accomodations);
    }

    public function index(): View
    {
        return view('pages.hotels-and-villa.index');
    }
}
