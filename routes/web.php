<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Models\Category;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('home', function () {
    return view('home',[
        "title" => "home"
    ]);
});

Route::get('about', function () {
    return view('about');
});


Route::get('posts', [PostController::class, 'index'])->name('posts');



Route::get('posts/{post:slug}', [PostController::class, 'view']);


Route::get('categories/{category:slug', function (Category $category) {
    return view('category', [
        'title'=>$category->name,
        'send' => $category->posts,
        'category'=>$category->name
    ]);
});


 