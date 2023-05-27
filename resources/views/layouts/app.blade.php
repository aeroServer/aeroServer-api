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

    <!-- Footer -->
    <footer class="container">
      <small
        >{{ config('app.name', 'Laravel') }} {{ config('app.version') }} -- Built with <a href="https://picocss.com">Pico</a> •
        <a href="https://github.com/picocss/examples/blob/master/v1-preview/index.html"
          >Source code</a
        ></small
      >
    </footer>
    <!-- ./ Footer -->

    <!-- Modal example -->
    <dialog id="modal-example">
      <article>
        <a
          href="#close"
          aria-label="Close"
          class="close"
          data-target="modal-example"
          onclick="toggleModal(event)"
        ></a>
        <h3>Confirm your action!</h3>
        <p>
          Cras sit amet maximus risus. Pellentesque sodales odio sit amet augue finibus
          pellentesque. Nullam finibus risus non semper euismod.
        </p>
        <footer>
          <a
            href="#cancel"
            role="button"
            class="secondary"
            data-target="modal-example"
            onclick="toggleModal(event)"
            >Cancel</a
          ><a href="#confirm" role="button" data-target="modal-example" onclick="toggleModal(event)"
            >Confirm</a
          >
        </footer>
      </article>
    </dialog>
    <!-- ./ Modal example -->
</div>
</body>
</html>