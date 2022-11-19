@extends('layouts/main')

@section('container')
    <h1 class="mb-5">{{ $title }}</h1>

    <div class="container">
        <div class="row">
            @foreach ($category as $x)
                <div class="col-md-4">
                    <div class="card text-bg-dark">
                        <a href="/categories/{{ $x->slug }}">
                            <img src="https://source.unsplash.com/500x500/?{{ $x->name }}" class="card-img"
                                alt="{{ $x->name }}">
                        </a>
                        <a href="/categories/{{ $x->slug }}" class="text-decoration-none text-white">
                            <div class="card-img-overlay d-flex align-items-center p-0">
                                <h5 class="card-title  flex-fill p-4 text-center fs-3"
                                    style="background-color: rgba(0,0,0,0.7)">
                                    {{ $x->name }}
                                </h5>
                        </a>
                    </div>
                </div>
        </div>
        @endforeach

    </div>
    </div>
@endsection
