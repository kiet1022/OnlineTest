@extends('pages.layout.userindex')
@section('title')
{{"Trang cá nhân"}}
@endsection
@section('content')
<div class="col-md-9" style="background: white; padding-top: 30px;">
	<div class="col-md-10 col-md-offset-1" style="min-height: 437px;">
		<form class="form-horizontal" action="/action_page.php">
			<div class="form-group">
				<label class="control-label col-sm-2" for="name">Họ Tên:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="name" placeholder="Nhập họ tên" name="name" value="{{$userinfo->name}}">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="address">Địa chỉ:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="address" placeholder="Nhập địa chỉ" name="address" value="{{$userinfo->address}}">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="phone">Số điện thoại:</label>
				<div class="col-sm-4">
					<input type="number" class="form-control" id="phone" placeholder="Nhập số điện thoại" name="phone_number" value="{{$userinfo->phone_number}}">
				</div>
				<label class="control-label col-sm-2" for="email">Email:</label>
				<div class="col-sm-4">
					<input type="email" class="form-control" id="email" placeholder="Enter email" name="email" readonly="" value="{{ $user->email }}">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="birthday">Ngày sinh:</label>
				<div class="col-sm-4">
					<input type="date" class="form-control" id="birthday" placeholder="Nhập địa chỉ" name="birth_of_date" value="{{$userinfo->date_of_birth}}">
				</div>
				<label class="control-label col-sm-2" for="sex">Giới tính:</label>
				<div class="col-sm-4">
					<select name="sex" id="sex" class="form-control">
						{!! changeGender($userinfo->sex) !!}
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="avatar">Ảnh đại diện</label>
				<div class="col-sm-10">
					<img src="images/admin.jpg" alt="" style="border-radius: 50% !important; width: 20%;">
					<input type="file" style="margin-top: 10px;">
				</div>
			</div>
			<div class="form-group">  
				<div class="col-sm-offset-1 col-sm-10 text-center">
					<button type="submit" class="btn btn-success">Lưu</button>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection