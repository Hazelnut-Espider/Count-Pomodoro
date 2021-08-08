require('./bootstrap');

"use strict"
       
var mm = 25; //const para variaveis estaticas
var ss = 0; //let muda os valores de forma local(scopo) /****var = muda os valores de forma global***///

var tempo = 1000; // tempo em ms = 1s
var cron = 0;
var isPaused = false;

function start(event){

    if(cron == 0){
        cron = setInterval(timer, tempo); //ele vai chamar na tela o contador e vai expor o funcionamento rodando
    }

}

function pause(){
    if(isPaused){
        start();
        isPaused = false;
    }else{
        clearInterval(cron);
        isPaused = true;
    }
}

function stop(){
    if(cron > 0){
        clearInterval(cron);
    }
    mm = 25;
    ss = 0;

    document.getElementById('counter').innerHTML = '25:00';
}

function timer(){
    
    if(ss == 0){
        if (mm == 0){
            stop(cron);
        }
        ss = 59;
        mm--;
    }

    ss--;

    var format = (mm < 10 ? "0" + mm : mm) + ":" + (ss < 10 ? "0" + ss : ss);
    document.getElementById('counter').innerText = format;
}

window.onload = function(){
    document.getElementById('start').addEventListener("click", start); 
    document.getElementById('pause').addEventListener("click", pause);
    document.getElementById('stop').addEventListener("click", stop);

}

