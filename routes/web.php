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
    return view('home', ["title" => "Home"]);
});

Route::get('/blogs', function () {

    $blog_posts = [
        [
            "judul" => "Ashiapp1",
            "author" => "Aditya Kesuma",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Non nemo aliquam amet minima! Nostrum voluptatibus laudantium, quaerat, veniam, ex sapiente maxime ea perspiciatis eius est accusantium suscipit laboriosam esse sequi laborum libero repellat saepe blanditiis cupiditate optio asperiores quod beatae! Assumenda, soluta vel itaque quia ratione veritatis provident consequatur debitis eos? Laudantium at, harum dolor fuga consequuntur doloribus magnam necessitatibus nulla asperiores non rem sint porro libero totam ea eum amet consectetur quam officia eaque veritatis blanditiis sequi fugit mollitia?"
        ],
        [
            "judul" => "Ashiap2",
            "author" => "Aditya Kesuma",
            "body"  => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates quibusdam dolore eos perferendis, fugiat voluptas sit provident neque quia dolores rerum quisquam, culpa nemo sed, fuga animi modi repellendus minima repudiandae! Eius accusantium soluta cumque dolor nulla fugiat maxime earum."
        ]
    ];
    return view('blogs', ["title" => "Blogs", "posts" => $blog_posts]);
});

Route::get('/about', function () {
    return view('about', ["title" => "About"]);
});

Route::get('/home', function () {
    return view('home', ["title" => "Home"]);
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
