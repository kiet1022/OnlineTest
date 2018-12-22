@extends('pages.layout.userindex')
@section('style')
    <link rel="stylesheet" href="assets/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/css/select.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/buttons.dataTables.min.css">
@endsection
@section('title')
{{"Kết quả bài thi"}}
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
	<div class="col-md-12" style="min-height: 437px;">
		<table id="example" class="table table-striped table-bordered" style="width:100%">
		    <thead>
		        <tr>
		            <th>Tên bài thi</th>
		            <th>Ngày làm bài</th>
		            <th>Thời gian bài thi</th>
		            <th>Thời gian làm bài</th>
		            <th>Số câu đúng</th>
		            <th>Điểm số</th>
					<th></th>
		        </tr>
		    </thead>
		    <tbody>
		       @foreach($result as $rt)
		       <tr>
		        <td>{{$rt->test->title}}</td>
		        <td>{{date('d/m/Y',strtotime($rt->created_at))}}</td>
		        <td>{{$rt->test->time}}</td>
		        <td>{{$rt->joined_time}}</td>
		        <td>{{$rt->corect_number}}/{{$rt->test->number_question}}</td>
		        <td>{{$rt->mark}}/{{$rt->test->mark}}</td>
				<td><a href="{{route('get_test_detail',['id'=>$rt->id_test])}}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Làm lại bài thi</a></td>
		    </tr>
		    @endforeach
			</tbody>
		</table>
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
	</script>
@endsection