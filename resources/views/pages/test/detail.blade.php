@extends('pages.layout.index')
@section('title')
{{"Làm bài thi"}}
@endsection
@section('style')
<link rel="stylesheet" href="pages/css/testdetail.css">
@endsection
@section('content')

<div class="container">
    {{-- <div class="panel-body text-center">
        <div class="col-md-2 col-md-offset-5 clock">
            <span id="showmns">00</span><span id="showmns">:</span><span id="showscs">00</span>
            </br>
        </div>        
    </div> --}}
    <div class="clock">
            <div id="clockdiv"> 
 <!--  <div> 
    <span class="days" id="day"></span> 
    <div class="smalltext">Days</div> 
  </div> --> 
  <div> 
    <span class="hours" id="hour"></span> 
    {{-- <div class="smalltext">Hours</div>  --}}
  </div> 
  <div> 
    <span class="minutes" id="minute"></span> 
    {{-- <div class="smalltext">Minutes</div>  --}}
  </div> 
  <div> 
    <span class="seconds" id="second"></span> 
    {{-- <div class="smalltext">Seconds</div>  --}}
  </div> 
</div> 
<p id="demo"></p> 
    </div>

    <div class="panel-body text-center">
        <button class="btn btn-primary" id="btnct" onclick="countdownTimer()">
            <i class="fa fa-play" aria-hidden="true"></i> Bắt đầu làm bài
        </button>
    </div>
    
    <div class="col-md-offset-1 col-md-10 test-content">
      <form action="#" method="POST">     {{--    
        @foreach($testDetail as $detail) --}}
        @for($i = 1; $i<count($testDetail);$i++)
        <div class="form-group"><h4>{!!$i.'. '!!}{{$testDetail[$i]->question->content}}</h4></div>
        <div class="form-group question-content">
            <p>
                <input type="radio" {!!'id="answer-for-question-'.$i.'-A"'!!} {!!'name="answer-for-question-'.$i.'"'!!}>
                <label {!!'for="answer-for-question-'.$i.'-A"'!!}">{{$testDetail[$i]->question->a}}</label><span><i class="fa fa-close"></i></span>
            </p>
            <p>
                <input type="radio" {!!'id="answer-for-question-'.$i.'-B"'!!} {!!'name="answer-for-question-'.$i.'"'!!}>
                <label {!!'for="answer-for-question-'.$i.'-B"'!!}>{{$testDetail[$i]->question->b}}</label><span><i class="fa fa-check"></i></span>
            </p>
            <p>
                <input type="radio" {!!'id="answer-for-question-'.$i.'-C"'!!} {!!'name="answer-for-question-'.$i.'"'!!}>
                <label {!!'for="answer-for-question-'.$i.'-C"'!!}>{{$testDetail[$i]->question->c}}</label>
            </p>
            <p>
                <input type="radio" {!!'id="answer-for-question-'.$i.'-D"'!!} {!!'name="answer-for-question-'.$i.'"'!!}>
                <label {!!'for="answer-for-question-'.$i.'-D"'!!}>{{$testDetail[$i]->question->d}}</label>
            </p>
        </div>
        @endfor
        {{-- @endforeach --}}
    </form>
</div>
</div>
@endsection
@section('script')
{{-- <script type="text/javascript">
    var ctmnts = 00;
    var ctsecs = 00;
var startchr = 0;       // used to control when to read data from form

function countdownTimer() {
  // http://coursesweb.net/javascript/
  // if $startchr is 0, and form fields exists, gets data for minutes and seconds, and sets $startchr to 1
  if(startchr == 0 ) {
    // makes sure the script uses integer numbers
    ctmnts = 19;
    ctsecs = 60;

    // if data not a number, sets the value to 0
    if(isNaN(ctmnts)) ctmnts = 0;
    if(isNaN(ctsecs)) ctsecs = 0;       

    // rewrite data in form fields to be sure that the fields for minutes and seconds contain integer number

    startchr = 60;
    document.getElementById('btnct').setAttribute('disabled', 'disabled');     // disable the button
}

  // if minutes and seconds are 0, sets $startchr to 0, and return false
  if(ctmnts==0 && ctsecs==0) {
    startchr = 0;
    document.getElementById('btnct').removeAttribute('disabled');     // remove "disabled" to enable the button

    /* HERE YOU CAN ADD TO EXECUTE A JavaScript FUNCTION WHEN COUNTDOWN TIMER REACH TO 0 */

    return false;
}
else {
    // decrease seconds, and decrease minutes if seconds reach to 0
    ctsecs--;
    if(ctsecs < 0) {
      if(ctmnts > 0) {
        ctsecs = 59;
        ctmnts--;
    }
    else {
        ctsecs = 0;
        ctmnts = 0;
    }
}
}
  // display the time in page, and auto-calls this function after 1 seccond
  document.getElementById('showmns').innerHTML = ctmnts;
  document.getElementById('showscs').innerHTML = ctsecs;
  setTimeout('countdownTimer()', 1000);
}
</script> --}}
<script> 
  
//var deadline = new Date("dec 31, 2018 15:37:25").getTime(); 
  var hours = 1;
  var minutes = 59;
  var seconds = 10;
var x = setInterval(function() { 
  
//var now = new Date().getTime(); 
//var t = deadline - now; 
//var days = Math.floor(t / (1000 * 60 * 60 * 24)); 
// var hours = 1; 
seconds--;
if(seconds == 0){
  if(minutes >  0){
    seconds = 10;
    minutes--;
  }
}
// document.getElementById("day").innerHTML =days ; 
document.getElementById("hour").innerHTML =hours; 
document.getElementById("minute").innerHTML = minutes;  
document.getElementById("second").innerHTML =seconds;  
if (t < 0) { 
        clearInterval(x); 
        // document.getElementById("demo").innerHTML = "TIME UP"; 
        // document.getElementById("day").innerHTML ='0'; 
        document.getElementById("hour").innerHTML ='0'; 
        document.getElementById("minute").innerHTML ='0' ;  
        document.getElementById("second").innerHTML = '0'; } 
}, 1000); 
</script> 
@endsection