<?php

namespace App\Http\Controllers;

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
}
