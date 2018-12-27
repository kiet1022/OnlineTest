@extends('admin.layout.index')
@section('title')
{{"Thêm tin tức"}}
@endsection
@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="admin/usermangement" class="text-info">Trang chủ</a></li>
    <li class="breadcrumb-item" aria-current="page">Quản lý tin tức</li>
    <li class="breadcrumb-item active" aria-current="page">Thêm tin tức</li>
</ol>
</nav>
<div class="col-sm-8 offset-sm-2">
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
<form action="{{route('post_add_news')}}" method="post" enctype="multipart/form-data">
  @csrf
  <div class="form-group">
    <label for="exampleFormControlInput1">Tiêu đề</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nhập tiêu đề của bài viết" name="title">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Chọn Loại tin</label>
    <select class="form-control" id="exampleFormControlSelect1" name='id_type'>
      @foreach($newstype as $nt)
      <option value="{{$nt->id}}">{{$nt->name}}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Tóm tắt</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="summary"></textarea>
  </div>
    <div class="form-group editor">
    <label for="exampleFormControlTextarea2">Nội dung</label>
    <textarea class="form-control editor" id="exampleFormControlTextarea2" rows="3" name="content"></textarea>
  </div>
  <div class="form-group">
    <label for="exampleFormControlFile1">Hình đính kèm</label>
    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image">
  </div>
  <button type="submit" class="btn btn-primary">Đồng ý</button>
</form>
</div>
@endsection
@section('script')
    <script>
     //CKEDITOR.replace( 'exampleFormControlTextarea2' );
     CKEDITOR.replace( 'exampleFormControlTextarea1' );
     CKEDITOR.addCss('figure[class*=easyimage-gradient]::before { content: ""; position: absolute; top: 0; bottom: 0; left: 0; right: 0; }' +
      'figure[class*=easyimage-gradient] figcaption { position: relative; z-index: 2; }' +
      '.easyimage-gradient-1::before { background-image: linear-gradient( 135deg, rgba( 115, 110, 254, 0 ) 0%, rgba( 66, 174, 234, .72 ) 100% ); }' +
      '.easyimage-gradient-2::before { background-image: linear-gradient( 135deg, rgba( 115, 110, 254, 0 ) 0%, rgba( 228, 66, 234, .72 ) 100% ); }');

    CKEDITOR.replace('exampleFormControlTextarea2', {
      extraPlugins: 'easyimage',
      removePlugins: 'image',
      removeDialogTabs: 'link:advanced',
      toolbar: [{
          name: 'document',
          items: ['Undo', 'Redo']
        },
        {
          name: 'styles',
          items: ['Format']
        },
        {
          name: 'basicstyles',
          items: ['Bold', 'Italic', 'Strike', '-', 'RemoveFormat']
        },
        {
          name: 'paragraph',
          items: ['NumberedList', 'BulletedList']
        },
        {
          name: 'links',
          items: ['Link', 'Unlink']
        },
        {
          name: 'insert',
          items: ['EasyImageUpload']
        }
      ],
      height: 500,
      cloudServices_uploadUrl: 'https://33333.cke-cs.com/easyimage/upload/',
      // Note: this is a token endpoint to be used for CKEditor 4 samples only. Images uploaded using this token may be deleted automatically at any moment.
      // To create your own token URL please visit https://ckeditor.com/ckeditor-cloud-services/.
      cloudServices_tokenUrl: 'https://33333.cke-cs.com/token/dev/ijrDsqFix838Gh3wGO3F77FSW94BwcLXprJ4APSp3XQ26xsUHTi0jcb1hoBt',
      easyimage_styles: {
        gradient1: {
          group: 'easyimage-gradients',
          attributes: {
            'class': 'easyimage-gradient-1'
          },
          label: 'Blue Gradient',
          icon: 'https://ckeditor.com/docs/ckeditor4/4.11.1/examples/assets/easyimage/icons/gradient1.png',
          iconHiDpi: 'https://ckeditor.com/docs/ckeditor4/4.11.1/examples/assets/easyimage/icons/hidpi/gradient1.png'
        },
        gradient2: {
          group: 'easyimage-gradients',
          attributes: {
            'class': 'easyimage-gradient-2'
          },
          label: 'Pink Gradient',
          icon: 'https://ckeditor.com/docs/ckeditor4/4.11.1/examples/assets/easyimage/icons/gradient2.png',
          iconHiDpi: 'https://ckeditor.com/docs/ckeditor4/4.11.1/examples/assets/easyimage/icons/hidpi/gradient2.png'
        },
        noGradient: {
          group: 'easyimage-gradients',
          attributes: {
            'class': 'easyimage-no-gradient'
          },
          label: 'No Gradient',
          icon: 'https://ckeditor.com/docs/ckeditor4/4.11.1/examples/assets/easyimage/icons/nogradient.png',
          iconHiDpi: 'https://ckeditor.com/docs/ckeditor4/4.11.1/examples/assets/easyimage/icons/hidpi/nogradient.png'
        }
      },
      easyimage_toolbar: [
        'EasyImageFull',
        'EasyImageSide',
        'EasyImageGradient1',
        'EasyImageGradient2',
        'EasyImageNoGradient',
        'EasyImageAlt'
      ]
    });
</script>
@endsection