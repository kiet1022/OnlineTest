@extends('pages.layout.index')
@section('style')
<!-- Custom -->
<link href="pages/css/custom.css" rel="stylesheet">
<link rel="stylesheet" href="pages/css/test.css">
<!-- fonts -->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
<!-- CSS STYLE-->
<link rel="stylesheet" type="text/css" href="pages/css/style.css" media="screen" />
<!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
<link rel="stylesheet" type="text/css" href="pages/css/settings.css" media="screen" />
@endsection
@section('title')
{{"Danh sách bài thi"}}
@endsection
@section('content')
	<section style="padding-top: 20px; padding-bottom: 20px;" class="content">
		<div class="container" style="margin-top: 20px;">
			<div class="row">
				<div class="col-lg-12 col-md-12">
					{{-- breadcrumb --}}
					<ol class="breadcrumb" style="background-color: #ffffff; margin-top: 50px; border-left: 5px solid #29ca8e;">
						<li><a href="{{ route('get_home_page') }}" class="text-info">Trang chủ</a></li>
						<li>Danh sách các bài thi</li>
					</ol>
					{{-- breadcrumb --}}
				</div>

				<div class="col-lg-12 col-md-12">
					@foreach($tests as $p)
					<div class="col-lg-6 col-md-6">
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
								<h2><a href="{{ route('get_test_demo',['id'=>$p->id]) }}">{{ $p->title }} 
									@if($p->password != '0')
									(Bài thi có phí)
									@endif</a>
								</h2>
								<p>Thời gian làm bài: {{ $p->time }} phút</p>
								<p>Số lượng câu hỏi: {{$p->number_question}}</p>
								<p>Điểm tối đa: {{$p->mark}}</p>
							</div>
							<div class="clearfix"></div>
						</div>
						<div class="postinfo pull-left">
							<div class="comments">
								<div class="commentbg">
									{{$p->participant_number}}
									<div class="mark"></div>
								</div>
							</div>
							<div class="views"><i class="fa fa-eye"></i> {{$p->number_question}}</div>
							<div class="time"><i class="fa fa-clock-o"></i> {{date('d/m/Y',strtotime($p->created_at))}}</div>   
							<div class="owner"><i class="fa fa-user"></i> @if(Auth::check()){{Auth::user()->username}}@endif</div>                                 
						</div>
						<div class="clearfix"></div>
					</div>
					</div>
					@endforeach
					<!-- POST -->
				<div style="text-align: center;">
					{{$tests->links()}}
				</div>

			</div>
			</div>
		</div>
	</section>
@endsection