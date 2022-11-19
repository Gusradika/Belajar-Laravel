@extends('layouts/main')

@section('container')
    @foreach ($posts as $x)
        <article class="mb-5 border-bottom pb-4">
            <h2> <a href="/blogs/{{ $x->slug }}" class="text-decoration-none"> {{ $x->judul }} </a></h2>
            <p>By. <a href="/author/{{ $x->user->username }}" class="text-decoration-none">{{ $x->User->username }}</a> | <a
                    href="/categories/{{ $x->category->slug }}" class="text-decoration-none">{{ $x->category->name }}</a></p>
            {{-- <h3>{{ $x['author'] }}</h3> --}}
            <p>{{ $x->excerpt }}</p>
            <a href="/blogs/{{ $x->slug }}" class="text-decoration-none">Read more...</a>
        </article>
    @endforeach
@endsection
