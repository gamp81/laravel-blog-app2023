<?php

namespace App\Http\Controllers;

use App\Models\Category;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {

    // $this->authorize('admin');

    return view('dashboard.categories.index', [
      'title' => 'Dashboard - Categories',
      'categories' => Category::all(),
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('dashboard.categories.create', [
      'title' => 'Dashboard | Create Category',
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
    $rules = [
      'name' => 'required|min:7',
      'slug' => 'unique:categories',
    ];

    $validatedData = $request->validate($rules);

    Category::create($validatedData);

    return redirect('/dashboard/categories')->with([
      'status_category' => 'Success to add new category',
      'type' => 'success',
    ]);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Category  $category
   * @return \Illuminate\Http\Response
   */
  public function show(Category $category)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Category  $category
   * @return \Illuminate\Http\Response
   */
  public function edit(Category $category)
  {
    return view('dashboard.categories.edit', [
      'title' => 'Dashboard | Edit category',
      'category' => $category,
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Category  $category
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Category $category)
  {
    $rules = [
      'name' => 'required|min:7',
    ];

    if ($request->slug !== $category->slug) {
      $rules['slug'] = 'unique:categories';
    }

    $validatedData = $request->validate($rules);

    Category::where('id', $category->id)->update($validatedData);

    return redirect('/dashboard/categories')->with([
      'status_category' => 'Category has been updated!',
      'type' => 'success',
    ]);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Category  $category
   * @return \Illuminate\Http\Response
   */
  public function destroy(Category $category)
  {
    Category::destroy($category->id);
    return redirect('/dashboard/categories')->with([
      'status_category' => 'Category has been deleted',
      'type' => 'success',
    ]);
  }

  public function createSlug(Request $request)
  {
    $slug = SlugService::createSlug(Category::class, 'slug', $request->name);
    return response()->json(['slug' => $slug]);
  }
}
