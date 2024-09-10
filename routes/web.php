<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\AccomodationController;
use App\Http\Controllers\HotelsAndVillaController;

Route::get('/', WelcomeController::class)->name('welcome');
Route::get('accomodations', AccomodationController::class)->name('accomodations');
Route::get('hotels-and-villa', [HotelsAndVillaController::class, 'index'])->name('hotels-and-villa.index');
Route::get('load-accomodations', [HotelsAndVillaController::class, 'loadHotelsAndVilla'])->name('load-hotels-and-villa');
