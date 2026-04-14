<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSS de Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
        
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
        
        <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
        <link rel="stylesheet" href="{{ asset('css/base.css') }}">

        <title>Moustache Battle Royale</title>

        <meta name="description" content="Simulador de combate automático. ¡Gestiona tu equipo y sobrevive a la guerra!">
        <meta name="author" content="Ekaitz Soto">

        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:title" content="Moustache Battle Royale">
        <meta property="og:description" content="¡PUM! YA ESTA AQUÍ LA GUERRA">
        <meta property="og:image" content="{{ asset('img/og-image.png') }}">

    </head>
    <body class="bg-dark-subtle">
        @if(!isset($hideNav) || !$hideNav)
        <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
            <div class="container-fluid">
                <a class="navbar-brand text-uppercase fw-bold" href="{{config('app.url')}}">Moustache Battle Royale</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav text-uppercase">
                        <li class="nav-item">
                        <a class="col-sm-12 col-md-3 col-lg-4 navbar-brand {{Str::contains(url()->current(), 'historial') ? 'fw-bold text-info' : '' }}" href="{{config('app.url')}}/historial">Historial</a>
                        </li>
                        <li class="nav-item">
                        <a class="col-sm-12 col-md-3 col-lg-4 navbar-brand {{Str::contains(url()->current(), '/guerra') ? 'fw-bold text-info' : '' }}" href="{{config('app.url')}}/guerra">Guerra</a>
                        </li>
                        <li class="nav-item">
                        <a class="col-sm-12 col-md-3 col-lg-4 navbar-brand {{Str::contains(url()->current(), 'estadisticas') ? 'fw-bold text-info' : '' }}" href="{{config('app.url')}}/estadisticas">Estadísticas</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        @endif
        <div class="container-fluid d-flex justify-content-center pb-4">

            @yield('contenido')

        </div>
        <!-- JS de Bootstrap -->

        @if(isset($showFooter) && $showFooter)
        <div class="text-center bg-dark text-secondary p-3 mt-5 fixed-bottom">
            <small class="d-block mb-1">HALL OF FAME: War 1: Miss Spider • War 2: Cao de Benos • War 3: Mikel mago • War 4: Rupolla • War 5: Esteban • War 6: Qin Shi Huan</small>
            <a class="text-secondary" href="https://github.com/Ekaitzsoto/MoustacheBattleRoyale" target="_blank">
                <small>Ekaitz Soto (Dev) / Asier Redondo (DevOps) - 2026</small>
            </a>
        </div>
        @endif
    </body>
</html>

