<?php

namespace App\Http\Controllers;

use App\Models\post;
use App\Models\category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;

class dashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        // return post::where('user_id', auth()->user()->id)->get();
        return view('dashboard.posts.index', [
            'posts' => post::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.posts.create', ['categories' => category::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|max:255',
            'slug' => ['required', 'unique:posts'],
            'category_id' => 'required',
            'body' => 'required'
        ]);

        $validatedData = [
            'user_id' => auth()->user()->id,
            // Strip_tags digunakan untuk menghapus Tags, STR limit untuk Substring
            'excerpt' => Str::limit(strip_tags($request->body), 200, '...'),
            'judul' => $request->judul,
            'slug' => $request->slug,
            'category_id' => $request->category_id,
            'body' => $request->body
        ];

        // dd($validatedData);

        post::create($validatedData);
        return redirect('/dashboard/posts')->with('success', 'New Post has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(post $post)
    {
        return view('dashboard.posts.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(post $post)
    {
        return view('dashboard.posts.edit', [
            'post' => $post,
            'categories' => category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, post $post)
    {
        $rules = [
            'judul' => 'required|max:255',
            'category_id' => 'required',
            'body' => 'required'
        ];

        if ($request->slug != $post->slug) {
            $rules['slug'] = ['required', 'unique:posts'];
        }

        $validatedData = $request->validate($rules);

        $validatedData = [
            'user_id' => auth()->user()->id,
            // Strip_tags digunakan untuk menghapus Tags, STR limit untuk Substring
            'excerpt' => Str::limit(strip_tags($request->body), 200, '...'),
            'judul' => $request->judul,
            'slug' => $request->slug,
            'category_id' => $request->category_id,
            'body' => $request->body
        ];

        post::where('id', $post->id)->update($validatedData);
        // Atau gunakan Create or Update method
        return redirect('/dashboard/posts')->with('success', 'New Post has been added!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(post $post)
    {
        //
        post::destroy($post->id);
        return redirect('dashboard/posts')->with('deleted', 'Post has been deleted');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(post::class, 'slug', $request->judul);
        return response()->json($slug);
    }
}