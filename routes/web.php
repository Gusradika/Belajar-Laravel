<?php

use App\models\post;
use App\models\User;

use App\Models\category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\postController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\adminCategoryController;
use App\Http\Controllers\dashboardPostController;

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
Route::get('/login', [loginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [loginController::class, 'authenticate']);

Route::post('/logout', [loginController::class, 'logout']);

Route::get('/register', [registerController::class, 'index'])->middleware('guest');
Route::post('/register', [registerController::class, 'store']);

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware('auth');

// Middleware akan ada ditengah ada auth dan guest



// Resource
// Method get -> index, post -> store, put -> update, delete -> destroy
Route::get('dashboard/posts/checkSlug', [dashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::resource('dashboard/posts', dashboardPostController::class)->middleware('auth');

Route::resource('dashboard/categories', adminCategoryController::class)->except('show')->middleware('admin');