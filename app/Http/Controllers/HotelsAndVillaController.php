<?php

namespace App\Http\Controllers;

use App\Models\Accomodation;
use App\Models\AccomodationGeneralFacilities;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HotelsAndVillaController extends Controller
{
    public function index(): View
    {
        $facilities = AccomodationGeneralFacilities::all();

        return view('pages.hotels-and-villa.index', compact('facilities'));
    }

    public function loadHotelsAndVilla(Request $request): JsonResponse
    {
        $facilityIds = $request->input('facilities', []);

        if (!is_array($facilityIds)) {

            $facilityIds = explode(',', $facilityIds);

        }

        $accomodations = Accomodation::query()

            ->with(['category', 'location', 'facilities'])

            ->when(!empty($facilityIds), function ($query) use ($facilityIds) {

                $query->whereHas('facilities', function ($q) use ($facilityIds) {

                    $q->whereIn('accomodation_facilities.facility_id', $facilityIds);

                });
            })

            ->orderBy('created_at', 'desc')

            ->paginate(8);

        return response()->json($accomodations);
    }
}
