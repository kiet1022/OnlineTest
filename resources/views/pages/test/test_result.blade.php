@extends('pages.layout.index')
@section('title')
{{"Kết quả bài thi"}}
@endsection
@section('style')
<link rel="stylesheet" href="pages/css/testdetail.css">
@endsection
@section('content')
<div {{-- style="text-align: center;" --}}>
  
  <div class="container">
    <div class="panel panel-success" style="margin-top: 35px;">
    <div class="panel-heading"><h5><strong>Kết quả</strong></h5></div>
    <div class="panel-body">
      {{-- show total mark end date join --}}
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="mark_result">
            <h2><strong>{{$totalMark}}</strong>/100</h2>
          </div>
          <div class="row">
            <div class="col-md-6" style="text-align: right;">Ngày làm:</div>
            <div class="col-md-6" style="text-align: left;">20/11/2018</div>
          </div>
          <div class="row">
            <div class="col-md-6" style="text-align: right;">Ngày làm:</div>
            <div class="col-md-6" style="text-align: left;">20/11/2018</div>
          </div>
          <div class="row">
            <div class="col-md-6" style="text-align: right;">Ngày làm:</div>
            <div class="col-md-6" style="text-align: left;">20/11/2018</div>
          </div>
        </div>
      </div>
      {{--end show total mark end date join --}}
      <div class="col-md-6">
        <div class="panel panel-success">
          <div class="panel-heading"><h5><strong>Xem đáp án</strong></h5></div>
          <div class="panel-body">
            <div style="text-align: center;"><strong>Nếu chưa hài lòng với kết quả, Bạn nên cố gắng tự kiểm tra lại bài làm trước khi xem đáp án hoặc lời giải!</strong><br><br><br><br>
              <button class="btn btn-success">xem đáp án</button>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="panel panel-success">
          <div class="panel-heading"><h5><strong>Các bài thi liên quan</strong></h5></div>
          <div class="panel-body">sdfsdfsdfds</div>
        </div>
      </div>
    </div>
  </div>
<div class="container"><h3><strong>Bài làm của bạn</strong></h3></div>
<div class="col-md-12 test-content">
      <form action="#" method="POST">
        @csrf     {{--    
        @foreach($testDetail as $detail) --}}
        @for($i = 0; $i < count($testDetail);$i++)
        <div class="form-group"><h4>{!!($i+1).'. '!!}{{$testDetail[$i]->question->content}}</h4></div>
        <div class="form-group question-content">
            <p>
                <input type="radio" 
                {!!'id="answer-for-question-'.$i.'-A"'!!} 
                {!!'name="answer_for_question_['.$i.']"'!!} 
                 @if(!empty($attemp->answer_for_question_[$i]))
                  {{checkYourAnswer($testDetail[$i]->question->a,$attemp->answer_for_question_[$i])}}
                  @else {{"disabled"}}
                @endif>
                <label 
                {!!'for="answer-for-question-'.$i.'-A"'!!}">
                {{$testDetail[$i]->question->a}}
              </label>{!!checkCorrectQuestion($testDetail[$i]->question->a,$testDetail[$i]->question->correct_answer)!!}
            </p>
            <p>
                <input type="radio" 
                {!!'id="answer-for-question-'.$i.'-B"'!!} 
                {!!'name="answer_for_question_['.$i.']"'!!} 
                {!!'value="'.$testDetail[$i]->question->b.'"'!!}
                 @if(!empty($attemp->answer_for_question_[$i]))
                  {{checkYourAnswer($testDetail[$i]->question->b,$testDetail[$i]->question->correct_answer)}}
                  @else {{"disabled"}}
                @endif>
                <label 
                {!!'for="answer-for-question-'.$i.'-B"'!!}>
                {{$testDetail[$i]->question->b}}
              </label>
              {!!checkCorrectQuestion($testDetail[$i]->question->b,$testDetail[$i]->question->correct_answer)!!}
            </p>
            <p>
                <input type="radio" 
                {!!'id="answer-for-question-'.$i.'-C"'!!} 
                {!!'name="answer_for_question_['.$i.']"'!!} 
                {!!'value="'.$testDetail[$i]->question->c.'"'!!}
                 @if(!empty($attemp->answer_for_question_[$i]))
                  {{checkYourAnswer($testDetail[$i]->question->c,$testDetail[$i]->question->correct_answer)}}
                  @else {{"disabled"}}
                @endif>
                <label {!!'for="answer-for-question-'.$i.'-C"'!!}>
                  {{$testDetail[$i]->question->c}}
                </label>

                {!!checkCorrectQuestion($testDetail[$i]->question->c,$testDetail[$i]->question->correct_answer)!!}
            </p>
            <p>
                <input type="radio" 
                {!!'id="answer-for-question-'.$i.'-D"'!!} 
                {!!'name="answer_for_question_['.$i.']"'!!} 
                {!!'value="'.$testDetail[$i]->question->d.'"'!!}
                 @if(!empty($attemp->answer_for_question_[$i]))
                  {{checkYourAnswer($testDetail[$i]->question->d,$attemp->answer_for_question_[$i])}}
                  @else {{"disabled"}}
                @endif>
                <label {!!'for="answer-for-question-'.$i.'-D"'!!}>
                  {{$testDetail[$i]->question->d}}
                </label>{!!checkCorrectQuestion($testDetail[$i]->question->d,$testDetail[$i]->question->correct_answer)!!}
            </p>
        </div>
        @endfor
        {{-- @endforeach --}}
        {{-- <button type="submit" class="btn btn-success">Nộp bài</button> --}}
    </form>
   {{--  <div>{{$testDetail->links()}}</div> --}}
</div>
  </div>
</div>
@endsection