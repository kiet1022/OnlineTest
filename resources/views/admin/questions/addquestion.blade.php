@extends('admin.layout.index')
@section('title')
{{"Thêm câu hỏi"}}
@endsection
@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="admin/usermangement" class="text-info">Trang chủ</a></li>
    <li class="breadcrumb-item" aria-current="page">Quản lý câu hỏi</li>
    <li class="breadcrumb-item active" aria-current="page">Thêm câu hỏi</li>
  </ol>
</nav>
<div class="col-sm-8 offset-sm-2">
  <button type="button" class="btn btn-success" data-toggle="collapse" data-target="#demo">Import excel</button>
  <button type="button" class="btn btn-success" data-toggle="collapse" data-target="#demo1">Nhập tay</button>
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
</div>

<div class="col-sm-8 offset-sm-2">
  <div class="container" style="padding: 0;">
      <div id="demo" class="collapse">
        Vui lòng tải mẫu excel và import theo đúng mẫu.
        <form action="{{route('import_question_by_file')}}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <input class="form-control" type="file" name="file">
          </div>
          <a class="btn btn-warning text-white" href="{{ asset('template/Import_Question_Template.xlsx') }}">Tải mẫu Excel</a>
          <button type="submit" class="btn btn-success">Nhập dữ liệu</button>
        </form>
        
      </div>
    </div>
</div>

<div class="col-sm-8 offset-sm-2">
  <div class="container" style="padding: 0;">
      <div id="demo1" class="collapse">
        <form action="{{route('post_add_new_question')}}" method="post" enctype="multipart/form-data">
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
      <label for="exampleFormControlTextarea2">Nội dung câu hỏi</label>
      <textarea class="form-control editor" id="exampleFormControlTextarea2" rows="3" name="content"></textarea>
    </div>
    <div class="form-group">
      <label for="exampleFormControlInput1">Đáp án A</label>
      <input type="text" class="form-control answer" id="answera" placeholder="Nhập nội dung của đáp án A" name="a">
    </div>
    <div class="form-group">
      <label for="exampleFormControlInput1">Đáp án B</label>
      <input type="text" class="form-control answer" id="answerb" placeholder="Nhập nội dung của đáp án B" name="b">
    </div>
    <div class="form-group">
      <label for="exampleFormControlInput1">Đáp án C</label>
      <input type="text" class="form-control answer" id="answerc" placeholder="Nhập nội dung của đáp án C" name="c">
    </div>
    <div class="form-group">
      <label for="exampleFormControlInput1">Đáp án D</label>
      <input type="text" class="form-control answer" id="answerd" placeholder="Nhập nội dung của đáp án D" name="d">
    </div>
    <div class="form-group" id="choseCorrectAnswer">
      <label for="exampleFormControlSelect1">Chọn đáp án đúng</label>
      <select class="form-control" id="exampleFormControlSelect1" name='correct_answer'>
        <option value="A">Đáp án A</option>
        <option value="B">Đáp án B</option>
        <option value="C">Đáp án C</option>
        <option value="D">Đáp án D</option>
      </select>
    </div>
    <button type="submit" class="btn btn-primary">Lưu</button>    
  </form>
        
      </div>
    </div>
</div>
@endsection
@section('script')
<script>
 CKEDITOR.replace( 'exampleFormControlTextarea2' );
 
 $("#answerd").change(function (){
  var html = '';
 html += '<label for="exampleFormControlSelect1">Chọn đáp án đúng</label>'+
 '<select class="form-control" id="exampleFormControlSelect1" name="correct_answer">'+
 '<option value="A">'+$('#answera').val()+'</option>'+
 '<option value="B">'+$('#answerb').val()+'</option>'+
 '<option value="C">'+$('#answerc').val()+'</option>'+
 '<option value="D">'+$('#answerd').val()+'</option>'+'</select>'
    $('#choseCorrectAnswer').html();
    $('#choseCorrectAnswer').html(html);
 });
</script>
@endsection