<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;


class postController extends Controller
{
    public function index()
    {
        return view('blogs', ["title" => "All Posts", "active" => 'Blogs',  "posts" => post::latest()->get()]);
    }

    public function show(post $post)
    {
        return view('blog', [
            "title" => "Single Post",
            "active" => 'Blogs',
            "post" => $post
        ]);
    }
}