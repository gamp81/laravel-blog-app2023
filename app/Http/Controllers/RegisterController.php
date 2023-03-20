<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
  public function index()
  {
    return view('register.index', [
      'title' => 'Register',
      'theme' => $this->theme,
    ]);
  }

  public function store(Request $request)
  {
    $validated = $request->validate([
      'name' => 'required|regex:/^[\pL\s\-]+$/u|max:100',
      'username' => 'required|min:3|max:100|unique:users',
      'email' => 'required|unique:users|email:dns',
      'password' => ['required', Password::min(8)->mixedCase()->letters()->numbers()->symbols()->uncompromised()],
    ]);

    $validated['password'] = Hash::make($validated['password']);

    User::create($validated);

    return redirect('/login')->with('status_register', 'Register successful! Please login.');
  }
}
