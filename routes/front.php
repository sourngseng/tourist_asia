<?php

use App\Http\Controllers\FrontPageController;
use Illuminate\Support\Facades\Route;


Route::get('front-agency', function () {
    return view('front-agency'); // call view : front-agency.blade.php
});

Route::get('home', function () {
    return view('front_home');
});

Route::get('/',[FrontPageController::class,'index'])->name('front.home');
Route::get('/about',[FrontPageController::class,'about'])->name('front.about');
Route::get('/services',[FrontPageController::class,'services'])->name('front.services');
Route::get('/packages',[FrontPageController::class,'packages'])->name('front.packages');
Route::get('/destination',[FrontPageController::class,'destination'])->name('front.destination');
Route::get('/booking',[FrontPageController::class,'booking'])->name('front.booking');
Route::get('/guides',[FrontPageController::class,'guides'])->name('front.guides');
Route::get('/testimonial',[FrontPageController::class,'testimonial'])->name('front.testimonial');
Route::get('/contact',[FrontPageController::class,'contact'])->name('front.contact');


Route::get('master',function(){
    return view('front_master');
});