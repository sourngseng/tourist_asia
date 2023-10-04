<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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
