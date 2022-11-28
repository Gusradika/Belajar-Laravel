@extends('layouts/main')

@section('container')
    <h1 class="mb-3 mt-3 text-center">{{ $title }}</h1>

    {{-- Search --}}
    <div class="row justify-content-center">
        <div class="col-md-6">
            {{-- Default = Method Get  --}}
            <form action="/blogs" method="GET">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                @if (request('User'))
                    <input type="hidden" name="User" value="{{ request('User') }}">
                @endif
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search..." name="search"
                        value="{{ request('search') }}">
                    <button class="btn btn-danger" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>

    {{-- Hero Image --}}
    @if ($posts->count())
        {{-- Cards --}}
        <div class="card mb-3">

            @if ($posts[0]->image)
                <a href="/blogs/{{ $posts[0]->slug }}">
                    <div class="justify-content-center d-flex bg-light">

                        <img src="{{ asset('storage/' . $posts[0]->image) }}" alt="{{ $posts[0]->image }}" class="img-fluid"
                            style="max-height: 400px; max-width: 1400px; overflow: hidden; ">

                    </div>
                </a>
            @else
                <img src="https://source.unsplash.com/1200x400/?{{ $posts[0]->category->name }}" class="card-img-top"
                    alt="{{ $posts[0]->category->name }}">
            @endif


            <div class="card-body text-center">
                <h3 class="card-title"><a href="/blogs/{{ $posts[0]->slug }}"
                        class="text-decoration-none text-dark">{{ $posts[0]->judul }}</a></h3>
                <small class="text-muted">
                    <p>By. <a href="/blogs?User={{ $posts[0]->User->username }}"
                            class="text-decoration-none">{{ $posts[0]->User->username }}</a> |
                        <a href="/blogs?category={{ $posts[0]->category->slug }}"
                            class="text-decoration-none">{{ $posts[0]->category->name }}</a>
                        {{ $posts[0]->created_at->diffForHumans() }}
                    </p>
                </small>

                <p class="card-text">{{ $posts[0]->excerpt }}</p>
                <a href="/blogs/{{ $posts[0]->slug }}" class="text-decoration-none btn btn-primary">Read More</a>
            </div>
        </div>


        {{-- Card --}}

        <div class="container">
            <div class="row">
                @foreach ($posts->skip(1) as $post)
                    <div class="col-md-3 mb-3">
                        <div class="card" style="width: 18rem;">
                            <div class="position-absolute bg-dark text-white p-3 px-3 py-2" style="opacity: 0.7"><a
                                    href="/blogs?category={{ $post->category->slug }}"
                                    class="text-decoration-none text-white">{{ $post->category->name }}</a></div>
                            <img src="https://source.unsplash.com/500x400/?{{ $post->category->name }}"
                                class="card-img-top" alt="{{ $post->category->name }}">
                            <div class="card-body">
                                <h5 class="card-title"><a href="/blogs/{{ $post->slug }}"
                                        class="text-decoration-none text-dark">{{ $post->judul }}</a></h5>
                                {{-- Small info --}}
                                <small class="text-muted">
                                    <p>By. <a href="/blogs?User={{ $post->User->username }}"
                                            class="text-decoration-none">{{ $post->User->username }}</a> |
                                        <a href="/blogs?category={{ $post->category->slug }}"
                                            class="text-decoration-none">{{ $post->category->name }}</a>
                                        {{ $post->created_at->diffForHumans() }}
                                    </p>
                                </small>

                                <p class="card-text">{{ $post->excerpt }}</p>
                                <a href="/blogs/{{ $post->slug }}" class="btn btn-primary">Read More...</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <p class="fs-4 text-center">No Post Found.</p>
    @endif

    <div class="d-flex justify-content-center">
        {{ $posts->links() }}
    </div>

@endsection
