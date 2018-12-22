@extends('pages.layout.userindex')
@section('style')
    <link rel="stylesheet" href="assets/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/css/select.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/buttons.dataTables.min.css">
@endsection
@section('title')
{{"bài thi đã tạo"}}
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


    <div class="col-md-12" style="min-height: 437px;">
    	<table id="example" class="table table-striped table-bordered" style="width:100%">
    		<thead>
    			<tr>
    				<th>Tên bài thi</th>
    				<th>Số lượng câu hỏi</th>
    				<th>Thời gian bài thi</th>
    				<th>Điểm số</th>
    				<th>Ngày tạo đề</th>
    				<th>Trạng thái</th>
    				<th></th>
    			</tr>
    		</thead>
    		<tbody>
    			@foreach($tests as $t)
    			<tr>
    				<td>{{$t->title}}</td>
    				<td>{{ $t->number_question }} Câu</td>
    				<td>{{$t->time}}</td>
    				<td>{{$t->mark}}</td>
    				<td>{{date('d/m/Y',strtotime($t->created_at))}}</td>
					@if($t->status == 0)
						{!! '<td class="bg-success">Đã duyệt</td>' !!}
					@elseif($t->status == 1)
						{!! '<td class="bg-warning">Chưa duyệt</td>' !!}
					@endif
    				<td><a href="{{route('get_test_preview',['id'=>$t->id])}}" target="_blank" class="btn btn-success">Xem lại đề thi</a></td>
    			</tr>
    			@endforeach
    		</tbody>
    	</table>
    </div>
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