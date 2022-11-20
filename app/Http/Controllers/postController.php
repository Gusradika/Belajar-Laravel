<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;


class postController extends Controller
{

    public function index()
    {
        // dd(request('search'));
        $query = post::latest();

        // seharusnya tugasnya model jadi bukan tugas controller. Gunakan Query Scope -> Eloquent ORM
        // if (request('search')) {
        //     $query->where('judul', 'like', '%' . request('search') . '%')
        //         ->orWhere('body', 'like', '%' . request('search') . '%');
        // }

        return view('blogs', [
            "title" => "All Posts",
            "active" => 'Blogs',
            // Paginater
            "posts" => post::latest()->filter(request(['search', 'category', 'User']))->Paginate(9)->withQueryString()
        ]);
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