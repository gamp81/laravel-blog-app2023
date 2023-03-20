@extends('layouts.main')

@section('container')
  <div class="row justify-content-center">
    <div class="col-lg-4">
      <main class="form-signin w-100 m-auto">
        <div class="d-flex justify-content-center mb-4">
          <img class="w-25" src="/images/people-img-login.png" >
        </div>
        <h1 class="h3 mb-3 fw-normal text-center">Please login</h1>
        <form action="/login" method="POST">
          @csrf
          <div class="form-floating">
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@gmail.com" name="email" autofocus required value="{{ old('email') }}">
            <label for="email">Email address</label>

            @error('email')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-floating">
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" name="password" required>
            <label for="password">Password</label>

            @error('password')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>

          @if (session('status_register'))
            <div class="alert alert-success alert-dismissible" role="alert">
              <div>{{ session('status_register') }}</div>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif

          @if (session('status_login'))
            <div class="alert alert-{{ session('type') }} alert-dismissible" role="alert">
              <div>{{ session('status_login') }}</div>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif
          <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
        </form>

        <small class="d-block text-center mt-3">Not registered? <a href="/register">Register Now!</a></small>

        <p class="mt-3 mb-3 text-muted text-center">&copy;YBC Blog 2017 - {{ date('Y') }}</p>
      </main>
    </div>
  </div>
@endsection