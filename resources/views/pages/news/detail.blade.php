@extends('pages.layout.index')
@section('title')
{{$detail->title}}
@endsection
@section('style')
<link rel="stylesheet" href="pages/css/new.css">
@endsection
@section('content')

<!-- section -->
     <!-- Page Header -->
     <div id="post-header" class="page-header">
          <div class="background-img" style="background-image: url('{{ asset('images/tintuc/'.$detail->image) }}');"></div>
          <div class="container">
               <div class="row">
                    <div class="col-md-10">
                         <div class="post-meta">
                              <a class="post-category {{changeCatColor($detail->id_type)}}" href="category.html">{{$detail->newstype->name}}</a>
                              <span class="post-date">Ngày đăng: {{date('d/m/Y',strtotime($detail->created_at))}}</span>
                         </div>
                         <h1>{{$detail->title}}</h1>
                    </div>
               </div>
          </div>
     </div>
     <!-- /Page Header -->
     <!-- container -->
     <div class="container">
          <!-- row -->
          <div class="row">
               <!-- Post content -->
               <div class="col-md-8">
                    <div class="section-row sticky-container">
                         <div class="main-post">
                              {!! $detail->content !!}
                         </div>
                         <div class="post-shares sticky-shares">
                              <a href="#" class="share-facebook"><i class="fa fa-facebook"></i></a>
                              <a href="#" class="share-twitter"><i class="fa fa-twitter"></i></a>
                              <a href="#" class="share-google-plus"><i class="fa fa-google-plus"></i></a>
                              <a href="#" class="share-pinterest"><i class="fa fa-pinterest"></i></a>
                              <a href="#" class="share-linkedin"><i class="fa fa-linkedin"></i></a>
                              <a href="#"><i class="fa fa-envelope"></i></a>
                         </div>
                    </div>                         
               </div>
               <!-- /Post content -->

               <!-- aside -->
               <div class="col-md-4">
                    <!-- ad -->
                    <div class="aside-widget text-center">
                         <a href="#" style="display: inline-block;margin: auto;">
                              <img class="img-responsive" src="./img/ad-1.jpg" alt="">
                         </a>
                    </div>
                    <!-- /ad -->

                    <!-- post widget -->
                    <div class="aside-widget">
                         <div class="section-title" style="margin-bottom: 0;padding-bottom: 0;">
                              <h2>Bài viết cùng chủ đề</h2>
                         </div>
                         @foreach($relate_news as $rl)
                         <div class="post post-thumb">
                              <a class="post-img" href="{{route('get_news_detail',['tenkhongdau'=>$rl->newstype->title, 'id'=>$rl->id])}}"><img src="{{ asset('images/tintuc/'.$rl->image) }}" alt="Lỗi" style="width: 360px; height: 197px;"></a>
                              <div class="post-body">
                                   <div class="post-meta">
                                        <a class="post-category {{changeCatColor($rl->id_type)}}" href="{{ route('get_news_type',['id'=>$rl->id_type]) }}">{{$rl->newstype->name}}</a>
                                        <span class="post-date">Ngày đăng: {{date('d/m/Y',strtotime($detail->created_at))}}</span>
                                   </div>
                                   <h3 class="post-title"><a href="{{route('get_news_detail',['tenkhongdau'=>$rl->newstype->title, 'id'=>$rl->id])}}">{{$rl->title}}</a></h3>
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
               </div>
               <!-- /aside -->
          </div>
          <!-- /row -->
     </div>
     <!-- /container -->
</div>
<!-- /section -->
@endsection
