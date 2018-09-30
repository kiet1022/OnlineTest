@extends('admin.layout.index')
@section('title')
{{"Danh sách tin tức"}}
@endsection
@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="admin/usermangement" class="text-info">Trang chủ</a></li>
    <li class="breadcrumb-item" aria-current="page">Quản lý tin tức</li>
    <li class="breadcrumb-item active" aria-current="page">Danh sách tin tức</li>
</ol>
</nav>
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
            <th>Tiêu đề</th>
            <th>Tóm tắt</th>
            <th>Thể loại</th>
            <th>Số lượt xem</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($news as $n)
        <tr align="center">
            <td>{{$n->id}}</td>
            <td>{{$n->title}}</td>
            <td>{{$n->summary}}</td>
            <td>{{$n->newstype->name}}</td>
            <td>20</td>
            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{route('delete_news',['id'=>$n->id])}}"> Xóa</a></td>
            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('get_edit_news',['id'=>$n->id])}}"> Sửa</a></td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th>ID</th>
            <th>Tiêu đề</th>
            <th>Tóm tắt</th>
            <th>Thể loại</th>
            <th>Số lượt xem</th>
            <th></th>
            <th></th>
        </tr>
    </tfoot>
</table>
@endsection
