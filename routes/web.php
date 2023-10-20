<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Models\Category;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\Pegawai;

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
    return view('home', [
        'title'=>'home'
    ]);
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


Route::get('/posts/categories/{category:slug}', function (Category $category) {
    return view('category', [
        'title'=>$category->name,
        'posts' => $category->posts,
        'category'=>$category->name
    ]);
});




Route::get('/scores', [ScoreController::class, 'index']);
//Route::post('/scores', [ScoreController::class, 'search']);

//Route::post('/scores/add', [ScoreController::class, 'create'])->name('add');


//Route::post('/scores/add', [Pegawai::class, 'handleForm'])->name('add');
Route::get('/data-pegawai', [Pegawai::class, 'index'])->name('data-pegawai');
Route::post('/add', [Pegawai::class, 'handleForm'])->name('data-pegawai');
Route::post('/data-pegawai/search', [Pegawai::class, 'search'])->name('search');

Route::get('/tabelFrekuensi', [Pegawai::class, 'tabelFrekuensi'])->name('tabelFrekuensi');
Route::get('bergolong', [Pegawai::class, 'bergolong'])->name('bergolong');

Route::get('/crud', [Pegawai::class, 'crud'])->name('crud');

Route::delete('/scores/{score}', [Pegawai::class, 'destroy'])->name('scores.destroy');
Route::get('add' , [Pegawai::class, 'add']);

Route::get('/edit/{id}', [Pegawai::class, 'crudEdit'])->name('edit');


Route::put('/crud/{score}', [Pegawai::class, 'update'])->name('pegawai.update');
