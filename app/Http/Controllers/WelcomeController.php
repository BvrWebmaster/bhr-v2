<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\View\View;
use RalphJSmit\Laravel\SEO\Support\SEOData;

class WelcomeController extends Controller
{
    public function __invoke(Request $request): View
    {
        $seoData = new SEOData(
          title: 'Welcome | BVR Bali holiday Rentals',
          description: 'Description'
        );

        $activeLocation = $request->input('location_id', 1);


        $promos = [
            'https://ik.imagekit.io/tvlk/image/imageResource/2024/04/03/1712115467746-43d8a7d781a6c5e16f40483552bdc2e8.png?tr=dpr-2,q-75,w-1280',
            'https://ik.imagekit.io/tvlk/image/imageResource/2024/04/03/1712115467746-43d8a7d781a6c5e16f40483552bdc2e8.png?tr=dpr-2,q-75,w-1280'
        ];

        $activities = Activity::where('is_published', true)

            ->orderBy('created_at', 'desc')

            ->with(['location', 'category'])

            ->limit(8)

            ->get();

        $locations = Location::all();

        return view('pages.welcome', compact('promos',  'locations', 'activities', 'activeLocation', 'seoData'));
    }
}
