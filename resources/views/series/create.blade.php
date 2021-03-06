@extends('layout')

@section('cabecalho')
Adicionar Séries
@endsection
    
@section('conteudo')
@include('erros', ['errors' => $errors])

     <form method="post">
        @csrf 
        <div class="row">
            <div class="col col-8">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" name="nome" id="nome">
            </div>
        

            <div class="col col-2">
                <div class="form-group">
                    <label for="qtd_temporadas">Núm. de Temporadas</label>
                    <input type="number" class="form-control" name="qtd_temporadas" id="qtd_temporadas">
                </div>
            </div>

            <div class="col col-2">
                <div class="form-group">
                    <label for="ep_por_temporadas">Ep. por Temporadas</label>
                    <input type="number" class="form-control" name="ep_por_temporadas" id="ep_por_temporadas">
                </div>
            </div>
        </div>
        <button class="btn btn-primary mt-2">Adicionar</button>
    </form>
@endsection
