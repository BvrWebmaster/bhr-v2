<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class SpecialOfferController extends Controller
{
    public function index(): View
    {
        return view('pages.special-offers.index');
    }
}
