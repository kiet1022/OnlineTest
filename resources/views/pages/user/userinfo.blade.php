@extends('pages.layout.userindex')
@section('title')
{{"Trang cá nhân"}}
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
	<div class="col-md-10 col-md-offset-1" style="min-height: 437px;">
		<form class="form-horizontal" action="{{route('post_edit_userinfo',['id'=>$user->id, 'idinfo'=>$user->info->id])}}" method="post">
			@csrf
			<div class="form-group">
				<label class="control-label col-sm-2" for="name">Họ Tên:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="name" placeholder="Nhập họ tên" name="name" value="{{$user->info->name}}">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="address">Địa chỉ:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="address" placeholder="Nhập địa chỉ" name="address" value="{{$user->info->address}}">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="phone">Số điện thoại:</label>
				<div class="col-sm-4">
					<input type="number" class="form-control" id="phone" placeholder="Nhập số điện thoại" name="phone_number" value="{{$user->info->phone_number}}">
				</div>
				<label class="control-label col-sm-2" for="email">Email:</label>
				<div class="col-sm-4">
					<input type="email" class="form-control" id="email" placeholder="Enter email" name="email" readonly="" value="{{ $user->email }}">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="birthday">Ngày sinh:</label>
				<div class="col-sm-4">
					<input type="date" class="form-control" id="birthday" placeholder="Nhập địa chỉ" name="birth_of_date" value="{{$user->info->date_of_birth}}">
				</div>
				<label class="control-label col-sm-2" for="sex">Giới tính:</label>
				<div class="col-sm-4">
					<select name="sex" id="sex" class="form-control">
						{!! changeGender($user->info->sex) !!}
					</select>
				</div>
			</div>
{{-- 			<div class="form-group">
				<label class="control-label col-sm-2" for="avatar">Ảnh đại diện</label>
				<div class="col-sm-10">
					<img src="images/admin.jpg" alt="" style="border-radius: 50% !important; width: 20%;">
					<input type="file" style="margin-top: 10px;">
				</div>
			</div> --}}
			<div class="form-group">  
				<div class="col-sm-offset-1 col-sm-10 text-center">
					<button type="submit" class="btn btn-success" style="width: 150px;">Lưu</button>
					<button type="button" class="btn btn-warning" style="width: 150px;" data-toggle="collapse" data-target="#demo">Đổi mật khẩu</button>
				</div>
			</div>
		</form>
			<div id="demo" class="collapse">
				<form action="{{route('changePass',['id'=>$user->id])}}" method="POST" class="form-horizontal">
					@csrf
					<div class="form-group">
					<label class="control-label col-sm-2" for="newPass">Mật khẩu mới</label>
					<div class="col-sm-10">
						<input type="password" class="form-control" id="newPass" name="newpass" placeholder="Vui lòng nhập mật khẩu mới">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="oldPass">mật khẩu cũ:</label>
					<div class="col-sm-10">
						<input type="password" class="form-control" id="oldPass" name="oldpass" placeholder="Vui lòng nhập mật khẩu cũ">
					</div>
				</div>
				<div class="form-group">  
					<div class="col-sm-offset-1 col-sm-10 text-center">
						<button type="submit" class="btn btn-success" style="width: 150px;">Lưu</button>
					</div>
				</div>
				</form>
			</div>
	</div>
</div>
@endsection