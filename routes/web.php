<?php

declare(strict_types=1);

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

$theme = config('app.theme');

Route::get('/', fn () => view('home', [
  'title' => 'Home',
  'theme' => $theme,
]));

Route::get('/about', fn () => view('about', [
  // 'title' => 'About',
  'theme' => $theme,
  // 'name' => 'Yadi Apriyadi',
  // 'email' => 'yadi@gmail.com',
  // 'url_img' => 'images/stickman.jpg',
]));
Route::get('/servicios',function (){
  return view('servicios');
} );
Route::get('/contactanos',function (){
  return view('contacto');
} );
Route::get('/productos',function (){
  return view('productos');
} );
Route::get('/syslab',function (){
  return view('syslab.index');
} );
Route::get('/posts', [PostController::class, 'index']);
Route::get('posts/{post}', [PostController::class, 'show']);

Route::get('/categories', fn () => view('categories', [
  'title' => 'Categories',
  'theme' => $theme,
  'categories' => Category::all(),
]));

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::get('/dashboard/posts/createSlug', [DashboardPostController::class, 'createSlug'])->middleware('auth');

Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

Route::get('/dashboard/categories/createSlug', [AdminCategoryController::class, 'createSlug'])->middleware('admin');
Route::resource('/dashboard/categories', AdminCategoryController::class)->scoped([
  'category' => 'slug',
])->except('show')->middleware('admin');
