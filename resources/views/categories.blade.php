@extends('layouts/main')

@section('container')
    <h1 class="mb-5">{{ $title }}</h1>
    @foreach ($category as $x)
        <article class="mb-5">
            <ul>
                <li>
                    <h2> <a href="/categories/{{ $x->slug }}"> {{ $x->name }} </a></h2>
                    {{-- <h3>{{ $x['author'] }}</h3> --}}
                </li>
            </ul>
        </article>
    @endforeach
@endsection
