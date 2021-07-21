@extends('layout')

@section('cabecalho')
Séries
@endsection
    
@section('conteudo')

@if(!empty($mensagem))
    <div class="alert alert-success">
        {{ $mensagem }}
    </div>
@endif

    <a href="{{ route('form_criar_serie') }}" class="btn btn-dark mb-2">Adicionar</a>

    <ul class="list-group">
        @foreach ($series as $series)
        <li class="list-group-item d-flex justify-content-between align-items-center"> {{ $series->nome }}
            <form method="post" action="/series/{{ $series->id }}" onsubmit="return confirm('Tem certeza que deseja remover {{ addslashes ($series->nome) }}?')">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </form>
        </li>
        <li class="list-group-item">{{ $series->nome }}</li>
        @endforeach
    </ul>
@endsection