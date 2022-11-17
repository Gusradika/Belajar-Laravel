@extends('layouts/main')

@section('container')
    <h1 class="mb-5">Post Category : {{ $category }}</h1>
    @foreach ($posts as $x)
        <article class="mb-5">
            <h2> <a href="/blogs/{{ $x->slug }}"> {{ $x->judul }} </a></h2>
            {{-- <h3>{{ $x['author'] }}</h3> --}}
            <p>{{ $x->excerpt }}</p>
        </article>
    @endforeach
@endsection
