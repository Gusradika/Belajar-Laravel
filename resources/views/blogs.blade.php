@extends('layouts/main')

@section('container')
    <h1 class:"mb-5">{{ $title }}</h1>

    @if ($posts->count())
        {{-- Cards --}}
        <div class="card mb-3">
            <img src="https://source.unsplash.com/1200x400/?{{ $posts[0]->category->name }}" class="card-img-top"
                alt="{{ $posts[0]->category->name }}">
            <div class="card-body text-center">
                <h3 class="card-title"><a href="/blogs/{{ $posts[0]->slug }}"
                        class="text-decoration-none text-dark">{{ $posts[0]->judul }}</a></h3>
                <small class="text-muted">
                    <p>By. <a href="/author/{{ $posts[0]->User->username }}"
                            class="text-decoration-none">{{ $posts[0]->User->username }}</a> |
                        <a href="/categories/{{ $posts[0]->category->slug }}"
                            class="text-decoration-none">{{ $posts[0]->category->name }}</a>
                        {{ $posts[0]->created_at->diffForHumans() }}
                    </p>
                </small>

                <p class="card-text">{{ $posts[0]->excerpt }}</p>
                <a href="/blogs/{{ $posts[0]->slug }}" class="text-decoration-none btn btn-primary">Read More</a>
            </div>
        </div>
    @else
        <p class="fs-4 text-center">No Post Found.</p>
    @endif

    {{-- Card --}}

    <div class="container">
        <div class="row">
            @foreach ($posts->skip(1) as $post)
                <div class="col-md-3 mb-3">
                    <div class="card" style="width: 18rem;">
                        <div class="position-absolute bg-dark text-white p-3 px-3 py-2" style="opacity: 0.7"><a
                                href="/categories/{{ $post->category->slug }}"
                                class="text-decoration-none text-white">{{ $post->category->name }}</a></div>
                        <img src="https://source.unsplash.com/500x400/?{{ $post->category->name }}" class="card-img-top"
                            alt="{{ $post->category->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->judul }}</h5>
                            {{-- Small info --}}
                            <small class="text-muted">
                                <p>By. <a href="/author/{{ $post->User->username }}"
                                        class="text-decoration-none">{{ $post->User->username }}</a> |
                                    <a href="/categories/{{ $post->category->slug }}"
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
@endsection
