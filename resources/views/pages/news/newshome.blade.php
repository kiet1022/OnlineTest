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
			<!-- row -->
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
			<!-- /row -->

			<!-- row -->
			<div class="row">
				{{-- Post --}}
				<div class="col-md-8">
					<div class="row" style="display: flex; flex-wrap: wrap;">
						<!-- post -->
						<div class="col-md-12">
							<div class="post post-thumb">
								<a class="post-img" href="{{ route('get_news_detail',['tenkhongdau'=>$hot_news->newstype->title, 'id'=>$hot_news->id]) }}"><img style="width: 750px; height: 410px;" src="{{ asset('images/tintuc/'.$hot_news->image) }}" alt="Lỗi"></a>
								<div class="post-body">
									<div class="post-meta">
										<a class="post-category {{ changeCatColor($hot_news->id_type) }}" href="category.html">{{$hot_news->newstype->name}}</a>
										<span class="post-date">Ngày đăng: {{date('d/m/Y',strtotime($hot_news->created_at))}}</span>
									</div>
									<h3 class="post-title"><a href="{{ route('get_news_detail',['tenkhongdau'=>$hot_news->newstype->title, 'id'=>$hot_news->id]) }}">{{$hot_news->title}}</a></h3>
								</div>
							</div>
						</div>
						<!-- /post -->

						<!-- post -->
						@foreach($news as $new)
						<div class="col-md-6">
							<div class="post">
								<a class="post-img" href="{{ route('get_news_detail',['tenkhongdau'=>$new->newstype->title, 'id'=>$new->id]) }}"><img style="width: 360px; height: 197px;" src="{{ asset('images/tintuc/'.$new->image) }}" alt="Lỗi"></a>
								<div class="post-body">
									<div class="post-meta">
										<a class="post-category {{ changeCatColor($new->id_type) }}" href="category.html">{{$new->newstype->name}}</a>
										<span class="post-date">Ngày đăng: {{date('d/m/Y',strtotime($new->created_at))}}</span>
									</div>
									<h3 class="post-title"><a href="{{ route('get_news_detail',['tenkhongdau'=>$new->newstype->title, 'id'=>$new->id]) }}">{{$new->title}}</a></h3>
								</div>
							</div>
						</div>
						@endforeach
						<!-- /post -->
					</div>
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
								<li><a href="#" class="{{changeCatColor($nt->id)}}">{{$nt->name}}<span>{{count($nt->news)}}</span></a></li>
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
