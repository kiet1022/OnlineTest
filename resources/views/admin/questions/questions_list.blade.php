@extends('admin.layout.index')
@section('title')
{{"Danh sách câu hỏi"}}
@endsection
@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="admin/usermangement" class="text-info">Trang chủ</a></li>
    <li class="breadcrumb-item" aria-current="page">Quản lý câu hỏi</li>
    <li class="breadcrumb-item active" aria-current="page">Danh sách câu hỏi</li>
</ol>
</nav>
<div style="margin-bottom: 15px;">
    <a href="{{route('get_add_new_question')}}" class="btn btn-success">
        Thêm câu hỏi
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
            <th>ID</th>
            <th>Nội dung câu hỏi</th>
            <th>Đáp án A</th>
            <th>Đáp án B</th>
            <th>Đáp án C</th>
            <th>Đáp án D</th>
            {{-- <th>Chủ đề</th> --}}
            <th>Người tạo</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
       @foreach($questions as $qt)
       <tr>
        <td>{{$qt->id}}</td>
        <td>{!! $qt->content !!}</td>
        <td {!!changeCorrectAnswerColor($qt->a,$qt->correct_answer)!!}>{{$qt->a}}</td>
        <td {!!changeCorrectAnswerColor($qt->b,$qt->correct_answer)!!}>{{$qt->b}}</td>
        <td {!!changeCorrectAnswerColor($qt->c,$qt->correct_answer)!!}>{{$qt->c}}</td>
        <td {!!changeCorrectAnswerColor($qt->d,$qt->correct_answer)!!}>{{$qt->d}}</td>
        {{-- <td>{{$qt->type->name}}</td> --}}
        <td>{{$qt->user->username}}</td>
        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{route('delete_question',['id'=>$qt->id])}}"> Xóa</a></td>
        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('get_edit_question',['id'=>$qt->id])}}"> Sửa</a></td>
    </tr>
    @endforeach
</tbody>
</table>
@endsection
{{-- @section('documentready')
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
@endsection --}}
{{-- @section('script')
<script>
    $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
    });
</script>
@endsection --}}