@extends('dashboard.layouts.maintrix')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Post</h1>
    </div>

    <div class="col-lg-8">

        <form method="post" action="/dashboard/posts/{{ $post->slug }}">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Judul</label>
                {{-- <div class="form-text">Masukan Judul</div> --}}
                <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" id="title"
                    placeholder="Judul..." required autofocus value="{{ old('judul', $post->judul) }}">
                @error('judul')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                {{-- <div class="form-text">Masukan Judul</div> --}}
                <input type="text" name="slug"
                    class="form-control bg-light shadow-none @error('slug') is-invalid @enderror" id="slug"
                    placeholder="Generated via API" value="{{ old('slug', $post->slug) }}" readonly required>
                @error('slug')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- Category & logic Selected is OLD --}}
            <div class="mb-3">
                <label for="category" class="form-label">Categories</label>
                {{-- <div class="form-text">Masukan Judul</div> --}}
                <select class="form-select @error('category_id') is-invalid @enderror" name="category_id"
                    aria-label="Default select example" required>
                    @foreach ($categories as $category)
                        @if (old('category_id', $post->category_id) == $category->id)
                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                        @else
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endif
                    @endforeach
                </select>
                @error('category_id')
                    {{ $message }}
                @enderror
            </div>

            {{-- Excerpt --}}
            <div class="mb-3">
                <label for="y" class="form-label">Body</label>

                {{-- <div class="form-text">Masukan Judul</div> --}}
                <input id="x" value="{{ old('body', $post->body) }}" type="hidden" name="body" required>
                <trix-editor input="x" id="y" placeholder="Tuliskan artikelmu disini..."></trix-editor>
                @error('body')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>


    </div>


    {{-- Java Script Fetch API untuk SLug auto --}}
    <script>
        const judul = document.querySelector('#title');
        const inputform = document.querySelector('#slug');

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
