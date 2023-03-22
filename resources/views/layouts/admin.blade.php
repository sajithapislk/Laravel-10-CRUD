<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>@yield('title')</title>

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500"
        rel="stylesheet" />
    <link href="https://cdn.materialdesignicons.com/3.0.39/css/materialdesignicons.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">

    <link href="{{ asset('admin_assets/plugins/toaster/toastr.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin_assets/plugins/nprogress/nprogress.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin_assets/plugins/flag-icons/css/flag-icon.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin_assets/plugins/jvectormap/jquery-jvectormap-2.0.3.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin_assets/plugins/ladda/ladda.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin_assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
    {{-- <link href="{{ asset('admin_assets/plugins/daterangepicker/daterangepicker.css') }}" rel="stylesheet" /> --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <link id="sleek-css" rel="stylesheet" href="{{ asset('admin_assets/css/sleek.css') }}" />
    {{-- <link href="{{ asset('admin_assets/css/apis.css') }}" rel="stylesheet" /> --}}

    <link href="{{ asset('admin_assets/img/favicon.png') }}" rel="shortcut icon" />

    <script src="{{ asset('admin_assets/plugins/nprogress/nprogress.js') }}"></script>
    @yield('css')

</head>

<body class="sidebar-fixed sidebar-dark header-light header-fixed" id="body">
    @php
        $admin = Auth::guard('admin')->user();
    @endphp

    <script>
        NProgress.configure({
            showSpinner: false
        });
        NProgress.start();
    </script>

    <div class="mobile-sticky-body-overlay"></div>

    <div class="wrapper">

        <aside class="left-sidebar bg-sidebar">
            <div id="sidebar" class="sidebar sidebar-with-footer">
                <div class="app-brand" style="background-color: #20d35f">
                    <a style="padding-left: 0.50rem">
                        <span class="brand-name">Admin Dashboard</span>
                    </a>
                </div>
                <div class="sidebar-scrollbar">

                    <ul class="nav sidebar-inner" id="sidebar-menu">

                        <li class="{{ request()->is('admin/home') ? 'active' : '' }}">
                            <a class="sidenav-item-link" href="{{ url('admin/home') }}">
                                <i class="mdi mdi-view-dashboard-outline"></i>
                                <span class="nav-text">Dashboard</span>
                            </a>
                        </li>
                    </ul>

                </div>

                <hr class="separator" />

            </div>
        </aside>

        <div class="page-wrapper">
            <header class="main-header " id="header">
                <nav class="navbar navbar-static-top navbar-expand-lg">
                    <button id="sidebar-toggler" class="sidebar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                    </button>
                    <div class="search-form d-none d-lg-inline-block">
                        <div class="input-group">
                            <button type="button" name="search" id="search-btn" class="btn btn-flat">
                                <i class="mdi mdi-magnify"></i>
                            </button>
                            <input type="text" name="query" id="search-input" class="form-control"
                                placeholder="'button', 'chart' etc." autofocus autocomplete="off" />
                        </div>
                        <div id="search-results-container">
                            <ul id="search-results"></ul>
                        </div>
                    </div>

                    <div class="navbar-right ">
                        <ul class="nav navbar-nav">
                            <li class="dropdown notifications-menu">
                                <button class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="mdi mdi-bell-outline"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    {{-- <li class="dropdown-header">You have 5 notifications</li>
                                    <li>
                                        <a href="#">
                                            <i class="mdi mdi-account-plus"></i> New user registered
                                            <span class=" font-size-12 d-inline-block float-right"><i
                                                    class="mdi mdi-clock-outline"></i> 10 AM</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="mdi mdi-account-remove"></i> User deleted
                                            <span class=" font-size-12 d-inline-block float-right"><i
                                                    class="mdi mdi-clock-outline"></i> 07 AM</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="mdi mdi-chart-areaspline"></i> Sales report is ready
                                            <span class=" font-size-12 d-inline-block float-right"><i
                                                    class="mdi mdi-clock-outline"></i> 12 PM</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="mdi mdi-account-supervisor"></i> New client
                                            <span class=" font-size-12 d-inline-block float-right"><i
                                                    class="mdi mdi-clock-outline"></i> 10 AM</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="mdi mdi-server-network-off"></i> Server overloaded
                                            <span class=" font-size-12 d-inline-block float-right"><i
                                                    class="mdi mdi-clock-outline"></i> 05 AM</span>
                                        </a>
                                    </li>
                                    <li class="dropdown-footer">
                                        <a class="text-center" href="#"> View All </a>
                                    </li> --}}
                                </ul>
                            </li>
                            <li class="dropdown user-menu">
                                <button href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                    <img src="{{ url('admin/dp/' . $admin->admin_id . '/' . $admin->admin_photo) }}"
                                        class="user-image" alt="User Image" />
                                    <span class="d-none d-lg-inline-block">{{ $admin->admin_name }}</span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li class="dropdown-header">
                                        <img src="{{ url('admin/dp/' . $admin->admin_id . '/' . $admin->admin_photo) }}"
                                            class="img-circle" alt="User Image" />
                                        <div class="d-inline-block">
                                            {{ $admin->admin_name }} <small
                                                class="pt-1">{{ $admin->email }}</small>
                                        </div>
                                    </li>

                                    {{-- <li>
                                        <a href="profile.html">
                                            <i class="mdi mdi-account"></i> My Profile
                                        </a>
                                    </li>
                                    <li>
                                        <a href="email-inbox.html">
                                            <i class="mdi mdi-email"></i> Message
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"> <i class="mdi mdi-diamond-stone"></i> Projects </a>
                                    </li>
                                    <li>
                                        <a href="#"> <i class="mdi mdi-settings"></i> Account Setting </a>
                                    </li> --}}

                                    <li class="dropdown-footer">
                                        <a href="{{ route('admin.logout') }}"> <i class="mdi mdi-logout"></i> Log Out
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <div class="content-wrapper">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (Session::get('fail'))
                    <div class="alert alert-danger alert-highlighted">
                        {{ Session::get('fail') }}
                    </div>
                @elseif (Session::get('successful'))
                    <div class="alert alert-success alert-highlighted">
                        {{ Session::get('successful') }}
                    </div>
                @endif

                @yield('content')
            </div>

            {{-- <footer class="footer mt-auto">
                <div class="copyright bg-white">
                    <p>
                        &copy; <span>2021 - </span><span id="copy-year">2021</span> Copyright TessLanka Web System by
                        <a class="text-primary" href="https://www.apis.lk/uditha-soft-solution"
                            target="_blank">APIS</a>.
                    </p>
                </div>
                <script>
                    var d = new Date();
                    var year = d.getFullYear();
                    document.getElementById("copy-year").innerHTML = year;
                </script>
            </footer> --}}

        </div>
    </div>

    <script src="{{ asset('admin_assets/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin_assets/plugins/jquery/jquery.elevatezoom.js') }}"></script>
    <script src="{{ asset('admin_assets/plugins/jquery/jquery.elevateZoom-3.0.8.min.js') }}"></script>
    <script src="{{ asset('admin_assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin_assets/plugins/toaster/toastr.min.js') }}"></script>
    <script src="{{ asset('admin_assets/plugins/slimscrollbar/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('admin_assets/plugins/charts/Chart.min.js') }}"></script>
    <script src="{{ asset('admin_assets/plugins/ladda/spin.min.js') }}"></script>
    <script src="{{ asset('admin_assets/plugins/ladda/ladda.min.js') }}"></script>
    <script src="{{ asset('admin_assets/plugins/jquery-mask-input/jquery.mask.min.js') }}"></script>
    <script src="{{ asset('admin_assets/plugins/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('admin_assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js') }}"></script>
    <script src="{{ asset('admin_assets/plugins/jvectormap/jquery-jvectormap-world-mill.js') }}"></script>.
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    {{-- <script src="{{ asset('admin_assets/plugins/daterangepicker/moment.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('admin_assets/plugins/daterangepicker/daterangepicker.js') }}"></script> --}}
    <script src="{{ asset('admin_assets/plugins/jekyll-search.min.js') }}"></script>

    <script src="{{ asset('admin_assets/js/dropdown.js') }}"></script>
    {{-- <script src="{{ asset('admin_assets/js/apis.js') }}"></script> --}}
    <script src="{{ asset('admin_assets/js/sleek.js') }}"></script>
    <script src="{{ asset('admin_assets/js/chart.js') }}"></script>
    <script src="{{ asset('admin_assets/js/date-range.js') }}"></script>
    <script src="{{ asset('admin_assets/js/map.js') }}"></script>
    <script src="{{ asset('admin_assets/js/custom.js') }}"></script>
    {{-- <script disable-devtool-auto  src="{{ asset('js/_apis.js') }}"></script> --}}

    <script>
        var website = location.protocol + '//' + location.host;
    </script>

    @yield('js')

</body>

</html>
