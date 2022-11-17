@extends('layouts/main')

@section('container')
    <h2>{{ $post->judul }}</h2>
    {{-- <h5>{{ $post['author'] }}</h5> --}}
    <p>By. Aditya Kesuma <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a></p>
    {!! $post->body !!}

    <a href="/blogs"><button>Back</button></a>
@endsection
