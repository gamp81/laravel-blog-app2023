<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;

class DashboardPostController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $posts = new Post;
    $author_id = auth()->user()->id;
    return view('dashboard.posts.index', [
      'title' => 'Dashboard - Posts',
      'posts' => $posts->getPostsByAuthorId($author_id),
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('dashboard.posts.create', [
      'title' => 'Dashboard - Create Post',
      'categories' => Category::all(),
    ]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    if ($request['body'] !== null) {
      $request['content'] = strip_tags($request['body']);
    }

    $validatedData = $request->validate([
      'title' => 'required|min:5',
      'slug' => 'required|unique:posts',
      'category_id' => 'required',
      'content' => 'required|min:15',
      'body' => 'required',
      'image' => 'image|file|max:2048',
    ]);

    if ($request->file('image')) {
      $validatedData['image'] = $request->file('image')->store('post-images');
    }

    $validatedData['user_id'] = auth()->user()->id;

    unset($validatedData['content']);
    Post::create($validatedData);

    return redirect('/dashboard/posts')->with([
      'status_post' => 'New post has been added!',
      'type' => 'success',
    ]);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Post  $post
   * @return \Illuminate\Http\Response
   */
  public function show(Post $post)
  {
    return view('dashboard.posts.show', [
      'title' => 'Dashboard - Posts',
      'post' => $post
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Post  $post
   * @return \Illuminate\Http\Response
   */
  public function edit(Post $post)
  {
    return view('dashboard.posts.edit', [
      'title' => 'Dashboard - Edit Post',
      'categories' => Category::all(),
      'post' => $post,
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Post  $post
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Post $post)
  {
    if ($request['body'] !== null) {
      $request['content'] = strip_tags($request['body']);
    }

    $rules = [
      'title' => 'required|min:5',
      'category_id' => 'required',
      'image' => 'image|file|max:2048',
      'content' => 'required|min:5',
      'body' => 'required',
    ];

    if ($request->slug !== $post->slug) {
      $rules['slug'] = 'required|unique:posts';
    }

    $validatedData = $request->validate($rules);

    if ($request->file('image')) {
      if ($request->oldImage) {
        Storage::delete($request->oldImage);
      }
      $validatedData['image'] = $request->file('image')->store('post-images');
    }

    $validatedData['user_id'] = auth()->user()->id;

    unset($validatedData['content']);
    Post::where('id', $post->id)->update($validatedData);

    return redirect("/dashboard/posts")->with([
      'status_post' => 'Post has been updated!',
      'type' => 'success',
    ]);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Post  $post
   * @return \Illuminate\Http\Response
   */
  public function destroy(Post $post)
  {
    if ($post->image) {
      Storage::delete($post->image);
    }
    Post::destroy($post->id);
    return redirect('/dashboard/posts')->with([
      'status_post' => 'Post has been deleted',
      'type' => 'success',
    ]);
  }

  public function createSlug(Request $request)
  {
    $slug = SlugService::createSlug(Post::class, 'slug', $request->title);

    return response()->json(['slug' => $slug]);
  }
}
