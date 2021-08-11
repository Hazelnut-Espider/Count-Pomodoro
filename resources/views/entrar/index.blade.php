@extends('layout')

@section('cabecalho')
Countdown Pomodoro Login <i class="fas fa-user-clock"></i>
@endsection

@section('conteudo')
    @include('erros', ['errors' => $errors])

    <form method="post">
        @csrf
        <div class="form-group">
            <label for="email">E-mail</label>
       <input type="email" name="email" id="email" required class="form-control">
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required min="1" class="form-control">
        </div>

        <button onclick="logged" type="submit" class="btn btn-primary mt-3">Login</button>

        <a href="/register" class="btn btn-secondary mt-3">
            Register
        </a>
    </form>
@endsection