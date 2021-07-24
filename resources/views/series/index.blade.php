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
        @foreach ($series as $serie)
        <li class="list-group-item d-flex justify-content-between align-items-center"> {{ $serie->nome }}
            <form method="post" action="/series/{{ $serie->id }}" 
                onsubmit="return confirm('Tem certeza que deseja remover {{ addslashes ($serie->nome) }}?')">
                
                <a href="/series/{{$serie->id}}/temporadas" class="btn btn-info btn-sm">
                    <i class="fas fa-external-link-alt"></i>
                </a>
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </form>
        </li>
        <li class="list-group-item">{{ $serie->nome }}</li>
        @endforeach
    </ul>
@endsection