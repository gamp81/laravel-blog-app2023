<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>GMITI | {{ $title }}</title>



  {{-- Boostrap Icon --}}
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

  {{-- App Style CSS --}}
  <link rel="stylesheet" href="/css/style.css">

    {{-- Boostrap CSS --}}
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>

<body>

  <x-navbar :theme='$theme' />

  <div class="container mt-4">
    @yield('container')
  </div>


  <x-footer />
