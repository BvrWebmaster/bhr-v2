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

        $baliStories = [
            [
                'images' => 'https://www.bvrbaliholidayrentals.com/storage/images//655d768ca86a1.png',
                'title' => 'Sea Festival'
            ],
            [
                'images' => 'https://www.bvrbaliholidayrentals.com/storage/images//65aa1a05c7558.JPG',
                'title' => 'Ride The Adventure'
            ],
            [
                'images' => 'https://www.bvrbaliholidayrentals.com/storage/images//655d768ca86a1.png',
                'title' => 'Sea Festival'
            ],
            [
                'images' => 'https://www.bvrbaliholidayrentals.com/storage/images//65aa1a05c7558.JPG',
                'title' => 'Ride The Adventure'
            ],
        ];



        return view('pages.bali-stories.index', compact('seoData', 'baliStories'));
    }

    public function show(string $slug): View
    {
        $baliStories = [
            [
                'images' => 'https://www.bvrbaliholidayrentals.com/storage/images//655d768ca86a1.png',
                'title' => 'Sea Festival'
            ],
            [
                'images' => 'https://www.bvrbaliholidayrentals.com/storage/images//65aa1a05c7558.JPG',
                'title' => 'Ride The Adventure'
            ],
            [
                'images' => 'https://www.bvrbaliholidayrentals.com/storage/images//655d768ca86a1.png',
                'title' => 'Sea Festival'
            ],
            [
                'images' => 'https://www.bvrbaliholidayrentals.com/storage/images//65aa1a05c7558.JPG',
                'title' => 'Ride The Adventure'
            ],
        ];

        $seoData = new SEOData(

            title: 'detail bali',

            description: 'description detail bali stories'
        );

        return view('pages.bali-stories.detail', compact('seoData', 'baliStories'));
    }
}
