@extends('layout')

@section('cabecalho')
 Ranking Pomodoro
@endsection 

@section('conteudo')

<ol class="list-group list-group-numbered">
    @foreach ($users as $user)
        <li class="list-group-item">{{ $user->name }} - {{ $user->totalTime }} minutes</li>
    @endforeach
</ol>

@endsection