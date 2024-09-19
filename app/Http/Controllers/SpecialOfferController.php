<?php

namespace App\Http\Controllers;

use App\Models\SpecialOffer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use RalphJSmit\Laravel\SEO\Support\SEOData;

class SpecialOfferController extends Controller
{
    public function index(): View
    {
        $seoData = new SEOData(

            title: 'Special offer',

            description: 'Description special offer'
        );

        return view('pages.special-offers.index', compact('seoData'));
    }

    public function loadSpecialOffer(Request $request): JsonResponse
    {

        $search = $request->input('search', null);

        $specialOffers = SpecialOffer::where('is_published', true)

            ->when($search, function ($query) use ($search) {

                $query->where('title', 'like', '%' . $search . '%');

            })

            ->with(['category'])

            ->orderBy('created_at', 'desc')

            ->get();

        return response()->json($specialOffers);
    }

    public function show(SpecialOffer $specialOffer): View
    {
        $seoData = new SEOData(

            title: $specialOffer->title,

            description: $specialOffer->meta_description
        );

        $specialOffer = $specialOffer->load(['category']);

        return view('pages.special-offers.detail', compact('seoData', 'specialOffer'));
    }
}
