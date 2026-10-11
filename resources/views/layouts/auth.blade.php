<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Admin Dashboard | @yield('title')</title>

    <!-- theme meta -->
    <meta name="theme-name" content="mono" />

    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700|Roboto" rel="stylesheet">
    <link href="{{ asset('assets/auth/plugins/material/css/materialdesignicons.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/authplugins/simplebar/simplebar.css') }}" rel="stylesheet" />

    <!-- PLUGINS CSS STYLE -->
    <link href="{{ asset('assets/auth/plugins/nprogress/nprogress.css') }}" rel="stylesheet" />

    


    <link href="{{ asset('assets/auth/plugins/DataTables/DataTables-1.10.18/css/jquery.dataTables.min.css') }}"
        rel="stylesheet" />



    <link href="{{ asset('assets/auth/plugins/jvectormap/jquery-jvectormap-2.0.3.css') }}" rel="stylesheet" />



    <link href="{{ asset('assets/auth/plugins/daterangepicker/daterangepicker.css') }}" rel="stylesheet" />
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link href="{{ asset('assets/auth/plugins/toaster/toastr.min.css') }}" rel="stylesheet" />
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- MONO CSS -->
    <link id="main-css-href" rel="stylesheet" href="{{ asset('assets/auth/css/style.css') }}" />

    <!-- FAVICON -->
    <link href="{{ asset('assets/auth/images/favicon.png') }}" rel="shortcut icon" />
    <script src="{{ asset('assets/auth/plugins/nprogress/nprogress.js') }}"></script>

    @stack('style')

</head>


<body class="navbar-fixed sidebar-fixed" id="body">
    <!-- ====================================
    ——— WRAPPER
    ===================================== -->
    <div class="wrapper">


        <!-- ====================================
          ——— LEFT SIDEBAR WITH OUT FOOTER
        ===================================== -->
        <aside class="left-sidebar sidebar-dark" id="left-sidebar">
            <div id="sidebar" class="sidebar sidebar-with-footer">
                <!-- Aplication Brand -->
                <div class="app-brand">
                    <a href="{{ url('dashboard') }}">
                        <img src="{{ asset('assets/auth/images/logo.png') }}" alt="Blogkit">
                        <span class="brand-name">Blogkit</span>
                    </a>
                </div>
                <!-- begin sidebar scrollbar -->
                <div class="sidebar-left" style="overflow-y: scroll;" data-simplebar>
                    <!-- sidebar menu -->
                    <ul class="nav sidebar-inner" id="sidebar-menu">
                        <li>
                            <a class="sidenav-item-link" href="{{ url('dashboard') }}">
                                <i class="fas fa-tachometer-alt"></i>
                                <span class="nav-text">Dashboard</span>
                            </a>
                        </li>
                        <li class="has-sub">
                            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse"
                                data-target="#email" aria-expanded="false" aria-controls="email">
                                <i class="fas fa-list-alt"></i>
                                <span class="nav-text">Category</span> <b class="caret"></b>
                            </a>
                            <ul class="collapse" id="email" data-parent="#sidebar-menu">
                                <div class="sub-menu">
                                    <li>
                                        <a class="sidenav-item-link" href="{{ url('/add-category') }}">
                                            <span class="nav-text">Add Category</span>

                                        </a>
                                    </li>
                                    <li>
                                        <a class="sidenav-item-link" href="{{ url('/view-category') }}">
                                            <span class="nav-text">View Category</span>

                                        </a>
                                    </li>
                                </div>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse"
                                data-target="#tag" aria-expanded="false" aria-controls="email">
                                <i class="fas fa-tags"></i>
                                <span class="nav-text">Tag</span> <b class="caret"></b>
                            </a>
                            <ul class="collapse" id="tag" data-parent="#sidebar-menu">
                                <div class="sub-menu">
                                    <li>
                                        <a class="sidenav-item-link" href="{{ url('/add-tag') }}">
                                            <span class="nav-text">Add Tags</span>

                                        </a>
                                    </li>
                                    <li>
                                        <a class="sidenav-item-link" href="{{ url('/view-tag') }}">
                                            <span class="nav-text">View Tag</span>

                                        </a>
                                    </li>
                                </div>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse"
                                data-target="#post" aria-expanded="false" aria-controls="email">
                                <i class="fas fa-blog"></i>
                                <span class="nav-text">Post</span> <b class="caret"></b>
                            </a>
                            <ul class="collapse" id="post" data-parent="#sidebar-menu">
                                <div class="sub-menu">
                                    <li>
                                        <a class="sidenav-item-link" href="{{ url('admin/add-post') }}">
                                            <span class="nav-text">Add Post</span>

                                        </a>
                                    </li>
                                    <li>
                                        <a class="sidenav-item-link" href="{{ url('admin/index') }}">
                                            <span class="nav-text">View Post</span>

                                        </a>
                                    </li>
                                </div>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse"
                                data-target="#ads" aria-expanded="false" aria-controls="ads">
                                <i class="fas fa-ad"></i>
                                <span class="nav-text">Ads</span> <b class="caret"></b>
                            </a>
                            <ul class="collapse" id="ads" data-parent="#sidebar-menu">
                                <div class="sub-menu">
                                    <li>
                                        <a class="sidenav-item-link" href="{{ url('add-ad') }}">
                                            <span class="nav-text">Add Ad</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="sidenav-item-link" href="{{ url('view-ads') }}">
                                            <span class="nav-text">View Ads</span>
                                        </a>
                                    </li>
                                </div>
                            </ul>
                        </li>
                    </ul>
                </div>

                <div class="sidebar-footer">
                    <div class="sidebar-footer-content">
                        <ul class="d-flex">
                            <li>
                                <a href="javascript:void(0)" id="sidebar-logout" data-toggle="tooltip" title="Log out">
                                    <i class="mdi mdi-logout"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </aside>

        <!-- ====================================
      ——— PAGE WRAPPER
      ===================================== -->
        <div class="page-wrapper">

            <!-- Header -->
            <header class="main-header" id="header">
                <nav class="navbar navbar-expand-lg navbar-light" id="navbar">
                    <!-- Sidebar toggle button -->
                    <button id="sidebar-toggler" class="sidebar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                    </button>

                    <span class="page-title">@yield('title', 'Dashboard')</span>

                    <div class="navbar-right">
                        <ul class="nav navbar-nav">
                            <li class="dropdown user-menu">
                                <button class="dropdown-toggle nav-link" data-toggle="dropdown">
                                    <img src="{{ asset('assets/auth/images/user/user-xs-01.jpg') }}"
                                        class="user-image rounded-circle" alt="User Image" />
                                    <span class="d-none d-lg-inline-block">{{ Auth::user()->name }}</span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li>
                                        <a class="dropdown-link-item" href="{{ url('/') }}" target="_blank">
                                            <i class="mdi mdi-web"></i>
                                            <span class="nav-text">View Website</span>
                                        </a>
                                    </li>
                                    <li class="dropdown-footer">
                                        <form method="post" id="logout-form" action="{{ route('logout') }}">
                                            @csrf
                                            <a id="logout-button" class="dropdown-link-item"
                                                href="javascript:void(0)">
                                                <i class="mdi mdi-logout"></i> Log Out
                                            </a>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>

            <!-- ====================================
        ——— CONTENT WRAPPER
        ===================================== -->
            <div class="content-wrapper" style="padding-top: 40px; padding-bottom: 40px;">
                @yield('content')
            </div>

            <footer class="footer mt-auto">
                <div class="copyright bg-white">
                    <p>&copy; <span id="copy-year"></span> Blogkit Admin. All rights reserved.</p>
                </div>
                <script>
                    document.getElementById("copy-year").innerHTML = new Date().getFullYear();
                </script>
            </footer>

        </div>
    </div>

    <script src="{{ asset('assets/auth/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/auth/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/auth/plugins/simplebar/simplebar.min.js') }}"></script>
    <script src="https://unpkg.com/hotkeys-js/dist/hotkeys.min.js"></script>



    <script src="{{ asset('assets/auth/plugins/apexcharts/apexcharts.js') }}"></script>



    <script src="{{ asset('assets/auth/plugins/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js') }}"></script>



    <script src="{{ asset('assets/auth/') }}plugins/jvectormap/jquery-jvectormap-world-mill.js"></script>
    <script src="{{ asset('assets/auth/') }}plugins/jvectormap/jquery-jvectormap-us-aea.js"></script>
    <script src="{{ asset('assets/auth/') }}plugins/jvectormap/jquery-jvectormap-2.0.3.min.js"></script>



    <script src="{{ asset('assets/auth/plugins/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('assets/auth/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script>
        jQuery(document).ready(function() {
            jQuery('input[name="dateRange"]').daterangepicker({
                autoUpdateInput: false,
                singleDatePicker: true,
                locale: {
                    cancelLabel: 'Clear'
                }
            });
            jQuery('input[name="dateRange"]').on('apply.daterangepicker', function(ev, picker) {
                jQuery(this).val(picker.startDate.format('MM/DD/YYYY'));
            });
            jQuery('input[name="dateRange"]').on('cancel.daterangepicker', function(ev, picker) {
                jQuery(this).val('');
            });
        });
    </script>



    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>



    <script src="{{ asset('assets/auth/plugins/toaster/toastr.min.js') }}"></script>

    <script src="{{ asset('assets/auth/js/mono.js') }}"></script>
    <script src="{{ asset('assets/auth/js/chart.js') }}"></script>
    <script src="{{ asset('assets/auth/js/map.js') }}"></script>
    <script src="{{ asset('assets/auth/js/custom.js') }}"></script>

    @stack('script')

    <script>
        $(document).ready(function() {
            $('#logout-button, #sidebar-logout').click(function() {
                $('#logout-form').submit();
            });
        });
    </script>



    <!--  -->


</body>

</html>
