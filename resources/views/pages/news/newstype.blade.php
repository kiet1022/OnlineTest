@extends('pages.layout.index')
@section('title')
{{"Tin tức"}}
@endsection
@section('style')
<link rel="stylesheet" href="pages/css/homepagenews.css">
@endsection
@section('content')
<section id="news">
	<div class="section" style="padding-top: 0">
		<!-- container -->
		<div class="container">
			<ol class="breadcrumb">
				<li><a href="{{ route('get_home_page') }}" class="text-info">Trang chủ</a></li>
				<li><a href="{{ route('get_news_page') }}" class="text-info">Tin tức</a></li>
				<li class="active">{{$news[0]->newstype->name}}</li>
			</ol>
			<!-- row -->
			<div class="row">
				{{-- Post --}}
				<div class="col-md-8">
					<div class="row" style="display: flex; flex-wrap: wrap;">
						<!-- post -->
						@foreach($news as $new)
						<div class="col-md-6">
							<div class="post">
								<a class="post-img" href="{{ route('get_news_detail',['tenkhongdau'=>$new->newstype->title, 'id'=>$new->id]) }}"><img style="width: 360px; height: 197px;" src="{{ asset('images/tintuc/'.$new->image) }}" alt="Lỗi"></a>
								<div class="post-body">
									<div class="post-meta">
										<a class="post-category {{ changeCatColor($new->id_type) }}" href="{{ route('get_news_type',['id'=>$new->id_type]) }}">{{$new->newstype->name}}</a>
										<span class="post-date">Ngày đăng: {{date('d/m/Y',strtotime($new->created_at))}}</span>
									</div>
									<h3 class="post-title"><a href="{{ route('get_news_detail',['tenkhongdau'=>$new->newstype->title, 'id'=>$new->id]) }}">{{$new->title}}</a></h3>
								</div>
							</div>
						</div>
						@endforeach
						<!-- /post -->
					</div>
					<div class="col-md-6 col-md-offset-3 text-center">{{$news->links()}}</div>
				</div>

				{{-- Most Read, Featrured post, category --}}
				<div class="col-md-4">
					<!-- post widget -->
					<div class="aside-widget">
						<div class="section-title" style="margin-bottom: 0;padding-bottom: 0;">
							<h2>Đọc nhiều</h2>
						</div>
						@foreach($most_read as $mr)
						<div class="post post-widget">
							<a class="post-img" href="{{ route('get_news_detail',['tenkhongdau'=>$mr->newstype->title, 'id'=>$mr->id]) }}"><img style="width: 90px; height: 49px;" src="{{ asset('images/tintuc/'.$mr->image) }}" alt="Lỗi"></a>
							<div class="post-body">
								<h3 class="post-title"><a href="{{ route('get_news_detail',['tenkhongdau'=>$mr->newstype->title, 'id'=>$mr->id]) }}">{{$mr->title}}</a></h3>
							</div>
						</div>
						@endforeach
					</div>
					<!-- /post widget -->


					<!-- catagories -->
					<div class="aside-widget">
						<div class="section-title" style="margin-bottom: 0;padding-bottom: 0;">
							<h2>Danh mục tin tức</h2>
						</div>
						<div class="category-widget">
							<ul>
								@foreach($newtype as $nt)
								<li><a href="{{ route('get_news_type',['id'=>$nt->id]) }}" class="{{changeCatColor($nt->id)}}">{{$nt->name}}<span>{{count($nt->news)}}</span></a></li>
								@endforeach
							</ul>
						</div>
					</div>
					<!-- /catagories -->

{{-- 					<!-- tags -->
					<div class="aside-widget">
						<div class="tags-widget">
							<ul>
								<li><a href="#">Chrome</a></li>
								<li><a href="#">CSS</a></li>
								<li><a href="#">Tutorial</a></li>
								<li><a href="#">Backend</a></li>
								<li><a href="#">JQuery</a></li>
								<li><a href="#">Design</a></li>
								<li><a href="#">Development</a></li>
								<li><a href="#">JavaScript</a></li>
								<li><a href="#">Website</a></li>
							</ul>
						</div>
					</div>
					<!-- /tags --> --}}
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->
</section>
@endsection
