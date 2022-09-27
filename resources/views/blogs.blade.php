@extends('layouts/main')

@section('container')

@foreach($posts as $x)
<article class="mb-5">
    <h2>{{ $x["judul"] }}</h2>
    <h3>{{ $x["author"] }}</h3>
    <p>{{ $x["body"] }}</p>
</article>
@endforeach

@endsection