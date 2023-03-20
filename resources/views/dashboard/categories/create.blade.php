@extends('dashboard.layouts.main')

@section('container')
<x-dashboard-title title="Create new category" />

  <div class="col-lg-8">
    <form action="/dashboard/categories" method="POST" class="mb-5">
      @csrf

      <div class="mb-3">
        <label for="name" class="form-label">Category Name</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Category Name" name="name" maxlength="50" required value="{{ @old('name') }}" autofocus>

        @error('name')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="slug" class="form-label">Slug</label>
        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" placeholder="Category Name" name="slug" readonly value="{{ @old('slug') }}">

        @error('slug')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <button type="submit" class="btn btn-primary">Create Category</button>
    </form>
  </div>

  <script>
    const name = document.querySelector('#name');
    const slug = document.querySelector('#slug');


    name.addEventListener('change', function() {
      fetch('/dashboard/categories/createSlug?name=' + name.value)
      .then(response => response.json())
      .then(data => slug.value = data.slug);
    });
  </script>
@endsection
