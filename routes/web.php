<?php

use App\models\post;

use App\Models\category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\postController;

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
    return view('home', ["title" => "Home"]);
});

Route::get('/blogs', [postController::class, 'index']);

// Single Post
Route::get('/blogs/{post:slug}', [postController::class, 'show']);

Route::get('/about', function () {
    return view('about', ["title" => "About"]);
});

Route::get('/home', function () {
    return view('home', ["title" => "Home"]);
});

Route::get('/categories/{category:slug}', function (category $category) {
    return view('category', ['title' => $category->name, 'posts' => $category->posts, 'category' => $category->slug]);
});

Route::get('/categories', function () {
    return view('categories', ['title' => 'Category Post', 'category' => category::all()]);
});

// Routing with Variable
Route::get('/home2', function () {
    return view(
        'home2',
        [
            "nama" => "Aditya Kesuma",
            "nim" => "21410100039",
            "jurusan" => "S1 Sistem Informasi",
            "universitas" => "Universitas Dinamika"
        ]
    );
});