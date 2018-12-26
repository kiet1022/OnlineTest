<nav class="navbar navbar-expand-lg navbar-dark rounded">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="navbar-btn">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                   <!--  <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button> -->

                    <!-- <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Page</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Page</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Page</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Page</a>
                            </li>
                        </ul>
                    </div> -->

                    <div>
                        <a class="ml-auto" data-toggle="dropdown" style="background: #29ca8e;">
                            <img src="images/admin.jpg" alt="" width="40" height="40" class="rounded-circle">
                        </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <button class="dropdown-item" type="button"><a href="{{route('get_edit_user',['id'=>Auth::user()->id])}}">{{Auth::user()->info->name}}</a> </button>
                        <button class="dropdown-item" type="button"><a href="{{route('logout')}}" class="smoothScroll">Đăng Xuất</a></button>
                    </div>
                </div>
            </div>
        </nav>