@extends('layout')

@section('cabecalho')
 <i class="fas fa-trophy"></i> Ranking Pomodoro <i class="fas fa-user-friends"></i>
@endsection 

@section('conteudo')

<ol class="list-group list-group-numbered">
    @foreach ($users as $user)
        <li class="list-group-item">{{ $user->name }} - {{ $user->totalTime }} minutes</li>
    @endforeach
</ol>

@endsection