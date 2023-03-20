<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
  public function index()
  {
    $posts = Post::latest();
    $search = request(['search', 'category', 'author']);
    $title = '';

    if (request('category')) {
      $category = Category::firstWhere('slug', $search['category']);
      $title = ' in ' . $category->name;
    }

    if (request('author')) {
      $author = User::firstWhere('username', $search['author']);
      $title = ' by ' . $author->name;
    }

    return view('posts', [
      'title' => 'All Posts' . $title,
      'theme' => $this->theme,
      'posts' => $posts->filter($search)->paginate(7)->withQueryString()->setPath(url($_ENV['APP_URL'] . '/posts')),
    ]);
  }

  public function show(Post $post)
  {
    return view('post', [
      'title' => 'Single Post',
      'theme' => THEME,
      'post' => $post,
    ]);
  }
}
