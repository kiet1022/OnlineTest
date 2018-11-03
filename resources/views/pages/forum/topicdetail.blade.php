@extends('pages.layout.index')
@section('style')
<!-- Custom -->
<link href="pages/css/custom.css" rel="stylesheet">
<link rel="stylesheet" href="pages/css/new.css">
<!-- fonts -->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
<!-- CSS STYLE-->
<link rel="stylesheet" type="text/css" href="pages/css/style.css" media="screen" />
<!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
<link rel="stylesheet" type="text/css" href="pages/css/settings.css" media="screen" />
@endsection
@section('title')
{{"Diễn đàn"}}
@endsection
@section('content')
<section style="padding-top: 20px; padding-bottom: 20px;" class="content">
{{--     <div class="container">
        <div class="row">
            <div class="col-lg-8 breadcrumbf">
                <a href="#">Borderlands 2</a> <span class="diviver">&gt;</span> <a href="#">General Discussion</a> <span class="diviver">&gt;</span> <a href="#">Topic Details</a>
            </div>
        </div>
    </div> --}}


    <div class="container">
        {{-- breadcrumb --}}
            <ol class="breadcrumb" style="background-color: #ffffff; margin-top: 70px; border-left: 5px solid #29ca8e;">
                <li><a href="{{ route('get_home_page') }}" class="text-info">Trang chủ</a></li>
                <li><a href="{{ route('get_forum_page') }}" class="text-info">Diễn đàn</a></li>
                <li>{{$post->subject->name}}</li>
                <li class="active">{{ $post->title }}</li>
            </ol>
            {{-- breadcrumb --}}
        <div class="row">
            <div class="col-lg-8 col-md-8">
 
                <!-- POST -->
                <div class="post beforepagination">
                    <div class="topwrap">
                        <div class="userinfo pull-left">
                            <div class="avatar">
                                <img src="pages/images/forum/avatar.jpg" alt="" />
                                <div class="status green">&nbsp;</div>
                            </div>

                            <div class="icons">
                                <img src="pages/images/forum/icon1.jpg" alt="" /><img src="pages/images/forum/icon4.jpg" alt="" /><img src="pages/images/forum/icon5.jpg" alt="" /><img src="pages/images/forum/icon6.jpg" alt="" />
                            </div>
                        </div>
                        <div class="posttext pull-left">
                            <h2>{{ $post->title}}</h2>
                            <p>{!! $post->content !!}</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>                              
                    <div class="postinfobot">

                        <div class="likeblock pull-left">
                            <a onclick="like({{$post->id}})" class="up"><i class="fa fa-thumbs-o-up"></i>{{$post->like_count}}</a>
                            <a onclick="dislike({{$post->id}})" class="down"><i class="fa fa-thumbs-o-down"></i>{{$post->dislike_count}}</a>
                        </div>

                        {{-- <div class="prev pull-left">                                        
                            <a href="#"><i class="fa fa-reply"></i></a>
                        </div> --}}

                        <div class="posted pull-left"><i class="fa fa-clock-o"></i>Ngày đăng: {{date('d/m/Y',strtotime($post->created_at))}}</div>

                        {{-- <div class="next pull-right">                                        
                            <a href="#"><i class="fa fa-share"></i></a>

                            <a href="#"><i class="fa fa-flag"></i></a>
                        </div> --}}

                        <div class="clearfix"></div>
                    </div>
                </div><!-- POST -->
                <div style="text-align: center;">
                    <ul class="pagination">
                  {{$comments->links()}}
              </ul>
                </div>
                
                <!-- POST -->
                @foreach($comments as $cm)
                <div class="post">
                    <div class="topwrap">
                        <div class="userinfo pull-left">
                            <div class="avatar">
                                <img src="pages/images/forum/avatar2.jpg" alt="" />
                                <div class="status red">&nbsp;</div>
                            </div>

                            <div class="icons">
                                {{-- <img src="pages/images/forum/icon3.jpg" alt="" /><img src="pages/images/forum/icon4.jpg" alt="" /><img src="pages/images/forum/icon5.jpg" alt="" /><img src="images/icon6.jpg" alt="" /> --}}
                            </div>
                        </div>
                        <div class="posttext pull-left">
                            <p>{!! $cm->content !!}</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>                              
                    <div class="postinfobot">

                        {{-- <div class="likeblock pull-left">
                            <a href="#" class="up"><i class="fa fa-thumbs-o-up"></i>10</a>
                            <a href="#" class="down"><i class="fa fa-thumbs-o-down"></i>1</a>
                        </div> --}}

                        {{-- <div class="prev pull-left">                                        
                            <a href="#"><i class="fa fa-reply"></i></a>
                        </div> --}}

                        <div class="posted pull-left">
                            <i class="fa fa-user"></i>Người đăng: {{$cm->user->username}}    
                            <i class="fa fa-clock-o"></i>Ngày đăng: {{date('d/m/Y',strtotime($cm->created_at))}}
                        </div>
                    

                        {{-- <div class="next pull-right">                                        
                            <a href="#"><i class="fa fa-share"></i></a>

                            <a href="#"><i class="fa fa-flag">Người Đăng: {{$cm->user->name}}</i></a>
                        </div> --}}

                        <div class="clearfix"></div>
                    </div>
                </div>
                @endforeach
                <!-- POST -->


              <!-- POST -->
              <div class="post">
                <form action="{{ route('comment',['id_post'=>$post->id]) }}" class="form" method="post">
                    @csrf
                    <div class="topwrap">
                        <div class="userinfo pull-left">
                            <div class="avatar">
                                <img src="pages/images/forum/avatar4.jpg" alt="" />
                                <div class="status red">&nbsp;</div>
                            </div>

                            <div class="icons">
                                {{-- <img src="pages/images/forum/icon3.jpg" alt="" /><img src="pages/images/forum/icon4.jpg" alt="" /><img src="pages/images/forum/icon5.jpg" alt="" /><img src="images/icon6.jpg" alt="" /> --}}
                            </div>
                        </div>
                        <div class="posttext pull-left">
                            <div class="textwraper">
                                <div class="postreply">Đăng một bình luận</div>
                                <textarea name="content" id="reply" placeholder="Nhập bình luận của bạn tại đây"></textarea>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>                              
                    <div class="postinfobot">

                        {{-- div class="notechbox pull-left">
                            <input type="checkbox" name="note" id="note" class="form-control" />
                        </div> --}}

                       {{--  <div class="pull-left">
                            <label for="note"> Email me when some one post a reply</label>
                        </div> --}}

                        <div class="pull-right postreply">
                            {{-- <div class="pull-left smile"><a href="#"><i class="fa fa-smile-o"></i></a></div> --}}
                            <div class="pull-left"><button type="submit" class="btn btn-primary">Đăng</button></div>
                            <div class="clearfix"></div>
                        </div>


                        <div class="clearfix"></div>
                    </div>
                </form>
            </div><!-- POST -->


        </div>
        <div class="col-lg-4 col-md-4">
                <div class="sidebarblock">
                    <h3>Đăng bài</h3>
                    <div class="divline"></div>
                    <div class="blocktxt" style="text-align: center;">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Đăng bài thảo luận</button>
                    </div>
                </div>
            <!-- catagories -->
                <div class="sidebarblock">
                    <h3>Chủ đề</h3>
                    <div class="divline"></div>
                    <div class="blocktxt">
                        <ul class="cats">
                            @foreach($subjects as $sb)
                            <li><a href="#">{{ $sb->name }} <span class="badge pull-right">{{ count($sb->post) }}</span></a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!-- /catagories -->
                <div class="container">
                    <!-- Modal -->
                    <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header" style="background: #29ca8e;border-top-left-radius: 5px;border-top-right-radius: 5px;">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Đăng bài</h4>
                                </div>
                                <div class="modal-body post">
                                    <!-- POST -->
                                    
                                    <form action="{{ route('post_to_forum') }}" class="form newtopic" method="post">
                                        @csrf
                                        <div class="topwrap">
                                            <div class="userinfo pull-left">
                                                <div class="avatar">
                                                    <img src="pages/images/forum/avatar4.jpg" alt="" />
                                                    {{-- <div class="status red">&nbsp;</div> --}}
                                                </div>

                                                <div class="icons">
                                                    <img src="pages/images/forum/icon3.jpg" alt="" /><img src="pages/images/forum/icon4.jpg" alt="" /><img src="pages/images/forum/icon5.jpg" alt="" /><img src="pages/images/forum/icon6.jpg" alt="" />
                                                </div>
                                            </div>
                                            <div class="posttext pull-left">

                                                <div>
                                                    <input type="text" placeholder="Nhập tiêu đề" class="form-control" name="title"/>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <select name="id_subject" id="category"  class="form-control" >
                                                            <option value="" disabled selected>Chọn chủ đề</option>
                                                            @foreach($subjects as $sb)
                                                            <option value="{{ $sb->id }}">{{ $sb->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div>
                                                    <textarea name="content" id="desc" placeholder="Nhập nội dung"  class="form-control" ></textarea>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>                              
                                        <div class="postinfobot">
                                            <div class="pull-right postreply">
                                                <div class="pull-left"><button type="submit" class="btn btn-primary">Đăng</button></div>
                                                <div class="clearfix"></div>
                                            </div>

                                            <div class="clearfix"></div>
                                        </div>
                                    </form>
                                    <!-- POST -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <!-- -->
            <div class="sidebarblock">
                <h3>My Active Threads</h3>
                <div class="divline"></div>
                <div class="blocktxt">
                    <a href="#">This Dock Turns Your iPhone Into a Bedside Lamp</a>
                </div>
                <div class="divline"></div>
                <div class="blocktxt">
                    <a href="#">Who Wins in the Battle for Power on the Internet?</a>
                </div>
                <div class="divline"></div>
                <div class="blocktxt">
                    <a href="#">Sony QX10: A Funky, Overpriced Lens Camera for Your Smartphone</a>
                </div>
                <div class="divline"></div>
                <div class="blocktxt">
                    <a href="#">FedEx Simplifies Shipping for Small Businesses</a>
                </div>
                <div class="divline"></div>
                <div class="blocktxt">
                    <a href="#">Loud and Brave: Saudi Women Set to Protest Driving Ban</a>
                </div>
            </div>
        </div>
    </div>
</div>  
</section>

@endsection
@section('script')
<!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
<script type="text/javascript" src="pages/js/jquery.themepunch.plugins.min.js"></script>
<script type="text/javascript" src="pages/js/jquery.themepunch.revolution.min.js"></script>
<script type="text/javascript">

    var revapi;
    
    jQuery(document).ready(function() {
        "use strict";
        revapi = jQuery('.tp-banner').revolution(
        {
            delay: 15000,
            startwidth: 1200,
            startheight: 278,
            hideThumbs: 10,
            fullWidth: "on"
        });
        
    });	//ready
    
    function like(id){
        $.ajax({
            url:"{{ route('like') }}",
            method:"GET",
            data: {'id':id},
            success: function(data){
                $('.up').html(data);
            }
        });
    }

    function dislike(id){
        $.ajax({
            url:"{{ route('dislike') }}",
            method:"GET",
            data: {'id':id},
            success: function(data){
                $('.down').html(data);
            }
        });
    }
</script>
@endsection