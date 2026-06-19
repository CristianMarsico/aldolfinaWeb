<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <base href="{$base_url}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/componentHeader.css') }}">
    <link rel="stylesheet" href="{{ asset('css/componentBanner.css') }}">
    <link rel="stylesheet" href="{{ asset('css/paginaHome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/paginaProductos.css') }}">
    <link rel="stylesheet" href="{{ asset('css/paginaContacto.css') }}">
    <link rel="stylesheet" href="{{ asset('css/componentFooter.css') }}">
    <title>Pañalera</title>

</head>
<body>

<section class="contact-section" style="min-height:100vh; display:flex; align-items:center; justify-content:center;">
  <div class="contact-form-card" style="max-width:400px; width:90%;">
    <div class="logo" style="text-align:center; margin-bottom:30px;">
      <img src="{{ asset('img/huggies.png') }}" alt="Logo Pañalera" style="max-height:60px;" />
    </div>

    <h2 style="text-align:center; color:#195d9c; font-weight:700; margin-bottom:30px;">Iniciar Sesión</h2>

    <form class="contact-form" action="{{ route('login.verify') }}" method="POST" novalidate>
      @csrf
      <div class="form-group">
        <label for="usuario">Usuario</label>
        <input type="text" id="usuario" name="usuario" required autocomplete="username" placeholder="Tu usuario" />
      </div>
      <div class="form-group">
        <label for="password">Contraseña</label>
        <input type="password" id="password" name="password" required autocomplete="current-password" placeholder="Tu contraseña" />
      </div>
      <button type="submit" class="btn-contact">Ingresar</button>
    </form>

    @if(session('error'))
    <div class="alert-danger" role="alert" style="margin-top:20px;">
      {{ session('error') }}
    </div>
    @endif
  </div>
</section>

@include('componentFooter')
@include('componentCloseHead')

</body>
</html>
