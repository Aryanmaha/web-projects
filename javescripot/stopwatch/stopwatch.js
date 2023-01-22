var hours = 00;
var minutes = 00;
var seconds = 00;
var tens = 00;
var outputhours = document.getElementById('hour');
var outputminute = document.getElementById('minute');
var outputsecond = document.getElementById('second');
var outputtens = document.getElementById('tens');
var buttonstart = document.getElementById('btn_start');
var buttonpause = document.getElementById('btn_pause');
var buttonreset = document.getElementById('btn_reset');
var Interval;

buttonstart.addEventListener('click',()=>{
  clearInterval(Interval);
  Interval = setInterval(startTime,10);
})
buttonpause.addEventListener('click',()=>{
  clearInterval(Interval);
})
buttonreset.addEventListener('click',()=>{
  clearInterval(Interval);
  tens = "00";
  seconds = "00";
  hours = "00";
  minutes = "00";
  outputhours.innerHTML = hours;
  outputminute.innerHTML = minutes;
  outputsecond.innerHTML = seconds;
  outputtens.innerHTML = tens;
})

function startTime(){
  tens++;
  if(tens <= 9){
    outputtens.innerHTML = "0" + tens;
  }
  if(tens > 9){
    outputtens.innerHTML = tens;
  }
  if(tens>99){
    seconds++;
    outputsecond.innerHTML = "0" + seconds;
    tens = 0;
    outputtens.innerHTML = "0" + tens;
  }
  if(seconds > 9){
    outputsecond.innerHTML= seconds;
  }
  if(seconds>59){
    minutes++;
    outputminute.innerHTML = "0" + minutes;
    seconds = 0;
    outputsecond.innerHTML = "0" + seconds;
  }
  if(minutes > 9){
    outputminute.innerHTML= minutes;
  }
  if(minutes>59){
    hours++;
    outputhours.innerHTML = "0" + hours;
    minutes = 0;
    outputminutes.innerHTML = "0" + minutes;
  }
  if(hours > 9){
    outputhours.innerHTML= hours;
  }
}
