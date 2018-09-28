<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <base href="{{asset('')}}">
    <title>@yield('title')</title>
    {{-- semantic UI --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.semanticui.min.css">
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/style5.css">

    <!-- Font Awesome JS -->
{{--     <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script> --}}

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>

<div class="wrapper">
        <!-- Sidebar Holder -->
        @include('admin.layout.sidebar')

        <!-- Page Content Holder -->
        <div id="content">

            @include('admin.layout.header')
        @yield('content')
    </div>
</div>

<!-- jQuery CDN - Slim version (=without AJAX) -->
<script src="assets/js/jquery-3.3.1.slim.min.js"></script>
<!-- Popper.JS -->
<script src="assets/js/popper.min.js"></script>
<!-- Bootstrap JS -->
<script src="assets/js/bootstrap.min.js"></script>
{{-- Bootstrap DataTable --}}
<script src="assets/js/jquery.dataTables.min.js"></script>
<script src="assets/js/dataTables.bootstrap4.min.js"></script>
{{-- semantic --}}
{{-- <script src="assets/js/dataTables.semanticui.min.js"></script> --}}
<script src="assets/js/semantic.min.js"></script>
<script type="text/javascript" language="javascript" src="assets/js/ckeditor/ckeditor.js" ></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
            $(this).toggleClass('active');
        });
        $('#example').DataTable();
        @yield('documentready')
    });
</script>
@yield('script')
</body>

</html>