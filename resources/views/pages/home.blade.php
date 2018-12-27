@extends('pages.layout.index')
@section('title')
	{{"Trang chủ"}}
@endsection
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
<link rel="stylesheet" href="pages/css/homepagenews.css">
@endsection
@section('extends')
	@include('pages.layout.slide')
@endsection
@section('content')
<section id="about" style="padding: 0 !important">
	<div class="container" style="margin-top: 15px;">
		<div class="row">
			<div class="col-md-6 col-md-offset-3 text-center">
				<h3 style="color: red;">CÁC BÀI THI NỔI BẬT</h3>
				<img src="images/ngoisao_cam.png" alt="">
			</div>

			<div class="col-lg-12 col-md-12">
					@foreach($tests as $p)
					<div class="col-lg-6 col-md-6">
					<!-- POST -->
					<div class="post" style="background-color: #f9f9f9;">
						<div class="wrap-ut pull-left">
							<div class="userinfo pull-left">
								<div class="avatar">
									<img src="images/test.png" alt="" width="100%" />
									<div class="status green">&nbsp;</div>
								</div>

								<div class="icons">
									{{-- <img src="pages/images/forum/icon1.jpg" alt="" /><img src="pages/images/forum/icon4.jpg" alt="" /> --}}

								</div>
							</div>
							<div class="posttext pull-left">
								<h2><a style="color: #29ca8e;" href="{{ route('get_test_demo',['id'=>$p->id]) }}">{{ $p->title }} 
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
{{-- 				<div style="text-align: center;">
					{{$tests->links()}}
				</div> --}}

			</div>
{{-- 			<div class="col-md-6 col-sm-12">
				<div class="about-info">
					<h2>Nhanh tay đăng kí trở thành thành viên của trung tâm để tham gia vào ngân hàng đề thi với hàng triệu đề thi THPT Quốc Gia chọn lọc nhé!</h2>

					<figure>
						<span><i class="fa fa-users"></i></span>
						<figcaption>
							<h3>Professional Trainers</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint ipsa voluptatibus.</p>
						</figcaption>
					</figure>

					<figure>
						<span><i class="fa fa-certificate"></i></span>
						<figcaption>
							<h3>International Certifications</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint ipsa voluptatibus.</p>
						</figcaption>
					</figure>

					<figure>
						<span><i class="fa fa-bar-chart-o"></i></span>
						<figcaption>
							<h3>Free for 3 months</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint ipsa voluptatibus.</p>
						</figcaption>
					</figure>
				</div>
			</div> --}}
		</div>

		<div class="row">
			<div class="col-md-6 col-md-offset-3 text-center">
				<h3 style="color: red;">TIN TỨC & SỰ KIỆN</h3>
				<img src="images/ngoisao_cam.png" alt="">
			</div>
		</div>
		<div class="row" style="display: flex; flex-wrap: wrap;">
				<!-- post -->
				@foreach($new_news as $n)
				<div class="col-md-4">
					<div class="post position-relative">
						<a class="post-img " href="{{ route('get_news_detail',['tenkhongdau'=>$n->newstype->title, 'id'=>$n->id]) }}">
							<div class="position-relative" style="width: 100%; height: 0px; padding-top: calc(2/3 * 100%); overflow: hidden; position: relative;">
								<img class="position-absolute img-responsive" src="{{ asset('images/tintuc/'.$n->image) }}" alt="Lỗi" style=" bottom: 0; left: 0; right: 0; position: absolute; width: 500px; height: 250px;">
							</div>
						</a>
						<div class="post-body">
							<div class="post-meta">
								<a class="post-category {{ changeCatColor($n->id_type) }}" href="category.html">{{$n->newstype->name}}</a>
								<span class="post-date">Ngày đăng: {{date('d/m/Y',strtotime($n->created_at))}}</span>
							</div>
							<h3 class="post-title"><a href="{{route('get_news_detail',['tenkhongdau'=>$n->newstype->title, 'id'=>$n->id])}}">{{$n->title}}</a></h3>
						</div>
					</div>
				</div>
				@endforeach
				<!-- /post -->
				<div class="clearfix visible-md visible-lg"></div>
			</div>
	</div>
{{-- 	<div class="container-fluid">
		<div id="myCarousel" class="carousel slide" data-ride="carousel" style="width: 100%;height: 50%">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">

      <div class="item active">
        <img src="https://www.w3schools.com/bootstrap/la.jpg" alt="Los Angeles" style="width:100%;">
        <div class="carousel-caption">
          <h3>Los Angeles</h3>
          <p>LA is always so much fun!</p>
        </div>
      </div>

      <div class="item">
        <img src="https://www.w3schools.com/bootstrap/chicago.jpg" alt="Chicago" style="width:100%;">
        <div class="carousel-caption">
          <h3>Chicago</h3>
          <p>Thank you, Chicago!</p>
        </div>
      </div>
    
      <div class="item">
        <img src="https://www.w3schools.com/bootstrap/ny.jpg" alt="New York" style="width:100%;">
        <div class="carousel-caption">
          <h3>New York</h3>
          <p>We love the Big Apple!</p>
        </div>
      </div>
  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
	</div> --}}
</section>

{{-- <!-- CONTACT -->
<section id="contact">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-sm-12">
				<div class="contact-image">
					<img src="pages/images/home/contact.jpg" class="img-responsive" alt="Smiling Two Girls">
				</div>
			</div>

			<div class="col-md-6 col-sm-12">
				<form id="contact-form" role="form" action="" method="post">
					<div class="section-title">
						<h2>Liên hệ với chúng tôi <small>we love conversations. let us talk!</small></h2>
					</div>

					<div class="col-md-12 col-sm-12">
						<input type="text" class="form-control" placeholder="Enter full name" name="name" required="">

						<input type="email" class="form-control" placeholder="Enter email address" name="email" required="">

						<textarea class="form-control" rows="6" placeholder="Tell us about your message" name="message" required=""></textarea>
					</div>

					<div class="col-md-4 col-sm-12">
						<input type="submit" class="form-control" name="send message" value="Send Message">
					</div>

				</form>
			</div>
		</div>
	</div>
</section>    --}}    	
@endsection