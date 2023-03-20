@extends('layouts.main')

@section('container')
  <div class="row justify-content-center">
    <div class="col-lg-5">
      <main class="form-register w-100 m-auto">
        <div class="d-flex justify-content-center mb-4">
          <img class="w-25" src="/images/people-img-login.png" >
        </div>
        <h1 class="h3 mb-3 fw-normal text-center">Registration Form</h1>
        <form action="/register" method="POST">
          @csrf

          <div class="form-floating">
            <input type="text" class="form-control rounded-top @error('name') is-invalid @enderror" id="name" placeholder="Name" name="name" autocomplete="off" required value="{{ old('name') }}">
            <label for="name">Name</label>

            @error('name')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-floating">
            <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Username" name="username" autocomplete="off" required value="{{ old('username') }}">
            <label for="username">Username</label>

            @error('username')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-floating">
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@email.com" name="email" autocomplete="off" required value="{{ old('email') }}">
            <label for="email">Email address</label>

            @error('email')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-floating">
            <input type="password" class="form-control rounded-bottom @error('password') is-invalid @enderror" id="password" placeholder="Password" name="password" autocomplete="off" required>
            <label for="password">Password</label>

            @error('password')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>

          <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Register</button>
        </form>

        <small class="d-block text-center mt-3">Already have a account? <a href="/login">Login here.</a></small>

        <p class="mt-3 mb-3 text-muted text-center">&copy;YBC Blog 2017 - {{ date('Y') }}</p>
      </main>
    </div>
  </div>
@endsection