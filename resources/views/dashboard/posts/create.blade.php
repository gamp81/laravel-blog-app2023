@extends('dashboard.layouts.main')

@section('container')
  <x-dashboard-title title="Create new post" />

  <div class="col-lg-8">
    <form action="/dashboard/posts" method="POST" class="mb-5" enctype="multipart/form-data">
      @csrf

      <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Title" name="title" maxlength="50" required value="{{ @old('title') }}" autofocus>

        @error('title')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="slug" class="form-label">Slug</label>
        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" placeholder="title" name="slug" readonly value="{{ @old('slug') }}">

        @error('slug')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="category" class="form-label">Category</label>
        <select class="form-select" name="category_id" id="category" required>
          @foreach ($categories as $category)
            @if((int)old('category_id') === $category->id)
              <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
            @else
              <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endif
          @endforeach
        </select>
      </div>

      <div class="mb-3">
        <label for="image" class="form-label @error('image') is-invalid @enderror">Post Image</label>
        <img class="img-preview img-fluid mb-3 col-sm-5">
        <input class="form-control" type="file" id="image" name="image" onchange="previewImage()">

        @error('image')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="body" class="form-label">Content</label>
        <input id="body" class="form-control @error('content') is-invalid @enderror" type="hidden" name="body" required value="{{ @old('body') }}">
        <trix-editor input="body"></trix-editor>

        @error('content')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>

      <button type="submit" class="btn btn-primary">Create Post</button>
    </form>
  </div>

  <script>
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');
    const image = document.querySelector('#image');
    const imagePreview = document.querySelector('.img-preview');

    title.addEventListener('change', function() {
      fetch('/dashboard/posts/createSlug?title=' + title.value)
      .then(response => response.json())
      .then(data => slug.value = data.slug);
    });

    function previewImage(event) {
      imagePreview.style.display = 'block';

      const oFReader = new FileReader();
      oFReader.readAsDataURL(image.files[0]);

      oFReader.onload = function(oFREvent) {
        imagePreview.src = oFREvent.target.result;
      }
    };
  </script>
@endsection
