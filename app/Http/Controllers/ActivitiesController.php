<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\View\View;
use RalphJSmit\Laravel\SEO\Support\SEOData;

class ActivitiesController extends Controller
{
    public function index(): View
    {
        $seoData = new SEOData(

            title: 'Activities | BVR Bali Holiday Rentals',

            description: 'Description activities page'
        );

        return view('pages.activities.index', compact('seoData'));
    }
}
