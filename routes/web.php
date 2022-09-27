<?php

use Illuminate\Support\Facades\Route;

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
    return view('home');
});

Route::get('/blogs', function () {
    return view('blogs');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/home', function () {
    return view('home');
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
