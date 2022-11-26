@extends('dashboard.layouts.maintrix')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create New Post</h1>
    </div>

    <div class="col-lg-8">

        <form method="post" action="/dashboard/posts">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Judul</label>
                {{-- <div class="form-text">Masukan Judul</div> --}}
                <input type="text" name="judul" class="form-control" id="title" placeholder="Judul...">
            </div>

            <div class="mb-3">
                <label for="slug2" class="form-label">Slug</label>
                {{-- <div class="form-text">Masukan Judul</div> --}}
                <input type="text" name="slug" class="form-control" id="slug2" placeholder="Generated via API"
                    disabled readonly>
            </div>

            {{-- Category --}}
            <div class="mb-3">
                <label for="category" class="form-label">Categories</label>
                {{-- <div class="form-text">Masukan Judul</div> --}}
                <select class="form-select" name="category_id" aria-label="Default select example">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Excerpt --}}
            <div class="mb-3">
                <label for="y" class="form-label">Body</label>
                {{-- <div class="form-text">Masukan Judul</div> --}}
                <input id="x" value="" type="hidden" name="content">
                <trix-editor input="x" id="y" placeholder="Tuliskan artikelmu disini..."></trix-editor>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>


    </div>


    {{-- Java Script Fetch API untuk SLug auto --}}
    <script>
        const judul = document.querySelector('#title');
        const inputform = document.querySelector('#slug2');

        judul.addEventListener('change', function() {
            // ngirim GET ke route -> CONTROLLER -> MODEL -> isi data melalui JS
            fetch('/dashboard/posts/checkSlug?judul=' + judul.value)
                .then((response) => response.json())
                .then((data) => inputform.value = data)
                .then((data) => console.log(data));

        });

        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        })
    </script>
@endsection
