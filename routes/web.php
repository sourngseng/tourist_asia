<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ServiceController;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('front-end');
// });

//for switching language route
Route::get('/lang/{locale}', function ($locale) {
	Session::put('locale', $locale);
	return redirect()->back();
});




Route::get('/example', function () {
    return "This is an example";
});

Route::get('/sum/{num1}/{num2}', function ($num1, $num2) {
    return $num1 + $num2;
});

Route::get('book/{title?}', function ($title=null) {
    $books=["asp.net", "laravel", "react","nodejs","java","csharp"];
    if($title==null){
        return $books;
    }
    $book=array_filter($books,fn($item)=>$item==$title);
    return $book;
});


// Route::get('posts/index',[PostController::class, 'index']);
// Route::get('posts/example1',[PostController::class, 'example1']);
// Route::get('posts/example2/{id}',[PostController::class, 'example2']);


Route::prefix("posts")->group(function(){
    Route::get('/index',[PostController::class, 'index']);
    Route::get('/example1',[PostController::class, 'example1']);
    Route::get('/example2/{id}',[PostController::class, 'example2']);

});

Auth::routes();


// All Admin Users Route List
Route::middleware(['auth','user-access:admin'])->group(function(){    
    Route::prefix("admin")->group(function(){
        Route::get('home', [HomeController::class, 'index'])->name('home');
        // Route::get('service',[ServiceController::class,'index'])->name('admin.service');
        // Route::get('service/create',[ServiceController::class,'create'])->name('admin.service.create');
        // Route::post('service/store',[ServiceController::class,'store'])->name('admin.service.store');    
        Route::resource('service',ServiceController::class);
    });
});


// All Normal Users Routes List
Route::middleware(['auth','user-access:user'])->group(function(){
    Route::get('/home',[HomeController::class,'index'])->name('home');
});


// All Manager Route List

Route::middleware(['auth','user-access:manager'])->group(function(){
    Route::get('/manager/home',[HomeController::class,'managerHome'])->name('manager.home');
});




Route::get('admin-sample',function(){
    // return view('layouts.admin_app');
    $data['services']=Service::get();
    return view('admin.services.list_sample',$data);
});
Route::get('admin-create',function(){
    // return view('layouts.admin_app');
    $data['services']=Service::get();
    return view('admin.sample_create_edit',$data);
});


Route::get('send-sms', [NotificationController::class, 'sendSmsNotificaition']);


Route::get('auth_sample',function(){
    return view('auth.auth_master');
});







