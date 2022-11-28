@extends('dashboard.layouts.main')

@section('container')
    <div class="container">
        <div class="row  mb-5">
            <div class="col-lg-8">
                <h2 class="mt-3">{{ $post->judul }}</h2>
                {{-- <h5>{{ $post['author'] }}</h5> --}}
                <p>By. <a href="/blogs?User={{ $post->user->username }}">{{ $post->User->name }}</a> <a
                        href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a></p>

                <a href="/dashboard/posts" class="btn btn-success"><span data-feather="arrow-left"></span> Back</a>
                <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning"><span
                        data-feather="text-edit"></span> Edit</a>
                <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger" onclick="return confirm('Are you sure?')"><span
                            data-feather="x-circle"></span>Delete</button>
                </form>

                <img src="https://source.unsplash.com/1400x400/?{{ $post->category->name }}" alt=""
                    class="img-fluid">

                <article class="my-3 fs-5">
                    {!! $post->body !!}
                </article>
            </div>
        </div>
    </div>
@endsection
