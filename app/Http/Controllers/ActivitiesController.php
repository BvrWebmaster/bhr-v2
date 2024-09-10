<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class ActivitiesController extends Controller
{
    public function index(): View
    {
        return view('pages.activities.index');
    }
}
