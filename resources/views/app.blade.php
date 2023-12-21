<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="shortcut icon" href="{{ asset('favicon.svg') }}">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('css/fonts.css') }}">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <title>Post App</title>
</head>
<body>

  <header class="navbar navbar-expand-lg">
    <nav class="container">
      <a class="navbar-brand" href="/">Blog</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        @auth
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">Mis publicaciones</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('table-posts') }}">Panel</a>
          </li>
        </ul>
        <div class="nav-buttons">
          <a class="btn btn-blog" href="{{ route('create-post') }}">Crear una nueva publicación</a>
          <a class="btn btn-blog-2" href="{{ route('logout') }}">Cerrar Sesión</a>
        </div>
        @endauth

        @guest
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="/">Inicio</a>
          </li>
        </ul>

        <div class="nav-buttons">
          <a class="btn btn-blog" href="/login">Iniciar sesión</a>
        </div>
        @endguest
      </div>
    </nav>
  </header>

  @yield('main')

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>