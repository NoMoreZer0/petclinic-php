<!doctype html>
<html lang="en" style="height: auto;"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{config('app.env')!= 'production' ? 'Dev' : ''}} {{__('Admin panel')}}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css" integrity="sha512-ELV+xyi8IhEApPS/pSj66+Jiw+sOT1Mqkzlh8ExXihe4zfqbWkxPRi8wptXIO9g73FSlhmquFlUOuMSoXz5IRw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="/admin-assets/plugins/jquery/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
    <script src="/admin-assets/dist/js/adminlte.min.js"></script>
    <script src="/admin-assets/plugins/bootstrap/js/bootstrap5.min.js"></script>
    {{--    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>--}}
    @yield('head')
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/admin-assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/admin-assets/dist/css/adminlte.min.css">

    <link rel="stylesheet" href="/admin-assets/form.css">
    <!-- Site icon-->
    <link rel="icon" href="/admin-assets/site_icon.svg" type="image/x-icon"/>
</head>
{{--<body class="sidebar-mini sidebar-closed sidebar-collapse" style="height: auto;">--}}
<body class="sidebar-mini" style="height: auto;">
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{route('admin.home')}}" class="nav-link">{{__('admin')}}</a>
            </li>
        </ul>

    </nav>
    <!-- /.navbar -->
    @include('includes.sidebar')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="min-height: 2171.31px;">

        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">@yield('title')</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6 d-flex justify-content-end">
                        @yield('top_right_content')
                    </div><!-- /.col -->
                </div><!-- /.row -->
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                        <h4><i class="icon fa fa-check"></i>{{session('success')}}</h4>
                    </div>
                @endif
                @if (session('errors'))
                    <div class="alert alert-danger" role="alert">
                        <h4><i class="icon fa fa-times"></i>{{session('errors')->getBags()['default']->first()}}</h4>
                    </div>
                @endif
            </div><!-- /.container-fluid -->
        </div>
        <!-- Main content -->
        <div class="content">
            @yield('content')
        </div>
    </div>
    <!-- /.content-wrapper -->

</div>
<!-- ./wrapper -->

<!-- Bootstrap 5 -->
{{--<script src="/js/bootstrap.min.js"></script>--}}
<!-- Bootstrap 4 -->
{{--<script src="/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>--}}
<!-- bs-custom-file-input -->
<script src="/admin-assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
{{--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>--}}
<script src="/admin-assets/admin.js"></script>
<!-- Page specific script -->
<script>
    $(function () {
        bsCustomFileInput.init();
    });
</script>

@yield('scripts_bottom')

</body></html>
