<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSS de Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
        <title>Moustache Battle Royale</title>
    </head>
    <body class="bg-dark-subtle">
        <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
            <div class="container-fluid">
                <a class="navbar-brand fw-bold" href="{{config('app.url')}}">Moustache Battle Royale</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                        <a class="col-sm-12 col-md-3 col-lg-4 navbar-brand {{Str::contains(url()->current(), 'historial') ? 'fw-bold text-info' : '' }}" href="{{config('app.url')}}/historial">Historial</a>
                        </li>
                        <li class="nav-item">
                        <a class="col-sm-12 col-md-3 col-lg-4 navbar-brand {{Str::contains(url()->current(), '/guerra') ? 'fw-bold text-info' : '' }}" href="{{config('app.url')}}/">Guerra</a>
                        </li>
                        <li class="nav-item">
                        <a class="col-sm-12 col-md-3 col-lg-4 navbar-brand {{Str::contains(url()->current(), 'estadisticas') ? 'fw-bold text-info' : '' }}" href="{{config('app.url')}}/estadisticas">Estadísticas</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid d-flex justify-content-center mb-5 pb-4">

            @yield('contenido')

        </div>
        <!-- JS de Bootstrap -->
        <div class="text-center bg-dark p-3 mt-5 fixed-bottom">
            <a class="text-light" href="{{config('app.url')}}/">Ekaitz Soto - 2023</a>
        </div>

    </body>
</html>

