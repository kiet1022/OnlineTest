@extends('admin.layout.index')
@section('title')
{{"Sửa loại tin"}}
@endsection
@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="admin/usermangement" class="text-info">Trang chủ</a></li>
    <li class="breadcrumb-item" aria-current="page">Quản lý tin tức</li>
    <li class="breadcrumb-item" aria-current="page"><a href="{{route('get_news_type_list')}}" class="text-info">Danh sách loại tin</a></li>
    <li class="breadcrumb-item " aria-current="page">Sửa loại tin</li>
    <li class="breadcrumb-item active" aria-current="page">{{$newtype->name}}</li>
</ol>
</nav>
<div class="col-sm-8 offset-sm-2">
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
    <form action="{{route('post_edit_news_type',['id'=>$newtype->id])}}" method="post">
        @csrf
        <div class="form-group">
            <label for="ipnewstype">Tên loại tin</label>
            <input type="text" class="form-control" id="ipnewstype" placeholder="Nhập tên loại tin" name='typename' value="{{$newtype->name}}">
        </div>
        <button type="submit" class="btn btn-primary">Đồng ý</button>
    </form>
</div>
@endsection
