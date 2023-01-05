<!--
=========================================================
* Argon Dashboard 2 PRO - v2.0.2
=========================================================

* Product Page:  https://www.creative-tim.com/product/argon-dashboard-pro
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/logos/favicon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/img/logos/favicon.png') }}">
    <title>
        Tritosys PM
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('assets/css/argon-dashboard.css?v=2.0.2') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet" />
    @yield('customstyle')
</head>

<body class="g-sidenav-show   bg-gray-100">
    <div class="min-height-300 bg-primary position-absolute w-100"></div>
    <aside
        class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
        id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0 text-center" href="" target="_blank">
                <img src="{{ asset('assets/img/logos/logo.png') }}" class="navbar-brand-img h-100" alt="main_logo">
                {{-- <span class="ms-1 font-weight-bold">eITP</span> --}}
            </a>
        </div>
        <hr class="horizontal dark mt-0">
        <div class="collapse navbar-collapse  w-auto h-auto" id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ Request::segment(1) == 'dashboard' ? 'active' : '' }}"
                        href="{{ url('dashboard') }}">
                        <div
                            class="icon icon-shape icon-sm text-center  me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-shop text-primary text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#projectNav" class="nav-link {{ Request::segment(1) == 'projects' ? 'active' : '' }}"
                        aria-controls="projectNav" role="button" aria-expanded="false">
                        <div
                            class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                            <i class="ni ni-briefcase-24 text-warning text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Projects</span>
                    </a>
                    <div class="collapse {{ Request::segment(1) == 'projects' ? 'show' : '' }}" id="projectNav">
                        <ul class="nav ms-4">
                            <li class="nav-item {{ Request::segment(1) == 'projects' && Request::segment(2) == '' ? 'active' : '' }}">
                                <a class="nav-link {{ Request::segment(1) == 'projects' && Request::segment(2) == '' ? 'active' : '' }}" href="{{ url('projects') }}">
                                    <span class="sidenav-mini-icon"> L </span>
                                    <span class="sidenav-normal"> Listing </span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="{{ url('projects/add') }}">
                                    <span class="sidenav-mini-icon"> A </span>
                                    <span class="sidenav-normal"> Add Project </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#siteNav" class="nav-link {{ Request::segment(1) == 'sites' ? 'active' : '' }}"
                        aria-controls="siteNav" role="button" aria-expanded="false">
                        <div
                            class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                            <i class="ni ni-pin-3 text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Sites</span>
                    </a>
                    <div class="collapse {{ Request::segment(1) == 'sites' ? 'sites/add' : '' }}" id="siteNav">
                        <ul class="nav ms-4">
                            <li class="nav-item {{ Request::segment(1) == 'sites' && Request::segment(2) == '' ? 'active' : '' }}">
                                <a class="nav-link {{ Request::segment(1) == 'sites' && Request::segment(2) == '' ? 'active' : '' }}" href="{{ url('sites') }}">
                                    <span class="sidenav-mini-icon"> L </span>
                                    <span class="sidenav-normal"> Listing </span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link {{ request()->is('*sites/add*') ? 'active' : '' }}" href="{{ url('sites/add') }}">
                                    <span class="sidenav-mini-icon"> A </span>
                                    <span class="sidenav-normal"> Add Site </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#customerNav" class="nav-link {{ Request::segment(1) == 'customers' ? 'active' : '' }}"
                        aria-controls="customerNav" role="button" aria-expanded="false">
                        <div
                            class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                            <i class="ni ni-single-02 text-info text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Customers</span>
                    </a>
                    <div class="collapse {{ Request::segment(1) == 'customers' ? 'show' : '' }}" id="customerNav">
                        <ul class="nav ms-4">
                            <li class="nav-item {{ Request::segment(1) == 'customers' && Request::segment(2) == '' ? 'active' : '' }}">
                                <a class="nav-link {{ Request::segment(1) == 'customers' && Request::segment(2) == '' ? 'active' : '' }}" href="{{ url('customers') }}">
                                    <span class="sidenav-mini-icon"> L </span>
                                    <span class="sidenav-normal"> Listing </span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link {{ request()->is('*customers/add*') ? 'active' : '' }}" href="{{ url('customers/add') }}">
                                    <span class="sidenav-mini-icon"> A </span>
                                    <span class="sidenav-normal"> Add Customer </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </aside>
    <main class="main-content position-relative border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg  px-0 mx-4 shadow-none border-radius-xl z-index-sticky "
            id="navbarBlur" data-scroll="false">
            <div class="container-fluid py-1 px-3">
                <div class="sidenav-toggler sidenav-toggler-inner d-xl-block d-none ">
                    <a href="javascript:;" class="nav-link p-0">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line bg-white"></i>
                            <i class="sidenav-toggler-line bg-white"></i>
                            <i class="sidenav-toggler-line bg-white"></i>
                        </div>
                    </a>
                </div>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                        {{-- <div class="input-group">
              <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
              <input type="text" class="form-control" placeholder="Type here...">
            </div> --}}
                    </div>
                    <ul class="navbar-nav  justify-content-end">
                        <li class="nav-item d-flex align-items-center">
                            <a href="{{ url('/') }}" class="nav-link text-white font-weight-bold px-0">
                                <i class="fa fa-user me-sm-1"></i>
                                <span class="d-sm-inline d-none">Admin</span>
                            </a>
                            <a href="{{ url('/') }}" class="nav-link text-white font-weight-bold px-0 ms-3">
                                <i class="fa fa-sign-out me-sm-2"></i>
                            </a>
                        </li>
                        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line bg-white"></i>
                                    <i class="sidenav-toggler-line bg-white"></i>
                                    <i class="sidenav-toggler-line bg-white"></i>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <!--content-->
            @yield('content')
            <footer class="footer pt-3  ">
                <div class="container-fluid">
                    <div class="row align-items-center justify-content-lg-between">
                        <div class="col-lg-6 mb-lg-0 mb-4">
                            <div class="copyright text-center text-sm text-muted text-lg-start">
                                ©
                                <script>
                                    document.write(new Date().getFullYear())
                                </script>
                                Tritosys
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </main>
    <!-- jQuery -->
    <script src="{{ asset('assets/js/jquery-1.7.1.min.js') }}"></script>
    <!--   Core JS Files   -->
    <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/choices.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/flatpickr.min.js') }}"></script>
    <!-- Kanban scripts -->
    <script src="{{ asset('assets/js/plugins/dragula/dragula.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/jkanban/jkanban.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/chartjs.min.js') }}"></script>
    {{-- <script type="text/javascript" src="https://code.jquery.com/jquery-1.7.1.min.js"></script> --}}
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script src="{{ asset('assets/js/const.js') }}"></script>
    <script src="{{asset('assets/js/plugins/sweetalert.min.js')}}"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('assets/js/argon-dashboard.min.js?v=2.0.2') }}"></script>
    <script>
        if (document.querySelector('.datetimepicker')) {
            flatpickr('.datetimepicker', {
                allowInput: true
            }); // flatpickr
        }
    </script>
    @yield('pagespecificscripts')
</body>

</html>
