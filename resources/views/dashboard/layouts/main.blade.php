<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="INI UNTUK SEO" />
    <meta name="author" content="Yadi Apriyadi" />
    <meta name="generator" content="Hugo 0.108.0" />
    <title>YBC Blog | {{ $title }}</title>

    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="/css/dashboard.css" rel="stylesheet" />

    {{-- Trix Editor --}}
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js">
    document.addEventListener("trix-file-accept", (event)   => {
      event.preventDefault();
    });
    </script>

  </head>
  <body>
    <x-dashboard-header />

    <div class="container-fluid">
      <div class="row">

        <x-dashboard-nav-sidebar />

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
          @yield('container')        
        </main>
      </div>
    </div>

    <script src="/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script
      src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
      integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE"
      crossorigin="anonymous"
    ></script>
    <script src="/js/dashboard.js"></script>
  </body>
</html>
