<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\AccomodationController;

Route::get('/', WelcomeController::class)->name('welcome');
Route::get('accomodations', [AccomodationController::class, 'filterAccomodation'])->name('accomodations');
Route::get('hotels-and-villa', [AccomodationController::class, 'index'])->name('hotels-and-villa.index');

