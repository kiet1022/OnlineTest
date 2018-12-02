@extends('admin.layout.index')
@section('title')
{{"Danh sách loại câu hỏi"}}
@endsection
@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="admin/usermangement" class="text-info">Trang chủ</a></li>
    <li class="breadcrumb-item" aria-current="page">Quản lý câu hỏi</li>
    <li class="breadcrumb-item active" aria-current="page">Danh sách chủ đề câu hỏi</li>
</ol>
</nav>
<div style="margin-bottom: 15px;">
    <a href="{{route('get_add_question_type')}}" class="btn btn-success">
        Thêm chủ đề câu hỏi
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
            <th>Tên chủ đề</th>
            <th>Tên không dấu</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    @foreach($types as $type)
       <tr>
        <td>{{$type->id}}</td>
        <td>{{$type->name}}</td>
        <td>{{$type->title}}</td>
        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{route('delete_question_type',['id'=>$type->id]) }}"> Xóa</a></td>
        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('get_edit_question_type',['id'=>$type->id] )}}"> Sửa</a></td>
    </tr>
    @endforeach
</tbody>
<tfoot>
    <tr>
        <th>ID</th>
        <th>Tên chủ đề</th>
        <th>Tên không dấu</th>
        <th></th>
        <th></th>
    </tr>
</tfoot>
</table>
@endsection
