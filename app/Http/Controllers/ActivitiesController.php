<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\ActivityCategory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use PhpParser\Builder;
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

    public function loadActivitiesCategories(): JsonResponse
    {
        $activitiesCategories = ActivityCategory::all();

        return response()->json($activitiesCategories);
    }

    public function loadActivities(Request $request): JsonResponse
    {
        $categoryActivities = $request->input('category', null);

        $sortByName = $request->input('sortName', null);

        $searchActivities = $request->input('search', null);

        $activities = Activity::where('is_published', true)

            ->when($categoryActivities, function ($query, $categoryActivities) {

                $query->whereIn('category_id', $categoryActivities);

            })

            ->when($sortByName,  function ($query) use ($sortByName){

                $query->orderBy('name', $sortByName);

            })

            ->when($searchActivities, function ($query) use ($searchActivities) {
                $query->where('name', 'like', '%' . $searchActivities . '%');
            })

            ->orderBy('created_at', 'desc')

            ->with(['location', 'category'])

            ->paginate(8);

        return response()->json($activities);
    }
}
