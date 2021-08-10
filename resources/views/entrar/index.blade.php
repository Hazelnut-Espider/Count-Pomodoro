@extends('layout')

@section('cabecalho')
    Pomodoro Timer Login
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

        <button type="submit" class="btn btn-primary mt-3">
            Enter
        </button>

        <a href="/register" class="btn btn-secondary mt-3">
            Register
        </a>
    </form>
@endsection