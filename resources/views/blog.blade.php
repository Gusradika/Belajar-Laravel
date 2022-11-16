@extends('layouts/main')

@section('container')
    <h2>{{ $post['judul'] }}</h2>
    <h5>{{ $post['author'] }}</h5>
    <p>{{ $post['body'] }}</p>

    <a href="/blogs"><button>Back</button></a>
@endsection