require('./bootstrap');

"use strict"
       
var min = 25; //const para variaveis estaticas
var sec = 0; //let muda os valores de forma local(scopo) /****var = muda os valores de forma global***///

var tempo = 1000; // tempo em ms = 1s
var cron = 0;
var isPaused = false;
var mode = 'pomodoro'

function start(event){

    if(cron == 0){
        cron = setInterval(timer, tempo); //ele vai chamar na tela o contador e vai exporform o funcionamento rodando
    }

}

function pause(){
    if(isPaused){
        start();
        isPaused = false;
    }else{
        clearInterval(cron);
        isPaused = true;
        cron = 0
    }
}


function stop(){
    if (min > 0) {
        if (mode == 'pomodoro') {
            if (confirm("The timer is still running, are you sure you want to stop it?")) {
                if(cron > 0){
                    clearInterval(cron);
                    cron = 0
                }
        
                document.getElementById('totalTime').value = 25 - min;
                min = 25;
                sec = 0;
                document.getElementById('counter').innerHTML = '25:00';
            }           
        } else {
            if(cron > 0){
                clearInterval(cron);
                cron = 0
            }
            if (mode == 'short') min = 5
            if (mode == 'long') min = 10
            sec = 0;
        }
    } else {
        if (mode == 'pomodoro') {
            document.getElementById('totalTime').value = 25 - min;
        }

        if(cron > 0){
            clearInterval(cron);
            cron = 0
        }  

        if (mode == 'short') min = 5
        if (mode == 'long') min = 10
        sec = 0;
    
        // document.getElementById('counter').innerHTML = '25:00';
    }
    
}

function timer(){
    
    if(sec == 0){
        if (min == 0){
            if (mode == 'short') alert("The short break has finished!")
            if (mode == 'long') alert("The long break has finished!")
            stop();
            return;
        }
        sec = 60;
        min--;
    }

    sec--;
    writeTimeLeft()
    
}

function timerShort(){
    if (cron) {
        if (confirm("The timer is still running, are you sure you want to stop it?")) {
            mode = 'short'
            stop()
            min = 5
            sec = 0
            writeTimeLeft()
        }
    } else {
        mode = 'short'
        min = 5
        sec = 0
        writeTimeLeft()
    }
}  

function timerLong(){
    if (cron) {
        if (confirm("The timer is still running, are you sure you want to stop it?")) {
            mode = 'long'
            stop()
            min = 10
            sec = 0
            writeTimeLeft()
        }
    } else {
        mode = 'long'
        min = 10
        sec = 0
        writeTimeLeft()
    }
} 


function pomodoro () {
    if (cron) {
        if (confirm("The timer is still running, are you sure you want to switch?")) {
            stop()
            min = 25
            sec = 0
            writeTimeLeft()
        }
    } else {
        min = 25
        sec = 0
        writeTimeLeft()
    }
    mode = 'pomodoro'
}

function writeTimeLeft() {
    const format = (min < 10 ? "0" + min : min) + ":" + (sec < 10 ? "0" + sec : sec);
    document.getElementById('counter').innerText = format;
}


window.onload = function(){
    document.getElementById('start').addEventListener("click", start); 
    document.getElementById('pause').addEventListener("click", pause);
    document.getElementById('stop').addEventListener("click", stop);
    document.getElementById('pomodoro').addEventListener("click", pomodoro);
    document.getElementById('short').addEventListener("click", timerShort);
    document.getElementById('long').addEventListener("click", timerLong);

    writeTimeLeft()
}

