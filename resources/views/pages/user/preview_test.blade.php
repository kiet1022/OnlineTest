@extends('pages.layout.index')
@section('title')
{{"xem trước đề thi"}}
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
        <li><a href="{{ route('get_test_added') }}" class="text-info active">Bài thi đã tạo</a></li>
    </ol>
    {{-- breadcrumb --}}
    <div class="container"><h3><strong>Xem trước bài thi</strong></h3></div>
    <div class="col-md-12 test-content">
        <div class="col-md-12" style="border-bottom: 2px solid #29ca8e; margin-bottom: 15px;">
             <h4>Tiêu đề bài thi: {{$test->title}}</h4>
            <h4>Số câu hỏi: {{$test->number_question}}</h4>
            <h4>Thời gian làm bài: {{$test->time}} phút</h4>
            <h4>Điểm số: {{$test->mark}}</h4>
            <h4>Ngày tạo đề: {{date('d/m/Y',strtotime($test->created_at))}}</h4>
            <h4>Mật khẩu bài thi: {{$test->password}}</h4>
        </div>
      <form action="#" method="POST">
        @for($i = 0; $i< count($detail); $i++)
        <div class="form-group"><h4>{!!($i+1).'. '!!}{{$detail[$i]->question->content}}</h4></div>
        <div class="form-group question-content">
            <p>
                <input type="radio" id="a" disabled="">
                <label for="a">{{$detail[$i]->question->a}}</label>{!!checkCorrectQuestion($detail[$i]->question->a,$detail[$i]->question->correct_answer)!!}
            </p>
            <p>
                <input type="radio" id="b" disabled="">
                <label for="b">{{$detail[$i]->question->b}}</label>{!!checkCorrectQuestion($detail[$i]->question->b,$detail[$i]->question->correct_answer)!!}
            </p>
            <p>
                <input type="radio" id="c" disabled="">
                <label for="c">{{$detail[$i]->question->c}}</label>{!!checkCorrectQuestion($detail[$i]->question->c,$detail[$i]->question->correct_answer)!!}
            </p>
            <p>
                <input type="radio" id="d" disabled="">
                <label for="d">{{$detail[$i]->question->d}}</label>{!!checkCorrectQuestion($detail[$i]->question->d,$detail[$i]->question->correct_answer)!!}
            </p>
        </div>
        @endfor
    </form>
</div>
</div>
</section>
@endsection