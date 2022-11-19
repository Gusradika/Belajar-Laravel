@extends('layouts/main')

@section('container')
    <div class="container">
        <div class="row justify-center mb-5">
            <div class="col-md8">
                <h2>{{ $post->judul }}</h2>
                {{-- <h5>{{ $post['author'] }}</h5> --}}
                <p>By. <a href="/author/{{ $post->user->username }}">{{ $post->User->name }}</a> <a
                        href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a></p>

                <img src="https://source.unsplash.com/1400x400/?{{ $post->category->name }}" alt="" class="img-fluid">

                <article class="my-3 fs-5">
                    {!! $post->body !!}
                </article>

                <a href="/blogs"><button>Back</button></a>
            </div>
        </div>
    </div>
@endsection
