@extends('admin.layout.index')
@section('title')
{{"Cập nhật người dùng"}}
@endsection
@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="admin/usermangement" class="text-info">Trang chủ</a></li>
    <li class="breadcrumb-item" aria-current="page">Quản lý người dùng</li>
    <li class="breadcrumb-item" aria-current="page"><a href="admin/usermangement" class="text-info">Danh sách</a></li>
    <li class="breadcrumb-item" aria-current="page">Sửa người dùng</li>
     <li class="breadcrumb-item active" aria-current="page">{{$user->info->name}}</li>
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
<form action="{{ route('post_edit_user',['id'=>$user->id]) }}" method="post">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="ipusername">Username</label>
          <input type="text" class="form-control" id="ipusername" placeholder="Tên đăng nhập" value="{{$user->username}}" name="username">
      </div>
      <div class="form-group col-md-6">
          <label for="ipemail">Email</label>
          <input type="email" class="form-control" id="ipemail" placeholder="Email" value="{{$user->email}}" name="email" readonly="">
      </div>
  </div>
  <div class="form-row">
      <div class="form-group col">
          <label for="ipname">Họ tên</label>
          <input type="text" class="form-control" id="ipname" placeholder="Họ tên" value="{{$user->info->name}}" name="name">
      </div>
      <div class="form-group col">
          <label for="ipage">Ngày sinh</label>
          <input type="date" class="form-control" id="ipage" placeholder="Họ tên" value="{{$user->info->date_of_birth}}" name="date_of_birth">
      </div>
      <div class="form-group col">
          <label for="ipsex">Giới tính</label>
          <select name="sex" id="ipsex" class="form-control">
              <option value="1" @if($user->info->sex == 1) {{"selected"}} @endif>Nam</option>
              <option value="2" @if($user->info->sex == 2) {{"selected"}} @endif>Nữ</option>
              <option value="3" @if($user->info->sex == 3) {{"selected"}} @endif>Khác</option>
          </select>
      </div>
  </div>
    <div class="form-row">
      <div class="form-group col">
          <label for="ipaddress">Địa chỉ</label>
          <input type="text" class="form-control" id="ipaddress" placeholder="Địa chỉ" value="{{$user->info->address}}" name="address">
      </div>
      <div class="form-group col">
          <label for="ipphone">Số điện thoại</label>
          <input type="number" class="form-control" id="ipphone" placeholder="Số điện thoại" value="{{$user->info->phone_number}}" name="phone_number">
      </div>
      <div class="form-group col">
          <label for="iplevel">Phân quyền</label>
          <select name="level" id="iplevel" class="form-control">
              <option value="1" @if($user->level == 1) {{"selected"}} @endif>Quản trị viên</option>
              <option value="2" @if($user->level == 2) {{"selected"}} @endif>Giáo viên</option>
              <option value="3" @if($user->level == 3) {{"selected"}} @endif>Thành viên</option>
          </select>
      </div>
  </div>
<button type="submit" class="btn btn-primary">Lưu</button>
<button type="button" class="btn btn-warning" onclick="resetpass()">Reset mật khẩu</button>
</form>
<div class="alert alert-warning mt-3 text-center" role="alert">
    Sau khi mật khẩu sau khi reset là 123456
</div>
</div>
@endsection

