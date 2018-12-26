@extends('admin.layout.index')
@section('title')
{{"Chỉnh sửa bài thi"}}
@endsection
@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="admin/usermangement" class="text-info">Trang chủ</a></li>
    <li class="breadcrumb-item" aria-current="page">Quản lý bài thi</li>
    <li class="breadcrumb-item " aria-current="page">Chỉnh sửa</li>
</ol>
</nav>
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
    <div class="container messages"></div>
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
    <div style="height: 430px;overflow-y: scroll;">
        
    
    <form action="{{route('post_edit_test',['id'=>$oldTest->id])}}" method="post">
        @csrf
        <div class="container">
          <!-- Nav tabs -->
          <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#home">Thông tin chung</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#menu1">Chỉnh sửa câu hỏi</a>
          </li>
{{--           <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#menu2">Menu 2</a>
          </li> --}}
      </ul>

      <!-- Tab panes -->
      <div class="tab-content">
        <div id="home" class="container tab-pane active"><br>
            <div class="form-group">
                <label for="ipnewstype">Tiêu đề bài thi</label>
                <input type="text" class="form-control" id="idquestiontype" placeholder="Nhập tiêu đề bài thi" name='title' value="{{$oldTest->title}}">
            </div>
            <div class="form-group">
                <label for="ipnewstype">Số lượng câu hỏi(Bạn không thể chỉnh sửa số lượng câu hỏi)</label>
                <input type="number" class="form-control" id="idquestiontype" placeholder="Nhập số lượng câu hỏi" name='numberofquestion'value="{{$oldTest->number_question}}" readonly="">
            </div>
            <div class="form-group" id="choseCorrectAnswer">
                <label for="exampleFormControlSelect1">Thời lượng làm bài</label>
                <select class="form-control" id="exampleFormControlSelect1" name='time' value="{{$oldTest->time}}">
                    <option value="20" 
                    @if($oldTest->time == 20)
                        {{"selected"}}
                    @endif>20 phút</option>
                    <option value="30" 
                    @if($oldTest->time == 30)
                        {{"selected"}}
                    @endif>30 phút</option>
                    <option value="60"
                    @if($oldTest->time == 60)
                        {{"selected"}}
                    @endif>60 phút</option>
                </select>
            </div>
            <div class="form-group">
                <label for="time">Chủ đề bài thi</label>
                <select name="topic" id="topic" class="form-control" required="true">
                    @foreach($topics as $topic)
                    <option value="{{$topic->id}}" 
                        @if($oldTest->id_topic == $topic->id) 
                        {{"selected"}} 
                        @endif>
                        {{$topic->title}}</option>
                    @endforeach
                    <option value="0">Khác...</option>
                </select>
            </div>
            <div class="form-group">
                <label for="pass">Mật khẩu bài thi</label>
                <input type="text" id="pass" name="pass" placeholder="Nhập mật khẩu cho bài thi(Nhập 0 nếu không đặt mật khẩu)" class="form-control" value="{{$oldTest->password}}">
            </div>
        </div>
        <div id="menu1" class="container tab-pane fade"><br>
            <div class="row">
                @for($i = 0 ; $i< count($detail); $i++)
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header bg-info">
                            <div class="row">
                                <div class="col-md-6"><h4>Câu {{$i+1}}:</h4></div>
                                <input type="hidden" value="{{$i+1}}" name="countquest">
                                <input type="hidden" value="{{$detail[$i]->question->id}}" {!! 'name="id_['.$i.']"' !!}>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label {!! 'for="title_'.$i.'"' !!}>Nội dung câu hỏi</label>
                                    <input type="text" class="form-control" {!! 'id="title_'.$i.'"' !!} {!! 'name="title_['.$i.']"' !!} placeholder="Nhập nội dung câu hỏi" value="{{$detail[$i]->question->content}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-8">
                                    <label {!! 'for="a_'.$i.'"' !!}>Đáp án A: </label>
                                    <input type="text"  class="form-control" {!! 'id="a_'.$i.'"'!!} {!! 'name="a_['.$i.']"' !!} placeholder="Nhập nội dung đáp án a" value="{{$detail[$i]->question->a}}">
                                </div>
                                <div class="form-group col-4" style="text-align: center; margin-top: 10px">
                                    <label {!! 'for="check_'.$i.'"' !!}}>Đáp án đúng: </label>
                                    <input type="radio" {!!'name="check_['.$i.']"'!!} {!!'id="check_'.$i.'"'!!} class="form-control" {{checkCorrectQuestionForEditTest($detail[$i]->question->a, $detail[$i]->question->correct_answer)}} {!! 'value="a_['.$i.']"' !!}>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-8">
                                    <label {!! 'for="b_'.$i.'"' !!}>Đáp án B: </label>
                                    <input type="text"  class="form-control" {!! 'id="b_'.$i.'"'!!} {!! 'name="b_['.$i.']"' !!} placeholder="Nhập nội dung đáp án b" value="{{$detail[$i]->question->b}}">
                                </div>
                                <div class="form-group col-4" style="text-align: center; margin-top: 10px">
                                    <label {!! 'for="check_'.$i.'"' !!}}>Đáp án đúng: </label>
                                    <input type="radio" {!!'name="check_['.$i.']"'!!} {!!'id="check_'.$i.'"'!!} class="form-control" {{checkCorrectQuestionForEditTest($detail[$i]->question->b, $detail[$i]->question->correct_answer)}} {!! 'value="b_['.$i.']"' !!}>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-8">
                                    <label {!! 'for="c_'.$i.'"' !!}>Đáp án C: </label>
                                    <input type="text"  class="form-control" {!! 'id="c_'.$i.'"'!!} {!! 'name="c_['.$i.']"' !!} placeholder="Nhập nội dung đáp án c" value="{{$detail[$i]->question->c}}">
                                </div>
                                <div class="form-group col-4" style="text-align: center; margin-top: 10px">
                                    <label {!! 'for="check_'.$i.'"' !!}}>Đáp án đúng: </label>
                                    <input type="radio" {!!'name="check_['.$i.']"'!!} {!!'id="check_'.$i.'"'!!} class="form-control" {{checkCorrectQuestionForEditTest($detail[$i]->question->c, $detail[$i]->question->correct_answer)}} {!! 'value="c_['.$i.']"' !!}>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-8">
                                    <label {!! 'for="d_'.$i.'"' !!}>Đáp án D: </label>
                                    <input type="text"  class="form-control" {!! 'id="d_'.$i.'"'!!} {!! 'name="d_['.$i.']"' !!} placeholder="Nhập nội dung đáp án d" value="{{$detail[$i]->question->d}}">
                                </div>
                                <div class="form-group col-4" style="text-align: center; margin-top: 10px">
                                    <label {!! 'for="check_'.$i.'"' !!}}>Đáp án đúng: </label>
                                    <input type="radio" {!!'name="check_['.$i.']"'!!} {!!'id="check_'.$i.'"'!!} class="form-control" {{checkCorrectQuestionForEditTest($detail[$i]->question->d, $detail[$i]->question->correct_answer)}} {!! 'value="d_['.$i.']"' !!}>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                @endfor
            </div>
        </div>
        </div>
        <button id="submit" type="submit" class="btn btn-primary">Đồng ý</button>
</div>

</form>
</div>
@endsection




{{-- var data = $('#example').DataTable().rows( {selected:  true} ).data();
var newarray=[];       
        for (var i=0; i < data.length ;i++){
           console.log("ID: " + data[i][1] + " Content: " + data[i][2] + " A: " + data[i][3] + " B: "+ data[i][4] + " C: "+ data[i][5]+ " D: "+ data[i][6]+ " Correct: "+ data[i][7]);
        newarray.push(data[i][1]);
newarray.push(data[i][2]);newarray.push(data[i][3]);newarray.push(data[i][4]);newarray.push(data[i][5]);newarray.push(data[i][6]);newarray.push(data[i][7]);
        }
var k = newarray.join;
console.log(k); --}}