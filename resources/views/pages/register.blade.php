@extends('pages.layout.index')
@section('style')
<link rel="stylesheet" href="pages/css/login.css">
@endsection
@section('title')
{{"Đăng kí thành viên"}}
@endsection
@section('content')
<section id="register">
    <div class="w3layoutscontaineragileits">

        <h2>ĐĂNG KÝ THÀNH VIÊN</h2>

        @foreach($errors->all() as $err)
        @if(count($errors)>0)
        <cite><h4>{{$err}}</h4></cite>
        @endif
        @endforeach
        @if(session('success'))
            <cite><h4>{{session('success')}}</h4></cite>
        @endif

        @if(session('error'))
            <cite><h4>{{session('error')}}</h4></cite>
        @endif
        <form action="{{ route('post_register') }}" method="post">
            @csrf
            <input type="text" Name="name" placeholder="Nhập họ tên" required="">
            <input type="email" Name="email" placeholder="Địa chỉ email" required="">
            <input type="password" Name="password" placeholder="Mật khẩu" required="">
            <input type="password" Name="repassword" placeholder="Nhập lại mật khẩu" required="">
            <div class="aitssendbuttonw3ls">
                <input type="submit" value="Đăng ký">
                <div class="clear"></div>
            </div>
        </form>
    </div>
</section>
@endsection
@section('script')
<script src="pages/js/jquery-3.2.1.slim.min.js"></script>
<script src="pages/js/materialize.min.js"></script>
@endsection