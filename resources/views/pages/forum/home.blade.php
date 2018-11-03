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


	<div class="container" style="margin-top: 20px;">
		<div class="row">
			<div class="col-lg-12 col-md-12">
				{{-- breadcrumb --}}
			<ol class="breadcrumb" style="background-color: #ffffff; margin-top: 50px; border-left: 5px solid #29ca8e;">
				<li><a href="{{ route('get_home_page') }}" class="text-info">Trang chủ</a></li>
				<li>Diễn đàn</li>
			</ol>
			{{-- breadcrumb --}}
			</div>
			
			<div class="col-lg-8 col-md-8">
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
				@foreach($posts as $p)
				<!-- POST -->
				<div class="post">
					<div class="wrap-ut pull-left">
						<div class="userinfo pull-left">
							<div class="avatar">
								<img src="pages/images/forum/avatar.jpg" alt="" />
								<div class="status green">&nbsp;</div>
							</div>

							<div class="icons">
								{{-- <img src="pages/images/forum/icon1.jpg" alt="" /><img src="pages/images/forum/icon4.jpg" alt="" /> --}}
								
							</div>
						</div>
						<div class="posttext pull-left">
							<h2><a href="{{ route('get_topic_detail',['id'=>$p->id]) }}">{{ $p->title }}</a></h2>
							<p>{!! $p->content !!}</p>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="postinfo pull-left">
						<div class="comments">
							<div class="commentbg">
								{{count($p->comments)}}
								<div class="mark"></div>
							</div>
						</div>
						<div class="views"><i class="fa fa-eye"></i> {{$p->subject->name}}</div>
						<div class="time"><i class="fa fa-clock-o"></i> {{date('d/m/Y',strtotime($p->created_at))}}</div>   
						<div class="owner"><i class="fa fa-user"></i> @if(Auth::check()){{Auth::user()->username}}@endif</div>                                 
					</div>
					<div class="clearfix"></div>
				</div>
				@endforeach
				<!-- POST -->
				<div style="text-align: center;">
					{{$posts->links()}}
				</div>

			</div>
			<div class="col-lg-4 col-md-4">
				<!-- -->
				<div class="sidebarblock">
					<h3>Đăng bài</h3>
					<div class="divline"></div>
					<div class="blocktxt" style="text-align: center;">
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Đăng bài thảo luận</button>
					</div>
				</div>
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

        </script>
        @endsection