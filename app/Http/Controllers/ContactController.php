<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use RalphJSmit\Laravel\SEO\Support\SEOData;

class ContactController extends Controller
{
    public function index(): View
    {
        $seoData = new SEOData(

            title: 'Contact',

            description: 'Description contact'

        );

        return view('pages.contact.index', compact('seoData'));
    }
}
