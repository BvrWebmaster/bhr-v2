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

            ->with(['category', 'location', 'facilities', 'roomtypes'])

            ->limit(12)

            ->get();

        $accomodations->transform(function ($accomodation) {
            $lowestPrice = $accomodation->roomtypes->min('price_per_night') ?? 0;
            $accomodation->discounted_price = $lowestPrice * 0.90;
            $accomodation->price = $lowestPrice;
            return $accomodation;
        });

        return response()->json($accomodations);
    }
}

