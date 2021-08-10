@extends('layout')

@section('cabecalho')
 Countdown Pomodoro
@endsection

@section('conteudo')

    
<div class="max-width">
    <button id="start" class="btn btn-success ms-4">Start</button>
    <button id="pause" class="btn btn-warning ms-4">Pause</button>
    <button id="stop" class="btn btn-danger ms-4">Stop</button>
    <br>
    <h1 id="counter"></h1>
    <button id="pomodoro" class="btn btn-danger text-white ms-2">Pomodoro</button>
    <button id="short" class="btn btn-success text-white ms-2">Short-Break</button>
    <button id="long" class="btn btn-info text-white ms-2">Long-Break</button>
    
    <hr>

    <form action="/timer/total" method="post" class="form-inline">
        @csrf
        <div class="form-group mb-2">
            <label for="totalTime">Total study time:</label>
            <input type="number" name="totalTime" id="totalTime" required class="form-control" placeholder="total time">
        </div>
    
        <button type="submit" class="btn btn-primary mb-2">Register time</button>
    
    </form>
</div>



@endsection

