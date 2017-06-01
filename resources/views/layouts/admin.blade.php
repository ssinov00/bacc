<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>NOA</title>
    <meta name="description" content="">
    <meta name="csrf-token" content="{{csrf_token()}}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}">
    <!-- Fonts  -->
    <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/simple-line-icons.css')}}">
    <!-- CSS Animate -->
    <link rel="stylesheet" href="{{asset('assets/css/animate.css')}}">
    <!-- Custom styles for this theme -->
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
    <!-- Feature detection -->
    <script src="{{asset('assets/js/vendor/modernizr-2.6.2.min.js')}}"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="{{asset('assets/js/vendor/html5shiv.js')}}"></script>
    <script src="{{asset('assets/js/vendor/respond.min.js')}}"></script>
    <![endif]-->
    <link rel="stylesheet" href="{{asset('assets/plugins/sweetalert/sweetalert.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/messenger/css/messenger.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/messenger/css/messenger-theme-flat.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/icheck/css/all.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/fileupload/css/jquery.fileupload.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/datatables/css/dataTables.bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-wysihtml5/css/bootstrap-wysihtml5.css')}}">
    @yield('styles')
</head>

<body>
    <section id="main-wrapper" class="theme-default">
        <header id="header">
            <!--logo start-->
            <div class="brand">
                <a href="{{route('public.index')}}" class="logo">
                    <span>N</span>OA
                </a>
            </div>
            <!--logo end-->
            <ul class="nav navbar-nav navbar-left">
                <li class="toggle-navigation toggle-left">
                    <button class="sidebar-toggle" id="toggle-left">
                        <i class="fa fa-bars"></i>
                    </button>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">              
                <li class="dropdown profile hidden-xs">
                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="meta">
                            <span class="text">{{Auth::user()->name}}</span>
                            <span class="caret"></span>
                        </span>
                    </a>
                    <ul class="dropdown-menu animated fadeInUp" role="menu"> 
                        <li>
                            <a href="{{url('logout')}}">
                                <span class="icon"><i class="fa fa-sign-out"></i>
                                </span>Odjava
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </header>
        <!--sidebar left start-->
        <aside class="sidebar sidebar-left">
        <div style="clear: both;"></div>
            <nav>
                <h5 class="sidebar-header">Main Navigation</h5>
                <ul class="nav nav-pills nav-stacked">
                    <li>
                        <a href="{{route('admin.index')}}">
                            <i class="fa fa-fw fa-tachometer"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin.post.index')}}">
                            <i class="fa fa-fw fa-newspaper-o"></i> Blog
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin.animal.index')}}">
                            <i class="fa fa-fw fa-paw"></i> Životinje
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>
        <!--sidebar left end-->
        <!--main content start-->
        <section class="main-content-wrapper">
            <div class="pageheader">
                <h1>@yield('header')</h1>
            </div>
            <section id="main-content">
                @yield('content')
            </section>
        </section>
        <!--main content end-->
    </section>
    <!--Global JS-->
    <script src="{{asset('assets/js/vendor/jquery-1.11.1.min.js')}}"></script>
    <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/plugins/navgoco/jquery.navgoco.min.js')}}"></script>
    <script src="{{asset('assets/plugins/pace/pace.min.js')}}"></script>
    <script src="{{asset('assets/plugins/sweetalert/sweetalert.min.js')}}"></script>
    <script src="{{asset('assets/plugins/messenger/js/messenger.min.js')}}"></script>
    <script src="{{asset('assets/plugins/messenger/js/messenger-theme-flat.js')}}"></script>
    <script src="{{asset('assets/plugins/icheck/js/icheck.min.js')}}"></script>
    <script src="{{asset('assets/plugins/jquery/jquery-ui.js')}}"></script>
    <script src="{{asset('assets/plugins/jquery/jquery.ui.touch-punch.min.js')}}"></script>
    <script src="{{asset('assets/plugins/fileupload/js/jquery.iframe-transport.js')}}"></script>
    <script src="{{asset('assets/plugins/fileupload/js/jquery.fileupload.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/plugins/moment/moment.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables/js/datetime-moment.js')}}"></script>
    <script src="{{asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('assets/plugins/bootstrap-wysihtml5/js/wysihtml5-0.3.0.js')}}"></script>
    <script src="{{asset('assets/plugins/bootstrap-wysihtml5/js/bootstrap3-wysihtml5.js')}}"></script>
    <script src="{{asset('assets/js/src/app.js')}}"></script>    
    @yield('scripts')
</body>

</html>
