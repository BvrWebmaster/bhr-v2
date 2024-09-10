<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\AccomodationController;

Route::get('/', WelcomeController::class)->name('welcome');
Route::get('accomodations', [AccomodationController::class, 'index'])->name('accomodations');

