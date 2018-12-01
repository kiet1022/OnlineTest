@extends('admin.layout.index')
@section('title')
{{"Danh sách câu hỏi"}}
@endsection
@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="admin/usermangement" class="text-info">Trang chủ</a></li>
    <li class="breadcrumb-item" aria-current="page">Quản lý bài thi</li>
    <li class="breadcrumb-item active" aria-current="page">Danh sách bài thi</li>
</ol>
</nav>
<div style="margin-bottom: 15px;">
    <a href="{{route('get_add_new_test')}}" class="btn btn-success">
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
<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th></th>
            <th>ID</th>
            <th>Tiêu đề bài thi</th>
            <th>Số lượng câu hỏi</th>
            <th>Điểm số</th>
            <th>Thời gian làm bài</th>
            <th>Người tạo</th>
            <th>Ngày tạo</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
       @foreach($tests as $test)
       <tr>
        <td></td>
        <td>{{$test->id}}</td>
        <td>{{$test->title}}</td>
        <td>{{$test->number_question}}</td>
        <td>{{$test->mark}}</td>
        <td>{{$test->time}} phút</td>
        <td>{{$test->user->username}}</td>
        <td>{{$test->created_at}}</td>
        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{route('delete_question',['id'=>$test->id])}}"> Xóa</a></td>
        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('get_edit_question',['id'=>$test->id])}}"> Sửa</a></td>
    </tr>
    @endforeach
</tbody>
</table>
@endsection
@section('documentready')
    $('#example').DataTable( {
        columnDefs: [ {
            orderable: false,
            className: 'select-checkbox',
            targets:   0
        } ],
        select: {
            style:    'multi',
            //selector: 'td:first-child'
        },
        order: [[ 1, 'asc' ]]
    } );
@endsection
{{-- @section('script')
<script>
    $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
    });
</script>
@endsection --}}