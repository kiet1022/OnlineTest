@extends('admin.layout.index')
@section('title')
{{"Thêm người dùng"}}
@endsection
@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="admin/usermangement" class="text-info">Trang chủ</a></li>
    <li class="breadcrumb-item" aria-current="page">Quản lý người dùng</li>
    <li class="breadcrumb-item active" aria-current="page">Thêm người dùng</li>
</ol>
</nav>
<div class="col-sm-8 offset-sm-2">
  @if(count($errors)>0)
  <div class="alert alert-warning">
    @foreach($errors->all() as $err)
    {{$err}}<br>
    @endforeach
</div>
@endif

@if(session('success'))
<div class="alert alert-success">
    {{session('success')}}
</div>
@endif

@if(session('error'))
<div class="alert alert-danger">
    {{session('error')}}
</div>
@endif
<form action="{{ route('post_add_user') }}" method="post">
    @csrf
    <div class="form-group">
      <label for="ipusname">Username</label>
      <input type="text" class="form-control" id="ipusname" aria-describedby="emailHelp" placeholder="Nhập Username" name="username">
      <small id="emailHelp" class="form-text text-muted">Username phải có ít nhất 6 kí tự</small>
  </div>
  <div class="form-group">
      <label for="exampleFormControlSelect1">Phân quyền</label>
      <select class="form-control" id="exampleFormControlSelect1" name="level">
        <option value="1">Quản trị viên</option>
        <option value="2">Giáo viên</option>
        <option value="0">Thành viên</option>
    </select>
</div>
<button type="submit" class="btn btn-primary">Đồng ý</button>
</form>
<div class="alert alert-info mt-3 text-center" role="alert">
    Sau khi tạo thành công tài khoản mật khẩu mặt định của tài khoản là 123456
</div>
</div>
@endsection
