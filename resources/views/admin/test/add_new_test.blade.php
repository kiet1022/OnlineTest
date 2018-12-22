@extends('admin.layout.index')
@section('title')
{{"Thêm bài thi"}}
@endsection
@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('get_home_page') }}" class="text-info">Trang chủ</a></li>
    <li class="breadcrumb-item" aria-current="page">Quản lý bài thi</li>
    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('get_test_list') }}">Danh sách bài thi</a></li>
    <li class="breadcrumb-item active" aria-current="page">Thêm bài thi</li>
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
    <div {{-- style="height: 430px;overflow-y: scroll;" --}}>
        
    
    <form action="{{ route('post_add_new_test') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="container">
          <!-- Nav tabs -->
          <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#home">Thông tin chung</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#menu1">Thêm câu hỏi</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#menu2">Nhập câu hỏi bằng file excel</a>
          </li>
      </ul>

      <!-- Tab panes -->
      <div class="tab-content">
        <div id="home" class="container tab-pane active"><br>
            <div class="form-group">
                <label for="ipnewstype">Tiêu đề bài thi</label>
                <input type="text" class="form-control" id="idquestiontype" placeholder="Nhập tiêu đề bài thi" name='title'>
            </div>
            <div class="form-group">
                <label for="ipnewstype">Số lượng câu hỏi</label>
                <input type="number" class="form-control" id="idquestiontype" placeholder="Nhập số lượng câu hỏi" name='numberofquestion'>
            </div>
            <div class="form-group" id="choseCorrectAnswer">
                <label for="exampleFormControlSelect1">Thời lượng làm bài</label>
                <select class="form-control" id="exampleFormControlSelect1" name='time'>
                    <option value="20">20 phút</option>
                    <option value="30">30 phút</option>
                    <option value="60">60 phút</option>
                    <option value="120">120 phút</option>
                </select>
            </div>
            <div class="form-group">
                <label for="time">Chủ đề bài thi</label>
                <select name="topic" id="topic" class="form-control" required="true">
                    @foreach($topics as $topic)
                    <option value="{{$topic->id}}">{{$topic->title}}</option>
                    @endforeach
                    <option value="0">Khác...</option>
                </select>
            </div>
            <div class="form-group">
                <label for="pass">Mật khẩu bài thi</label>
                <input type="text" id="pass" name="pass" placeholder="Nhập mật khẩu cho bài thi(Nhập 0 nếu không đặt mật khẩu)" class="form-control">
            </div>
        </div>
        <div id="menu1" class="container tab-pane fade"><br>
            <div class="row question" style="margin-bottom: 15px; height: 500px;overflow-y: scroll;">
                {{-- <div class="col-md-6">
                    <div class="card">
                        <div class="card-header bg-info">
                            <div class="row">
                                <div class="col-md-6"><h4>Câu 1:</h4></div>
                                <div class="col-md-6" style="text-align: right;"><a style="cursor: pointer;"><i class="fa fa-minus"></i> Xóa câu hỏi</a></div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-8">
                                    <label for="a_1">Đáp án A: </label>
                                    <input type="text"  class="form-control" id="a_1" name="a_1" placeholder="Nhập nội dung đáp án a">
                                </div>
                                <div class="form-group col-4" style="text-align: center; margin-top: 10px">
                                    <label for="check_1">Đáp án đúng: </label>
                                    <input type="radio" name="check_1" id="check_1" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-8">
                                    <label for="b_1">Đáp án B: </label>
                                    <input type="text"  class="form-control" id="b_1" name="b_1" placeholder="Nhập nội dung đáp án b">
                                </div>
                                <div class="form-group col-4" style="text-align: center; margin-top: 10px">
                                    <label for="check_1">Đáp án đúng: </label>
                                    <input type="radio" name="check_1" id="check_1" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-8">
                                    <label for="c_1">Đáp án C: </label>
                                    <input type="text"  class="form-control" id="c_1" name="c_1" placeholder="Nhập nội dung đáp án c">
                                </div>
                                <div class="form-group col-4" style="text-align: center; margin-top: 10px">
                                    <label for="check_1">Đáp án đúng: </label>
                                    <input type="radio" name="check_1" id="check_1" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-8">
                                    <label for="d_1">Đáp án A: </label>
                                    <input type="text"  class="form-control" id="d_1" name="d_1" placeholder="Nhập nội dung đáp án a">
                                </div>
                                <div class="form-group col-4" style="text-align: center; margin-top: 10px">
                                    <label for="check_1">Đáp án đúng: </label>
                                    <input type="radio" name="check_1" id="check_1" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div><div style="text-align: center;">
                <button onclick="addaquestion()" type="button" class="btn btn-success" style="width: 80%"><i class="fa fa-plus"></i> Thêm Câu Hỏi</button>
            </div>
        </div>

        <div id="menu2" class="container tab-pane fade"><br>
            <div class="card">
                <div class="card-body">
                    <h4>Vui lòng tải mẫu excel và import theo đúng mẫu.</h4>
                    <div class="form-group">
                        <input class="form-control" type="file" name="file">
                    </div>
                    <a class="btn btn-warning text-white" href="{{ asset('template/Import_Question_Template.xlsx') }}">Tải mẫu Excel</a>
                </div>
            </div>
        </div>
        </div>
</div>
<button id="submit" type="submit" class="btn btn-primary">Đồng ý</button>
    <!-- Button trigger modal -->
{{-- <button type="button" id="previewtest" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Xem trước bài thi</button> --}}
</form>
</div>
@endsection
{{-- @section('modal')
    <!-- Modal -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
              <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
            <p id="preview_tit">Tiêu đề bài thi: </p>
            <p id="preview_time">Thời gian làm bài: </p>
            <p id="preview_number_question">Số câu hỏi: </p>
            <p id="preview_mark">Số điểm tối đa: <strong>100 Điểm</strong></p>
            <hr>
        </div>
        <div class="container" style="height: 250px;overflow-y: scroll;">
            <table id="preview" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Nội dung câu hỏi</th>
                        <th>Đáp án A</th>
                        <th>Đáp án B</th>
                        <th>Đáp án C</th>
                        <th>Đáp án D</th>
                        <th>Đáp án đúng</th>
                        <th>Chủ đề</th>
                    </tr>
                </thead>
                <tbody id="preview_question">
                   <tr>
                    <td >dsfsdfsdf</td>
                    <td >sfdsdfsdf</td>
                    <td >sdfsdfsdf</td>
                    <td >sdfsdfsd</td>
                    <td >sdfsdfsdf</td>
                    <td >sdfsdfsd</td>
                    <td >ssdsdsdsd</td>
                    <td >sdfsdfsdf</td>
                </tr>    
            </tbody>
        </table>
    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
@endsection --}}
@section('script')
<script>
    var i = 0;
        function addaquestion(){
            i++;
            var html = '';
            html+='<div class="col-md-6" id="'+i+'">';
            html+='<div class="card" style="margin-bottom: 15px;">';
            html+='<div class="card-header bg-info">';
            html+='<div class="row">';
            html+='<div class="col-md-6"><h4>Câu '+i+':</h4></div>';
            html+='<div class="col-md-6" style="text-align: right;"><a onclick="removeaquestion()" style="cursor: pointer; color: red;"><i class="fa fa-minus"></i> Xóa câu hỏi</a></div>';
            html+='</div></div>';
            html+='<div class="card-body">';

               html+='<div class="row"><div class="form-group col-md-12"><input type="hidden" value="'+i+'" class="number" name="countquest">';
            html+='<label for="title_'+i+'">Nội dung câu hỏi: </label>';
            html+='<input type="text"  class="form-control" id="title_'+i+'1" name="title_['+i+']" placeholder="Nhập nội dung câu hỏi">';
            html+='</div></div>';

            html+='<div class="row"><div class="form-group col-md-8">';
            html+='<label for="a_'+i+'">Đáp án A: </label>';
            html+='<input type="text"  class="form-control" id="a_'+i+'1" name="a_['+i+']" placeholder="Nhập nội dung đáp án A">';
            html+='</div>';
            html+='<div class="form-group col-4" style="text-align: center; margin-top: 10px">';
            html+='<label for="check_'+i+'">Đáp án đúng: </label>';
            html+='<input type="radio" name="check_['+i+']" id="check_'+i+'" value="a_['+i+']" class="form-control"></div></div>';
            html+='<div class="row"><div class="form-group col-md-8">';
           html+='<label for="b_'+i+'">Đáp án B: </label>'; 
           html+='<input type="text"  class="form-control" id="b_'+i+'" name="b_['+i+']" placeholder="Nhập nội dung đáp án B"></div>'; 
            html+='<div class="form-group col-4" style="text-align: center; margin-top: 10px">';
            html+='<label for="check_'+i+'">Đáp án đúng: </label>';
           html+='<input type="radio" name="check_['+i+']" id="check_'+i+'" value="b_['+i+']" class="form-control"></div></div>'; 
           html+='<div class="row">'; 
           html+='<div class="form-group col-md-8">'; 
           html+='<label for="c_'+i+'">Đáp án C: </label>';
            html+='<input type="text"  class="form-control" id="c_'+i+'" name="c_['+i+']" placeholder="Nhập nội dung đáp án C"></div>'; 
            html+='<div class="form-group col-4" style="text-align: center; margin-top: 10px">'; 
            html+='<label for="check_'+i+'">Đáp án đúng: </label>'; 
            html+='<input type="radio" name="check_['+i+']" id="check_'+i+'" value="c_['+i+']" class="form-control"></div></div>'; 
            html+='<div class="row">'; 
            html+='<div class="form-group col-md-8">'; 
            html+='<label for="d_'+i+'">Đáp án D: </label>';
            html+='<input type="text"  class="form-control" id="d_'+i+'" name="d_['+i+']" placeholder="Nhập nội dung đáp án D"></div>'; 
            html+='<div class="form-group col-4" style="text-align: center; margin-top: 10px">'; 
            html+='<label for="check_'+i+'">Đáp án đúng: </label>'; 
            html+='<input type="radio" name="check_['+i+']" id="check_'+i+'" value="d_['+i+']" class="form-control">'; 
            html+='</div></div></div></div></div>';                                
            $('.question').append(html);
        }
        function removeaquestion(){
            $("div").remove('#'+i);
            i--;
        }
</script>
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