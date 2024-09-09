<?php

namespace App\Http\Controllers;

use App\Models\Accomodation;
use App\Models\Location;
use Illuminate\View\View;

class WelcomeController extends Controller
{
    public function __invoke(): View
    {
        $promos = [
            'https://ik.imagekit.io/tvlk/image/imageResource/2024/04/03/1712115467746-43d8a7d781a6c5e16f40483552bdc2e8.png?tr=dpr-2,q-75,w-1280',
            'https://ik.imagekit.io/tvlk/image/imageResource/2024/04/03/1712115467746-43d8a7d781a6c5e16f40483552bdc2e8.png?tr=dpr-2,q-75,w-1280'
        ];

        $accomodations = Accomodation::query()

            ->with(['category', 'location', 'facilities'])

            ->limit(2)

            ->get();

        $locations = Location::limit(3)->get();


        return view('pages.welcome', compact('promos', 'accomodations', 'locations'));
    }
}
