<?php

namespace App\Http\Controllers;

use App\Models\Accomodation;
use App\Models\Activity;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\View\View;

class WelcomeController extends Controller
{
    public function __invoke(Request $request): View
    {
        $activeLocation = $request->input('location_id', 1);


        $promos = [
            'https://ik.imagekit.io/tvlk/image/imageResource/2024/04/03/1712115467746-43d8a7d781a6c5e16f40483552bdc2e8.png?tr=dpr-2,q-75,w-1280',
            'https://ik.imagekit.io/tvlk/image/imageResource/2024/04/03/1712115467746-43d8a7d781a6c5e16f40483552bdc2e8.png?tr=dpr-2,q-75,w-1280'
        ];

        $activities = Activity::where('is_published', true)

            ->orderBy('created_at', 'desc')

            ->with(['location', 'category'])

            ->limit(4)

            ->get();

        $locations = Location::all();


        return view('pages.welcome', compact('promos',  'locations', 'activities', 'activeLocation'));
    }
}
