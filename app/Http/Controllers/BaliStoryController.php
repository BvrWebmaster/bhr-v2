<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use RalphJSmit\Laravel\SEO\Support\SEOData;

class BaliStoryController extends Controller
{
    public function index(): View
    {
        $seoData = new SEOData(

            title: 'Bali story',

            description: 'Description Bali stories'
        );

        return view('pages.bali-stories.index', compact('seoData'));
    }
}
