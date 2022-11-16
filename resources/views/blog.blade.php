@extends('layouts/main')

@section('container')
    <h2>{{ $post->judul }}</h2>
    {{-- <h5>{{ $post['author'] }}</h5> --}}
    {!! $post->body !!}

    <a href="/blogs"><button>Back</button></a>
@endsection
