<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Countdown Pomodoro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/e6cc2877fe.js" crossorigin="anonymous"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @section('script')
        <script src="{{ asset('js/app.js') }}" defer></script> 
    @endsection

</head>
<body>
    
    @yield('script')

    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-2 d-flex justify-content-between">
        @auth
            <a class="navbar navbar-expand-lg" href="{{ route('ranking') }}">
                Ranking <i class="fas fa-medal"></i>
            </a>
        @endauth

        @auth
            <a class="navbar navbar-expand-lg" href="{{ route('timer') }}">
                Pomodoro <i class="fab fa-algolia"></i>
            </a>
        @endauth

        @auth
           <a href="/sair" class="text-danger">
            Logout <i class="fas fa-sign-out-alt"></i>
        </a>
        @endauth

        @guest
            <a href="/entrar"><i class="fas fa-user-circle"></i></a>
        @endguest
   </nav>

    <div class="container">
        <div class="p-5 mb-4 bg-light rounded-3">
            <div class="container-fluid py-5">
              <h1 class="display-5 fw-bold">@yield('cabecalho')</h1>
              @auth
                <p class="col-md-8 fs-4">Save your time and be more productive.</p>
                <p class="col-md-8 fs-4">Keep on fire.</p>
              @endauth
            </div>
        </div>
        @yield('conteudo')
    </div>
</body>
</html>