<?php

namespace App\Http\Controllers;

use App\Models\Accomodation;
use App\Models\AccomodationCategory;
use App\Models\AccomodationGeneralFacilities;
use App\Models\Location;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use RalphJSmit\Laravel\SEO\Support\SEOData;
use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

class HotelsAndVillaController extends Controller
{
    public function index(): View
    {
        $seoData = new SEOData(
          title: 'Hotels And Villa',
          description: 'Description hotels and villa'
        );

        $facilities = AccomodationGeneralFacilities::all();

        $accomodationCategories = AccomodationCategory::all();

        $locations = Location::all();

        return view('pages.hotels-and-villa.index', compact('facilities', 'locations', 'accomodationCategories' , 'seoData'));
    }

    public function loadHotelsAndVilla(Request $request): JsonResponse
    {
        $facilityIds = $request->input('facilities', []);

        $locations = $request->input('location', []);

        $sortName = $request->input('sortName', null);

        if (!is_array($locations)) {

            $locations = explode(',', $locations);

        }

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

            ->when(!empty($locations), function ($query) use ($locations) {
                $query->whereIn('location_id', $locations);
            })

            ->when($sortName, function ($query) use ($sortName) {
                $query->orderBy('name', $sortName);
            })

            ->orderBy('created_at', 'desc')

            ->paginate(8);

        return response()->json($accomodations);
    }

    public function show(Accomodation $accomodation): View
    {
        $seoData = new SEOData(

            title: $accomodation->name,

            description: $accomodation->meta_description
        );

        return view('pages.hotels-and-villa.detail', compact('accomodation', 'seoData'));
    }
}
