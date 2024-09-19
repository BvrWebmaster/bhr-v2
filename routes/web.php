<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\AccomodationController;
use App\Http\Controllers\HotelsAndVillaController;
use App\Http\Controllers\ActivitiesController;
use App\Http\Controllers\BaliStoryController;
use App\Http\Controllers\SpecialOfferController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LocationController;

Route::get('/', WelcomeController::class)->name('welcome');
Route::get('accomodations', AccomodationController::class)->name('accomodations');
Route::get('hotels-and-villa', [HotelsAndVillaController::class, 'index'])->name('hotels-and-villa.index');
Route::get('hotels-and-villa/{accomodation:slug}', [HotelsAndVillaController::class, 'show'])->name('hotels-and-villa.detailed');
Route::get('load-accomodations', [HotelsAndVillaController::class, 'loadHotelsAndVilla'])->name('load-hotels-and-villa');
Route::get('activities', [ActivitiesController::class, 'index'])->name('activities.index');
Route::get('activities-categories', [ActivitiesController::class, 'loadActivitiesCategories'])->name('activities-categories.index');
Route::get('load-activities', [ActivitiesController::class, 'loadActivities'])->name('activities.list');
Route::get('activities/{activity:slug}', [ActivitiesController::class, 'show'])->name('activities.detailed');
Route::get('bali-stories', [BaliStoryController::class, 'index'])->name('bali-stories.index');
Route::get('bali-stories/{slug}', [BaliStoryController::class,'show'])->name('bali-stories.detail');
Route::get('special-offers', [SpecialOfferController::class, 'index'])->name('special-offers.index');
Route::get('load-special-offers', [SpecialOfferController::class, 'loadSpecialOffer'])->name('special-offers.load');
Route::get('special-offers/{specialOffer:slug}', [SpecialOfferController::class, 'show'])->name('special-offers.detail');
Route::get('contact', [ContactController::class, 'index'])->name('contact.index');
Route::get('location', [LocationController::class, 'index'])->name('location');
