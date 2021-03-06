@extends('admin.layout.index')
@section('title')
{{"Sửa câu hỏi"}}
@endsection
@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="admin/usermangement" class="text-info">Trang chủ</a></li>
    <li class="breadcrumb-item" aria-current="page">Quản lý câu hỏi</li>
    <li class="breadcrumb-item active" aria-current="page">Sửa câu hỏi</li>
</ol>
</nav>
<div class="col-sm-8 offset-sm-2">
  @if(count($errors)>0)
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        @foreach($errors->all() as $err)
        {{$err}}<br>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        @endforeach
    </div>
    @endif

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{session('success')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{session('error')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
<form action="{{route('post_edit_question',['id'=>$question->id])}}" method="post" enctype="multipart/form-data">
  @csrf
    <div class="form-group">
    <label for="exampleFormControlSelect1">Chọn chủ đề câu hỏi</label>
    <select class="form-control" id="exampleFormControlSelect1" name='id_type'>
      @foreach($question_type as $type)
      <option value="{{$type->id}}">{{$type->name}}</option>
      @endforeach
    </select>
  </div>
      <div class="form-group editor">
    <label for="contentt">Nội dung câu hỏi</label>
    <input type="text" class="form-control editor" id="contentt" name="content" value="{!! $question->content !!}">
  </div>
  <div class="form-group">
    <label for="answera">Đáp án A</label>
    <input type="text" class="form-control answer" id="answera" placeholder="Nhập nội dung của đáp án A" name="a" value="{{$question->a}}">
  </div>
  <div class="form-group">
    <label for="answerb">Đáp án B</label>
    <input type="text" class="form-control answer" id="answerb" placeholder="Nhập nội dung của đáp án B" name="b" value="{{$question->b}}">
  </div>
  <div class="form-group">
    <label for="answerc">Đáp án C</label>
    <input type="text" class="form-control answer" id="answerc" placeholder="Nhập nội dung của đáp án C" name="c" value="{{$question->c}}">
  </div>
  <div class="form-group">
    <label for="answerd">Đáp án D</label>
    <input type="text" class="form-control answer" id="answerd" placeholder="Nhập nội dung của đáp án D" name="d" value="{{$question->d}}">
  </div>
      <div class="form-group" id="choseCorrectAnswer">
    <label for="exampleFormControlSelect1">Chọn đáp án đúng</label>
    <select class="form-control" id="exampleFormControlSelect1" name='correct_answer'>
      {!! changeSelectedCorrectAnswer($question) !!}
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Lưu</button>
</form>
</div>
@endsection
@section('script')
    <script>
    // CKEDITOR.replace( 'exampleFormControlTextarea2' );
     $(".answer").change(function (){
  var html = '';
 html += '<label for="exampleFormControlSelect1">Chọn đáp án đúng</label>'+
 '<select class="form-control" id="exampleFormControlSelect1" name="correct_answer">'+
 '<option value="A">'+$('#answera').val()+'</option>'+
 '<option value="B">'+$('#answerb').val()+'</option>'+
 '<option value="C">'+$('#answerc').val()+'</option>'+
 '<option value="D">'+$('#answerd').val()+'</option>'+'</select>'
    $('#choseCorrectAnswer').html('');
    $('#choseCorrectAnswer').html(html);
 });
</script>
@endsection