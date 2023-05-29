<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'Laravel') }}</title>
  @vite('resources/css/app.css')
</head>
<body>
  <!-- Header -->
    <header class="container">

      <nav>
        <ul>
          <li><strong>Aero Server</strong></li>
        </ul>
        @include('layouts.menu')
      </nav>
    </header>
    <!-- ./ Header -->

    <!-- Main -->
    <main class="container">
      @yield('content')
    </main>
    <!-- ./ Main -->

    @include('layouts.footer')
    
</div>
</body>
</html>