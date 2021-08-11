@extends('layout')

@section('cabecalho')
<i class="fas fa-hourglass-start"></i> Countdown Pomodoro <i class="fas fa-stopwatch-20"></i>
@endsection

@section('conteudo')
    @include('erros', ['errors' => $errors])
    
    
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
            <input type="number" name="totalTime" id="totalTime" required class="form-control" placeholder="total time" disabled>
        </div>
    
        <button onclick="saveTime()" type="submit" class="btn btn-primary mb-2">Save</button>
        <script>
        function saveTime(){
            confirm("Are you sure you want to save it?");
        }
        </script>
    </form>
</div>



@endsection

