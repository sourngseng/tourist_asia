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


Route::get('master',function(){
    return view('front_master');
});