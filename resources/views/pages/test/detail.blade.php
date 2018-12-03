@extends('pages.layout.index')
@section('title')
{{"Làm bài thi"}}
@endsection
@section('style')
<link rel="stylesheet" href="pages/css/testdetail.css">
@endsection
@section('content')
<section style="padding-top: 20px; padding-bottom: 20px;" class="content">
<div class="container">
            {{-- breadcrumb --}}
            <ol class="breadcrumb" style="margin-bottom: 0;background-color: #ffffff; border-left: 5px solid #29ca8e;">
                <li><a href="{{ route('get_home_page') }}" class="text-info">Trang chủ</a></li>
                <li><a href="{{ route('get_forum_page') }}" class="text-info">Bài thi</a></li>
                <li class="active">{{ $test->title }}</li>
            </ol>
            {{-- breadcrumb --}}
    <div class="panel-body text-center">

    </div>
    
    <div class="col-md-12 test-content">
        <div style="overflow-y: scroll; height: 100px;">
            <div class="col-md-6">
                <button class="btn btn-primary btn-lg" id="btnct" onclick="countdownTimer()">
                    <i class="fa fa-play" aria-hidden="true"></i> Bắt đầu làm bài
                </button>
            </div>
            <div class="col-md-6 clock">
                <div id="clockdiv">
                <div>
                    <span class="minutes" id="minute">{{showMinutes($test->time)}}</span>
                </div>
                <div>:</div>
                <div>
                    <span class="seconds" id="second">00</span>
                </div>
            </div>
            </div>
        </div>
      <form action="{{route('submit_attempt',['idtest'=>$testDetail[1]->id_test])}}" method="POST">
        @csrf     {{--    
        @foreach($testDetail as $detail) --}}
        <input type="hidden" id="min" name="minute">
        <input type="hidden" id="sec" name="second">
        @for($i = 0; $i < count($testDetail);$i++)
        <div class="form-group"><h4>{!!($i+1).'. '!!}{{$testDetail[$i]->question->content}}</h4></div>
        <div class="form-group question-content">
            <p>
                <input type="radio" {!!'id="answer-for-question-'.$i.'-A"'!!} {!!'name="answer_for_question_['.$i.']"'!!} {!!'value="'.$testDetail[$i]->question->a.'"'!!}>
                <label {!!'for="answer-for-question-'.$i.'-A"'!!}">{{$testDetail[$i]->question->a}}</label>
            </p>
            <p>
                <input type="radio" {!!'id="answer-for-question-'.$i.'-B"'!!} {!!'name="answer_for_question_['.$i.']"'!!} {!!'value="'.$testDetail[$i]->question->b.'"'!!}>
                <label {!!'for="answer-for-question-'.$i.'-B"'!!}>{{$testDetail[$i]->question->b}}</label>
            </p>
            <p>
                <input type="radio" {!!'id="answer-for-question-'.$i.'-C"'!!} {!!'name="answer_for_question_['.$i.']"'!!} {!!'value="'.$testDetail[$i]->question->c.'"'!!}>
                <label {!!'for="answer-for-question-'.$i.'-C"'!!}>{{$testDetail[$i]->question->c}}</label>
            </p>
            <p>
                <input type="radio" {!!'id="answer-for-question-'.$i.'-D"'!!} {!!'name="answer_for_question_['.$i.']"'!!} {!!'value="'.$testDetail[$i]->question->d.'"'!!}>
                <label {!!'for="answer-for-question-'.$i.'-D"'!!}>{{$testDetail[$i]->question->d}}</label>
            </p>
        </div>
        @endfor
        {{-- @endforeach --}}
        <button id="submit" type="submit" class="btn btn-success btn-lg"><i class="fa fa-copy"></i> Nộp bài</button>
    </form>
</div>
{{-- <div>{{$testDetail->links}}</div> --}}
</div>
</section>
@endsection
@section('script')
<script>
    $(document).ready(function(){
        document.getElementById('submit').setAttribute('disabled', 'disabled');
    });
  function countdownTimer(){
    document.getElementById('submit').removeAttribute('disabled', 'disabled');
    //var deadline = new Date("dec 31, 2018 15:37:25").getTime(); 
  // var hours = $('#hour').val();
  var minutes = document.getElementById("minute").innerHTML - 1;
    //var minutes = 2;
  var seconds = 60;
  document.getElementById('btnct').setAttribute('disabled', 'disabled');
var x = setInterval(function() { 
seconds--;
if(seconds == 0){
  if(minutes >  0){
    seconds = 59;
    minutes--;
  }else {
    clearInterval(x); 
        // document.getElementById("demo").innerHTML = "TIME UP"; 
        document.getElementById("minute").innerHTML ='0' ;  
        document.getElementById("second").innerHTML = '0';
        alert('hết giờ'); 
  }
}
if(minutes == 1){
    $('#clockdiv').css({'background':'red','border':'3px solid red'});
    $('#clockdiv div > span').css('background','red');
    $('#clockdiv div').css('background','red');
}
document.getElementById("minute").innerHTML = minutes;
document.getElementById("second").innerHTML =seconds;
$('#min').val(minutes);
$('#sec').val(seconds);
}, 1000); 
}
</script> 
@endsection