@extends('layouts/main')

@section('container')
    <div class="container">
        <div class="row justify-center mb-5">
            <div class="col-md-8">
                <h2>{{ $post->judul }}</h2>
                {{-- <h5>{{ $post['author'] }}</h5> --}}
                <p>By. <a href="/blogs?User={{ $post->User->username }}">{{ $post->User->name }}</a>
                    <a href="/blogs?category={{ $post->category->slug }}">{{ $post->category->name }}</a>
                </p>

                @if ($post->image)
                    <div class="" style="max-height: 400px; max-width: 1400px; overflow: hidden">
                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->image }}" class="img-fluid">
                    </div>
                @else
                    <img src="https://source.unsplash.com/1400x400/?{{ $post->category->name }}" alt=""
                        class="img-fluid">
                @endif

                <article class="my-3 fs-5">
                    {!! $post->body !!}
                </article>

                <a href="/blogs"><button>Back</button></a>
            </div>
        </div>
    </div>
@endsection
