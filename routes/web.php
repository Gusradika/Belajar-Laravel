<?php

use App\models\post;
use App\models\User;

use App\Models\category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\postController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\registerController;

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
    return view('home', ["title" => "Home", "active" => "Home"]);
});

Route::get('/blogs', [postController::class, 'index']);

// Single Post
Route::get('/blogs/{post:slug}', [postController::class, 'show']);

Route::get('/about', function () {
    return view('about', ["title" => "About", "active" => "About"]);
});

Route::get('/home', function () {
    return view('home', ["title" => "Home", "active" => "Home"]);
});

Route::get('/categories/{category:slug}', function (category $category) {
    return view('blogs', ['title' => "Post by Category : $category->name", "active" => 'Categories', 'posts' => $category->posts]);
});

Route::get('/categories', function () {
    return view('categories', ['title' => 'Category Post', "active" => 'Categories', 'category' => category::all()]);
});

Route::get('/author/{user:username}', function (User $user) {
    return view('blogs', ['title' => "Post by Author : $user->name", "active" => 'blogs', 'posts' => $user->post->load('category', 'User')]);
});

// Routing with Variable
Route::get('/login', [loginController::class, 'index']);

Route::get('/register', [registerController::class, 'index']);
Route::post('/register', [registerController::class, 'store']);