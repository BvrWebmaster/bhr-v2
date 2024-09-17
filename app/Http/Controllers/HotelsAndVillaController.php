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

        $accomodationCategories = $request->input('accomodationCategories', []);

        $accomodations = Accomodation::query()

            ->with(['category', 'location', 'facilities', 'roomtypes'])

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

            ->when(!empty($accomodationCategories), function ($query) use ($accomodationCategories) {

                $query->whereIn('category_id', $accomodationCategories);

            })

            ->orderBy('created_at', 'desc')

            ->paginate(8);

        $accomodations->getCollection()->transform(function ($accomodation) {
            // Dapatkan harga termurah dari roomtypes
            $lowestPrice = $accomodation->roomtypes->min('price_per_night') ?? 0;
            // Terapkan diskon 10%
            $accomodation->discounted_price = $lowestPrice * 0.90;
            $accomodation->price = $lowestPrice;
            return $accomodation;
        });


        return response()->json($accomodations);
    }

    public function show(Accomodation $accomodation): View
    {
        $seoData = new SEOData(

            title: $accomodation->name,

            description: $accomodation->meta_description
        );

        return view('pages.hotels-and-villa.detail', compact('seoData'));
    }
}
