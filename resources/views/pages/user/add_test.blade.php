@extends('pages.layout.userindex')
@section('style')
    <link rel="stylesheet" href="assets/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/css/select.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/buttons.dataTables.min.css">
@endsection
@section('title')
{{"Tạo bài thi"}}
@endsection
@section('breadcrumb')
	<div class="container">
		<ol class="breadcrumb" style="background-color: #ffffff; margin-bottom: 0px; border-left: 5px solid #29ca8e;">
			<li><a href="{{ route('get_home_page') }}" class="text-info">Trang chủ</a></li>
			<li>Thông tin cá nhân</li>
			<li class="active">{{$user->info->name}}</li>
		</ol>
	</div>
@endsection
@section('content')
<div class="col-md-9" style="background: white; padding-top: 30px;">
	<div class="col-md-12" style="min-height: 500px;">
		@if(count($errors)>0)
    <div class="alert alert-warning alert-dismissible show" role="alert">
        @foreach($errors->all() as $err)
        {{$err}}<br>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        @endforeach
    </div>
    @endif

    @if(session('success'))
    <div class="alert alert-success alert-dismissible show" role="alert">
        {{session('success')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger alert-dismissible show" role="alert">
        {{session('error')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

		<form action="{{ route('post_add_test_by_user') }}" method="POST" enctype="multipart/form-data">
			@csrf
			<div class="panel-group" id="accordion">
				<div class="panel panel-success">
					<div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#collapse1">
						<h4 class="panel-title">
							<a>Thông tin chung</a>
						</h4>
					</div>
					<div id="collapse1" class="panel-collapse collapse in">
						<div class="panel-body">
							<div class="form-group">
								<label for="title">Tên đề thi</label>
								<input type="text" class="form-control" placeholder="Nhập tên của đề thi" name="title" id="title" required="true">
							</div>
							<div class="form-group">
								<label for="time">Thời gian làm bài</label>
								<select name="time" id="time" class="form-control" required="true">
									<option value="20">20 phút</option>
									<option value="30">30 phút</option>
									<option value="60">60 phút</option>
								</select>
							</div>
							<div class="form-group">
								<label for="num_question">Số lượng câu hỏi</label>
								<input type="number" name="num_question" id="num_question" class="form-control" placeholder="Nhập số lượng câu hỏi" required="true">
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
								<input type="hidden" class="form-control" placeholder="Vui lòng nhập chủ đề của bài thi" name="topic_name" id="topic_name" required="true">
							</div>
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#collapse2">
						<h4 class="panel-title">
							<a>Thiết lập câu hỏi</a>
						</h4>
					</div>
					<div id="collapse2" class="panel-collapse collapse">
						<div class="panel-body" style="overflow-y: scroll; height: 700px;">
								<div id="question">
			{{-- 						<div class="panel panel-default">
										<div class="panel-body">
											<div class="col-md-12" style="border-bottom: 2px solid red; margin-bottom: 5px;">
												<div class="col-md-6"><h4>Câu 1:</h4></div>
												<div class="col-md-6" style="text-align: right;">
													<a style="cursor: pointer;"><i class="fa fa-minus"></i> Xóa câu hỏi</a>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<input type="hidden" value="1" class="number">
													<label for="title">Nội dung Câu hỏi: </label>
													<input type="text"  class="form-control" id="title" name="title" placeholder="Nhập nội dung câu hỏi">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group col-md-8" style="padding: 0;">
													<label for="a">Đáp án A: </label>
													<input type="text"  class="form-control col-md-6" id="a" name="title" placeholder="Nhập nội dung đáp án a">
												</div>
												<div class="form-group col-md-2" style="text-align: center;">
													<label for="check">Đáp án đúng: </label>
													<input type="radio" name="check" id="check">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group col-md-8" style="padding: 0;">
													<label for="b">Đáp án B: </label>
													<input type="text"  class="form-control col-md-6" id="b" name="title" placeholder="Nhập nội dung đáp án b">
												</div>
												<div class="form-group col-md-2" style="text-align: center;">
													<label for="check1">Đáp án đúng: </label>
													<input type="radio" name="check" id="check1">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group col-md-8" style="padding: 0;">
													<label for="c">Đáp án C: </label>
													<input type="text"  class="form-control col-md-6" id="c" name="title" placeholder="Nhập nội dung đáp án c">
												</div>
												<div class="form-group col-md-2" style="text-align: center;">
													<label for="check2">Đáp án đúng: </label>
													<input type="radio" name="check" id="check2">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group col-md-8" style="padding: 0;">
													<label for="d">Đáp án D: </label>
													<input type="text"  class="form-control col-md-6" id="d" name="title" placeholder="Nhập nội dung đáp án d">
												</div>
												<div class="form-group col-md-2" style="text-align: center;">
													<label for="check3">Đáp án đúng: </label>
													<input type="radio" name="check" id="check3">
												</div>
											</div>
										</div>
									</div> --}}
								</div>
						</div>
						<div>
							<button onclick="addaquestion()" type="button" class="btn btn-success" style="width: 100%"><i class="fa fa-plus"></i> Thêm Câu Hỏi</button>
						</div>
					</div>

				</div>
				<div class="panel panel-default">
					<div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#collapse3">
						<h4 class="panel-title">
							<a>Nhập câu hỏi bằng file excel</a>
						</h4>
					</div>
					<div id="collapse3" class="panel-collapse collapse">
						<div class="panel-body">
							<h4>Vui lòng tải mẫu excel và import theo đúng mẫu.</h4>
							
								<div class="form-group">
									<input class="form-control" type="file" name="file">
								</div>
								<a class="btn btn-warning text-white" href="{{ asset('template/Import_Question_Template.xlsx') }}">Tải mẫu Excel</a>
						</div>
					</div>
				</div>
			</div> 
			<button type="submit" class="btn btn-success btn-lg">Đồng ý</button>
		</form>
	</div>
</div>
@endsection
@section('script')
<!-- Popper.JS -->
<script src="assets/js/popper.min.js"></script>
<!-- Bootstrap JS -->
<script src="assets/js/bootstrap.min.js"></script>

{{-- Bootstrap DataTable --}}
<script src="assets/js/jquery.dataTables.min.js"></script>
<script src="assets/js/dataTables.bootstrap4.min.js"></script>
<script src="assets/js/dataTables.select.min.js"></script>
<script src="assets/js/dataTables.buttons.min.js"></script>
	<script>
		$(document).ready(function(){
			$('#example').DataTable();
			
		});
		var i = 0;
		function addaquestion(){
			i++;
			var html = '';
				html+='<div class="panel panel-default" id="'+i+'">';
				html+='<div class="panel-body">';		
				html+='<div class="col-md-12" style="border-bottom: 2px solid red; margin-bottom: 5px;">';			
				html+='<div class="col-md-6"><h4>Câu '+i+':</h4></div>';				
				html+='<div class="col-md-6" style="text-align: right;">';				
				html+='<a onclick="removeaquestion()" style="cursor: pointer;"><i class="fa fa-minus"></i> Xóa câu hỏi</a></div></div>';				
				html+='<div class="col-md-12"><div class="form-group"><input type="hidden" value="'+i+'" class="number" name="countquest"><label for="title_'+i+'">Nội dung Câu hỏi: </label>';	
				html+='<input type="text"  class="form-control" id="title_'+i+'" name="title_['+i+']" placeholder="Nhập nội dung câu hỏi"></div></div>';			
				html+='<div class="col-md-12">';			
				html+='<div class="form-group col-md-8" style="padding: 0;">';				
				html+='<label for="a_'+i+'">Đáp án A: </label>';					
				html+='<input type="text"  class="form-control col-md-6" id="a_'+i+'" name="a_['+i+']" placeholder="Nhập nội dung đáp án a"></div>';					
				html+='<div class="form-group col-md-2" style="text-align: center;"><label for="check_'+i+'">Đáp án đúng: </label>';				
				html+='<input type="radio" name="check_['+i+']" id="check_'+i+'" value="a_['+i+']"></div></div>';			
				html+='<div class="col-md-12"><div class="form-group col-md-8" style="padding: 0;">';			
				html+='<label for="b_'+i+'">Đáp án B: </label>';				
				html+='<input type="text"  class="form-control col-md-6" id="b_'+i+'" name="b_['+i+']" placeholder="Nhập nội dung đáp án b"></div>';
				html+='<div class="form-group col-md-2" style="text-align: center;">';
				html+='<label for="check_'+i+'">Đáp án đúng: </label>';
				html+='<input type="radio" name="check_['+i+']" id="check_'+i+'" value="b_['+i+']">';
				html+='</div>';
				html+='</div>';
				html+='<div class="col-md-12">';
				html+='<div class="form-group col-md-8" style="padding: 0;">';
				html+='<label for="c_'+i+'">Đáp án C: </label>';
				html+='<input type="text"  class="form-control col-md-6" id="c_'+i+'" name="c_['+i+']" placeholder="Nhập nội dung đáp án c"></div>';
				html+='<div class="form-group col-md-2" style="text-align: center;">';	
				html+='<label for="check_'+i+'">Đáp án đúng: </label>';	
				html+='<input type="radio" name="check_['+i+']" id="check_'+i+'" value="c_['+i+']"></div></div>';	
				html+='<div class="col-md-12">';	
				html+='<div class="form-group col-md-8" style="padding: 0;">';	
				html+='<label for="d_'+i+'">Đáp án D: </label>';	
				html+='<input type="text"  class="form-control col-md-6" id="d_'+i+'" name="d_['+i+']" placeholder="Nhập nội dung đáp án d"></div>';
				html+='<div class="form-group col-md-2" style="text-align: center;">';
				html+='<label for="check_'+i+'">Đáp án đúng: </label>';
				html+='<input type="radio" name="check_['+i+']" id="check_'+i+'" value="d_['+i+']">';
				html+='</div></div></div></div>';									
			$('#question').append(html);
		}
		function removeaquestion(){
			$("div").remove('#'+i);
			i--;
		}

		$('#topic').on('change', function(){
			if($(this).val() == 0){
				$('#topic_name').attr('type','text');
			}else{
				$('#topic_name').attr('type','hidden');
			}
		});
	</script>
@endsection