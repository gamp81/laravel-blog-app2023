@extends('dashboard.layouts.main')

@section('container')
  <x-dashboard-title title="My Posts" />

  @if (session('status_post'))
    <div class="alert alert-{{ session('type') }} alert-dismissible col-lg-8" role="alert">
      <div>{{ session('status_post') }}</div>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif
  @if($posts->count())
  <div class="table-responsive col-lg-8">

    <a href="/dashboard/posts/create" class="btn btn-primary mb-3 btn-sm">Create new post</a>

    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Title</th>
          <th scope="col">Category</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($posts as $post)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $post->title }}</td>
            <td>{{ $post->category->name }}</td>
            <td>
              <a href="/dashboard/posts/{{ $post->slug }}" class="bg-info badge"> <span data-feather="eye"></span></a>
              <a href="/dashboard/posts/{{ $post->slug }}/edit" class="bg-warning badge"> <span data-feather="edit"></span></a>
              <form action="{{ route('posts.destroy', $post->slug) }}" method="POST" class="d-inline">
                @csrf
                @method('delete')
                <button class="bg-danger badge border-0" onclick="return confirm('Are you sure?')"> <span data-feather="trash"></span></button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  @else
    <h6 class="text-center mt-3">You don't have any posts yet. Please add post first <a href="posts/create">here.</a></h6>    
  @endif
@endsection