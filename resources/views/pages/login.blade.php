@extends('pages.layout.index')
@section('style')
<link rel="stylesheet" href="pages/css/login.css">
@endsection
@section('title')
{{"Đăng nhập"}}
@endsection
@section('content')
<section id="login">
     <div class="w3layoutscontaineragileits">
          <h2>ĐĂNG NHẬP</h2>

          @if(session('error'))
            <cite><h4>{{session('error')}}</h4></cite>
          @endif
          <form action="{{ route('post_login') }}" method="post">
               @csrf
               <input type="email" name="email" placeholder="EMAIL" required="">
               <input type="password" name="password" placeholder="PASSWORD" required="">
{{--                <ul class="agileinfotickwthree">
                    <li>
                         <input type="checkbox" id="brand1" value="">
                         <label for="brand1"><span></span>Nhớ mật khẩu</label>
                         <a href="#">Quên mật khẩu</a>
                    </li>
               </ul> --}}
               <div class="aitssendbuttonw3ls">
                    <input type="submit" value="LOGIN">
                    {{-- <p> Bạn chưa có tài khoản? <span>→</span> <a class="w3_play_icon1" href="{{route('get_register_page')}}">Nhấn vào đây</a></p> --}}
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