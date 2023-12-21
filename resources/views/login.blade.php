<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('css/fonts.css') }}">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <script defer src="{{ asset('js/showToast.js') }}"></script>
  <title>Login</title>
</head>
<body>

  @error('error')
    <div class="toast-container position-fixed top-0 start-50 translate-middle-x p-3">
      <div id="liveToast" class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
          <strong class="me-auto">Error</strong>
          <small>Just now</small>
          <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
          {{ $message }}
        </div>
      </div>
    </div>
  @enderror  

  <div class="container-form">
    <div class="login-form">
      <form class="form" action="{{ route('auth') }}" method="POST">
        @csrf
        <h1>Iniciar sesión</h1>
        <div class="mb-3">
          <label for="user_email" class="form-label">Correo electrónico</label>
          <input type="email" name="user_email" id="user_email" class="form-control" required>
        </div>
        <div class="mb-3">
          <label for="user_pass" class="form-label">Contraseña</label>
          <input type="password" name="user_pass" id="user_pass" class="form-control" required>
        </div>
        <div class="mb-3">
          <button type="submit" class="btn btn-blog w-100">Iniciar sesión</button>
        </div>
        <a href="{{ route('home') }}">Volver</a>
      </form>
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>