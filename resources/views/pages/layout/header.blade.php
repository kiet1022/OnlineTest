     <section class="navbar custom-navbar navbar-fixed-top" role="navigation">
          <div class="container">
               <div class="navbar-header">
                    <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                    </button>

                    <!-- lOGO TEXT HERE -->
                    <a href="{{route('get_home_page')}}" class="navbar-brand">LOGO</a>
               </div>

               <!-- MENU LINKS -->
               <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-nav-first">
                         <li><a href="#home" style="padding: 0;"><a href="{{route('get_home_page')}}" class="smoothScroll">Trang chủ</a></a></li>
                         <li><a href="#news" style="padding: 0;"><a href="{{route('get_news_page')}}" class="smoothScroll">Tin tức</a></a></li>
                         <li><a href="#forum" style="padding: 0;"><a href="{{route('get_forum_page')}}" class="smoothScroll">Diễn Đàn</a></a></li>
                         <li><a href="#about" class="smoothScroll">Về chúng tôi</a></li>
                         <li><a href="#contact" class="smoothScroll">Liên hệ</a></li>
                    </ul>
                    @guest
                         <ul class="nav navbar-nav navbar-right">
                              <li><a href="#register" style="padding: 0;"><a href="{{route('get_register_page')}}">Đăng ký</a></a></li>
                              <li><a href="#login" style="padding: 0;"><a href="{{route('get_login_page')}}" class="smoothScroll">Đăng nhập</a></a></li>
                         </ul>
                    @endguest
                    @auth
                         <ul class="nav navbar-nav navbar-right">
                              <li><a href="#register" style="padding: 0;"><a href="{{route('get_user_info_page',['id'=>Auth::user()->id])}}">{{Auth::user()->info->name}}</a></a></li>
                              <li><a href="#login" style="padding: 0;"><a href="{{route('logout')}}" class="smoothScroll">Đăng Xuất</a></a></li>
                         </ul>
                    @endauth
               </div>
          </div>
     </section>