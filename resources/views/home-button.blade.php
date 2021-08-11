<nav class="navbar navbar-expand-lg navbar-light mb-2 justify-content-between" style="background-color: #e9ecef;">
    <a class="navbar-brand" href="{{ route('timer') }}">
        Countdown Pomodoro <i class="fas fa-stopwatch-20"></i>
    </a>
    @auth
    <a href="{{ route('sair') }}">
        Logout
    </a>
    @endauth
    @guest
    <a href="{{ route('entrar') }}">
        Login
    </a>
    @endguest
</nav>