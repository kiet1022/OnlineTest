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
      <ol class="breadcrumb" style="margin-bottom: 25px;background-color: #ffffff; border-left: 5px solid #29ca8e;">
        <li><a href="{{ route('get_home_page') }}" class="text-info">Trang chủ</a></li>
        <li><a href="{{ route('get_test_list_user') }}" class="text-info">Danh sách bài thi</a></li>
        <li class="text-info active">Xem trước bài thi</li>
    </ol>
    {{-- breadcrumb --}}
    @if(session('error'))
    <div class="alert alert-danger alert-dismissible show" role="alert">
        {{session('error')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div class="col-md-12 test-content">
      <form action="{{ route('get_test_detail',['id'=>$test->id]) }}" method="POST">
        @csrf
        @for($i = 0; $i< count($detail); $i++)
        <div class="form-group"><h4>{!!($i+1).'. '!!}{{$detail[$i]->question->content}}</h4></div>
        <div class="form-group question-content">
            <p>
                <input type="radio" id="a" disabled="">
                <label for="a">{{$detail[$i]->question->a}}</label></p>
            <p>
                <input type="radio" id="b" disabled="">
                <label for="b">{{$detail[$i]->question->b}}</label></p>
            <p>
                <input type="radio" id="c" disabled="">
                <label for="c">{{$detail[$i]->question->c}}</label></p>
            <p>
                <input type="radio" id="d" disabled="">
                <label for="d">{{$detail[$i]->question->d}}</label></p>
        </div>
        @endfor
        @if($test->password == '0')
            <button type="submit" class="btn btn-success btn-lg">Làm bài</button>
        @else
        <div class="form-group col-md-4">
            <label for="pass">Đây là bài thi tính phí, vui lòng nhập mật khẩu để vào làm bài</label>
            <input type="password" id="pass" name="pass" class="form-control" style="margin-bottom: 15px" required="">
            <button type="submit" class="btn btn-success btn-lg">Đồng ý</button>
        </div>
        @endif
        
    </form>
</div>
</div>
</section>
@endsection