<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;


class postController extends Controller
{
    public function index()
    {
        return view('blogs', ["title" => "All Posts",  "posts" => post::with(['User', 'category'])->latest()->get()]);
    }

    public function show(post $post)
    {
        return view('blog', [
            "title" => "Single Post",
            "post" => $post
        ]);
    }
}