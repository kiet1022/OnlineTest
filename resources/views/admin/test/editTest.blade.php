@extends('admin.layout.index')
@section('title')
{{"Chỉnh sửa bài thi"}}
@endsection
@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="admin/usermangement" class="text-info">Trang chủ</a></li>
    <li class="breadcrumb-item" aria-current="page">Quản lý bài thi</li>
    <li class="breadcrumb-item" aria-current="page"><a href="{{route('get_questions_types_list')}}" class="text-info">Danh sách loại câu hỏi</a></li>
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
        
    
    <form action="{{route('post_add_new_test')}}" method="post">
        @csrf
        <div class="container">
          <!-- Nav tabs -->
          <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#home">Thông tin chung</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#menu1">Chọn câu hỏi</a>
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
                <label for="ipnewstype">Số lượng câu hỏi</label>
                <input type="number" class="form-control" id="idquestiontype" placeholder="Nhập số lượng câu hỏi" name='numberofquestion'value="{{$oldTest->number_question}}">
            </div>
            <div class="form-group" id="choseCorrectAnswer">
                <label for="exampleFormControlSelect1">Thời lượng làm bài</label>
                <select class="form-control" id="exampleFormControlSelect1" name='time' value="{{$oldTest->time}}">
                    <option value="20">20 phút</option>
                    <option value="30">30 phút</option>
                    <option value="60">60 phút</option>
                    <option value="120">120 phút</option>
                </select>
            </div>
        </div>
        <div id="menu1" class="container tab-pane fade"><br>
            <p id="max_ques">Số câu hỏi tối đa:</p>
            <p id="selected_ques">Số câu hỏi đã chọn: 0</p>
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th></th>
                        <th>ID</th>
                        <th>Nội dung câu hỏi</th>
                        <th>Đáp án A</th>
                        <th>Đáp án B</th>
                        <th>Đáp án C</th>
                        <th>Đáp án D</th>
                        <th>Đáp án đúng</th>
                        <th>Chủ đề</th>
                    </tr>
                </thead>
                <tbody>
                 @foreach($questions as $qt)
                 <tr>
                    <td></td>
                    <td>{{$qt->id}}</td>
                    <td>{!! $qt->content !!}</td>
                    <td>{{$qt->a}}</td>
                    <td>{{$qt->b}}</td>
                    <td>{{$qt->c}}</td>
                    <td>{{$qt->d}}</td>
                    <td>{{$qt->correct_answer}}</td>
                    <td>{{$qt->type->name}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
{{-- <div id="menu2" class="container tab-pane fade"><br>
  <h3>Menu 2</h3>
  <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
</div> --}}
        </div>
</div>
<button id="submit" type="button" class="btn btn-primary">Đồng ý</button>
    <!-- Button trigger modal -->
<button type="button" id="previewtest" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Xem trước bài thi</button>
</form>
</div>
@endsection
@section('modal')
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
@endsection
@section('documentready')
    var table = $('#example').DataTable( {
        columnDefs: [ {
            orderable: false,
            className: 'select-checkbox',
            targets:   0
        } ],
        select: {
            style:    'multi',
            //selector: 'td:first-child'
        },
        order: [[ 1, 'asc' ]],
        dom: 'Bfrtip',
        buttons: [
            {
                text: 'Select all',
                action: function () {
                    table.rows([0,1,2,3]).select();
                }
            },
            {
                text: 'Bỏ chọn tất cả',
                action: function () {
                    table.rows().deselect();
                }
            }
        ]
    } );
    var count = 0;
    $('#example').DataTable().on('select', function(e, dt, type, indexes){
        count = $('#example').DataTable().rows('.selected').count();
        $('#selected_ques').html('Số câu hỏi đã chọn: '+count);
        checkNumberOfQuestion(count);
    });
    $('#example').DataTable().on('deselect', function(e, dt, type, indexes){
        count = $('#example').DataTable().rows('.selected').count();
        $('#selected_ques').html('Số câu hỏi đã chọn: '+count);
        checkNumberOfQuestion(count);
    });    
    {{-- $('#preview').DataTable({
        "searching": false,
        "pageLength": 5,
    }); --}}
@endsection
@section('script')
<script>
    function checkNumberOfQuestion(count){
        var begin = $("input[name=numberofquestion]").val();
        if(begin >=1 && begin <= 20){

        }else
        if(count > begin){
            alert("Vượt quá số câu hỏi tối đa, vui lòng bỏ bớt câu hỏi");
            $('#submit').addClass('disabled').off('click').on('click',function(e){
                e.preventDefault();
            });
        }else{
             $('#submit.disabled').removeClass('disabled').off('click');
        }
    }

    //when click the button preview test
    
    $('#previewtest').on('click', function(){
        var title = $("input[name=title]").val();
        var time = $('select[name=time]').val();
        var numberofquestion = $("input[name=numberofquestion]").val();
        //set title for preview
        if(title == ""){
            $('#preview_tit').html("Tiêu đề bài thi: <strong>Bạn chưa nhập tiêu đề bài thi</strong>");
        }else{
            $('#preview_tit').html("Tiêu đề bài thi: <strong>"+title+"</strong>");
        }
        //set time for preview
        if(time == ""){
            $('#preview_time').html("Thời gian làm bài: <strong>Bạn chưa chọn thời gian làm bài</strong>");
        }else{
            $('#preview_time').html("Thời gian làm bài: <strong>"+time+" phút </strong>");
        }
        //set the number of question
        if(numberofquestion == ""){
            $('#preview_number_question').html("Số câu hỏi: <strong>Bạn chưa nhập số lượng câu hỏi</strong>");
        }else if(numberofquestion >=1 && numberofquestion < 20){
            $('#preview_number_question').html("Số câu hỏi: <strong>"+numberofquestion+" câu (Vui lòng chọn ít nhất 20 câu hỏi cho 1 bài thi)</strong>");
        }else{
            $('#preview_number_question').html("Số câu hỏi: <strong>"+numberofquestion+" câu</strong>");
        }

        //set the question for preview
        var data = $('#example').DataTable().rows( {selected:  true} ).data();
        var newarray=[];
        var html ='';       
        for (var i=0; i < data.length ;i++){
            html += '<tr><td>'+(i+1)+'</td>';
            html += '<td>'+data[i][2]+'</td>';
            html += '<td>'+data[i][3]+'</td>';
            html += '<td>'+data[i][4]+'</td>';
            html += '<td>'+data[i][5]+'</td>';
            html += '<td>'+data[i][6]+'</td>';
            html += '<td>'+data[i][7]+'</td>';
            html += '<td>'+data[i][8]+'</td>';
            html += '</tr>'
        }
        $('#preview_question').html(html);
        // var k = newarray.join;
        // console.log(k);
    });

    //when change the number of question
    $('input[name=numberofquestion]').on('change', function(){
        $('#max_ques').html('Số câu hỏi tối đa: '+this.value);
    });

    $('#submit').on('click', function(){
        var title = $("input[name=title]").val();
        var time = $('select[name=time]').val();
        var numberofquestion = $("input[name=numberofquestion]").val();
        var dataTable = $('#example').DataTable().rows( {selected:  true} ).data();
        var data = []
        for(var i = 0; i < dataTable.length; i++) {
            data[i] = dataTable[i];
        }
        $.ajax({
            url:"{{ route('post_edit_test',['id'=>$oldTest->id]) }}",
            method:"POST",
            data: {
                'title':title,
                'time': time,
                'numberofquestion':numberofquestion,
                'data':data
            }
        })
        .done(function(data){
            var html;
            if(data.success){
                html = '<div class="alert alert-success alert-dismissible fade show" role="alert"> Sửa bài thi thành công <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button></div>';
            }else if(!data.success){
                html = '<div class="alert alert-danger alert-dismissible fade show" role="alert"> '+data.error+' <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button></div>';
            }
            $('.messages').html(html);
            
        })
        .fail(function(xhr,status,error){
            console.log(this.url);
            console.log(error);
            console.log(xhr.responseText);
        });
    
    });
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