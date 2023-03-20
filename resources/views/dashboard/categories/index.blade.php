@extends('dashboard.layouts.main')

@section('container')
  <x-dashboard-title title="Post Categories" />

  @if (session('status_category'))
    <div class="alert alert-{{ session('type') }} alert-dismissible col-lg-5" role="alert">
      <div>{{ session('status_category') }}</div>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif
  @if($categories->count())
  <div class="table-responsive col-lg-5">

    <a href="categories/create" class="btn btn-primary mb-3 btn-sm">Create new category</a>

    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Category Name</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($categories as $category)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $category->name }}</td>
            <td>
              <a href="categories/{{ $category->slug }}/edit" class="bg-warning badge"> <span data-feather="edit"></span></a>
              <form action="{{ route('categories.destroy', $category->slug) }}" method="POST" class="d-inline">
                @method('delete')
                @csrf
                <button class="bg-danger badge border-0" onclick="return confirm('Are you sure?')"> <span data-feather="trash"></span></button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  @else
    <h6 class="text-center mt-3">You don't have any categories yet. Please add category first <a href="categories/create">here.</a></h6>    
  @endif
@endsection