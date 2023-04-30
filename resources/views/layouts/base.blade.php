<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSS de Bootstrap -->
        <link href="{{ asset('assets/bootstrap.min.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        <script src="{{ asset('assets/bootstrap.min.js') }}"></script>
        <title>Moustache Battle Royale</title>
    </head>
    <body class="bg-dark-subtle">
        <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
            <div class="container-fluid">
                <a class="navbar-brand fw-bold" href="#">Moustache Battle Royale</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                        <a class="col-sm-12 col-md-3 col-lg-4 navbar-brand font-bold" href="{{config('app.url')}}/historial">Historial</a>
                        </li>
                        <li class="nav-item">
                        <a class="col-sm-12 col-md-3 col-lg-4 navbar-brand font-bold" href="{{config('app.url')}}/">Guerra</a>
                        </li>
                        <li class="nav-item">
                        <a class="col-sm-12 col-md-3 col-lg-4 navbar-brand font-bold" href="{{config('app.url')}}/estadisticas">Estadísticas</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid">
            @yield("contenido")
        </div> 
        <!-- JS de Bootstrap -->
        <div class="text-center bg-dark p-3 fixed-bottom">
            <a class="text-light" href="{{config('app.url')}}/">Ekaitz Soto - 2023</a>
        </div>
        
    </body>
</html>

