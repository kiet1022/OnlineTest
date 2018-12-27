@extends('admin.layout.index')
@section('title')
{{"Danh sách bài thi"}}
@endsection
@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('get_home_page') }}" class="text-info">Trang chủ</a></li>
    <li class="breadcrumb-item" aria-current="page">Quản lý bài thi</li>
    <li class="breadcrumb-item active" aria-current="page">Danh sách bài thi</li>
</ol>
</nav>
<div style="margin-bottom: 15px;">
    <a href="{{route('get_add_new_test_from_bank')}}" class="btn btn-success btn-sm">
        Thêm bài thi từ ngân hàng câu hỏi
    </a>
    <a href="{{route('get_add_new_test')}}" class="btn btn-success btn-sm">
        Thêm bài thi
    </a>
</div>
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
<table id="testlist" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tiêu đề bài thi</th>
            <th>Số lượng câu hỏi</th>
            <th>Điểm số</th>
            <th>Thời gian làm bài</th>
            <th>Số lượt làm bài</th>
            <th>Người tạo</th>
            <th>Ngày tạo</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
       @foreach($tests as $test)
       <tr>
        <td>{{$test->id}}</td>
        <td><a href="{{route('preview_test_admin',['id'=>$test->id])}}" target="_blank">{{$test->title}}</a></td>
        <td>{{$test->number_question}}</td>
        <td>{{$test->mark}}</td>
        <td>{{$test->time}} phút</td>
        <td>{{$test->participant_number}}</td>
        <td>{{$test->user->username}}</td>
        <td>{{date('d/m/Y',strtotime($test->created_at))}}</td>
        <td><a href="{{ route('get_test_result',['id'=>$test->id]) }}" target="_blank" class="btn btn-success btn-sm">Chi tiết kết quả</a></td>
        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{route('delete_test',['id'=>$test->id])}}"> Xóa</a></td>
        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('get_edit_test',['id'=>$test->id])}}"> Sửa</a></td>
    </tr>
    @endforeach
</tbody>
</table>
@endsection
@section('documentready')
    $('#testlist').DataTable();
@endsection
{{-- @section('script')
<script>
    $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
    });
</script>
@endsection --}}