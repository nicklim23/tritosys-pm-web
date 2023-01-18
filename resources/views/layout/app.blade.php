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
                            <li class="nav-item dropdown px-3 d-flex align-items-center">
                                <a href="#" class="nav-link text-white p-0" id="dropdownMenuButton" data-bs-toggle="dropdown">
                                    <i class="fa fa-bell cursor-pointer" style="font-size:20px">
                                        <span id="unseen_notifications" class="position-absolute top-20 start-80 translate-middle badge badge-sm rounded-pill" style="font-size:8px;background-color:red"></span>
                                    </i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton" style="overflow-y: scroll;max-height: 300px;min-height:100px;width:240px" id="dropdown_style">
                                    <div id="notifications"></div>
                                </ul>
                            </li>
                            <a href="{{ url('/logout') }}" class="nav-link text-white font-weight-bold px-0 ms-3">
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

    <!-- Notification script -->
    <script>
        $(document).ready(function(){
            load_stuff();
            function load_stuff(){
                $.ajax({
                    url: "{{ url('notifications') }}/{{ session('user_id') }}",
                    method:"GET",
                    dataType: 'json',
                    contentType: "application/json",
                    success:function(data){
                        
                        $('#notifications').empty();
                        var notifications = JSON.stringify(data.notifications);
                        var notification = JSON.parse(notifications);

                        var html = '';
                        var link = '';

                        html += '<meta name="csrf-token" content="{{ csrf_token() }}">';
                        
                        for(var i = 0; i < data.counts; i++){

                            if(notification[i]['module'] == "Project"){

                                link_url = "{{ url('projects') }}/";
                                link = link_url + notification[i]['event_id'];
                                link_function = "'" + link + "'";
                                // html += '<a href="{{ url("projects") }}/'+ notification[i]['event_id'] +'"';

                                if(notification[i]['unread'] == 1){
                                    html += '<a href="' + link + '" style="font-weight:bold" onclick="readStatus(' + notification[i]['id'] + ', ' + link_function + ')">';
                                }
                                else if(notification[i]['unread'] == 0){
                                    // html += ' <style="color:grey">';
                                    html += '<a href="' + link + '" style="color:grey">';
                                }

                                html += '<i class="fas fa-business-time mr-2"></i>&nbsp&nbsp&nbsp<span>'+ notification[i]['title'] + ' </span>';
                                html += '<p>'+ notification[i]['description'] + ' </p>';
                                html += '</a>';
                                html += '<div class="dropdown-divider"></div>';

                            }
                            else if(notification[i]['module'] == "Site"){
                                
                                link_url = "{{ url('sites') }}/";
                                link = link_url + notification[i]['event_id'];
                                link_function = "'" + link + "'";
                                // html += '<a href="{{ url("projects") }}/'+ notification[i]['event_id'] +'"';

                                if(notification[i]['unread'] == 1){
                                    html += '<a href="' + link + '" style="font-weight:bold" onclick="readStatus(' + notification[i]['id'] + ', ' + link_function + ')">';
                                }
                                else if(notification[i]['unread'] == 0){
                                    // html += ' <style="color:grey">';
                                    html += '<a href="' + link + '" style="color:grey">';
                                }

                                html += '<i class="fas fa-business-time mr-2"></i>&nbsp&nbsp&nbsp<span>'+ notification[i]['title'] + ' </span>';
                                html += '<p>'+ notification[i]['description'] + ' </p>';
                                html += '</a>';
                                html += '<div class="dropdown-divider"></div>';

                            }
                            else if(notification[i]['module'] == "Customer"){

                                link_url = "{{ url('customers') }}/";
                                link = link_url + notification[i]['event_id'];
                                link_function = "'" + link + "'";
                                // html += '<a href="{{ url("projects") }}/'+ notification[i]['event_id'] +'"';

                                if(notification[i]['unread'] == 1){
                                    html += '<a href="' + link + '" style="font-weight:bold" onclick="readStatus(' + notification[i]['id'] + ', ' + link_function + ')">';
                                }
                                else if(notification[i]['unread'] == 0){
                                    // html += ' <style="color:grey">';
                                    html += '<a href="' + link + '" style="color:grey">';
                                }

                                html += '<i class="fas fa-business-time mr-2"></i>&nbsp&nbsp&nbsp<span>'+ notification[i]['title'] + ' </span>';
                                html += '<p>'+ notification[i]['description'] + ' </p>';
                                html += '</a>';
                                html += '<div class="dropdown-divider"></div>';

                            }
                        }

                        $('#notifications').append(html);
                        if(data.unread != 0){
                            document.getElementById("unseen_notifications").innerHTML = data.unread;
                            $('#unseen_notifications').removeClass('dropdown-body text-center mt-4').addClass('dropdown-header');
                        }
                        else if(data.counts == 0){
                            document.getElementById("notifications").innerHTML = 'There is no notification.';
                            $('#unseen_notifications').removeClass('position-absolute top-20 start-80 translate-middle badge badge-sm rounded-pill');
                            $("#dropdown_style").css("width", "");
                            $("#dropdown_style").css("max-height", "");
                            $("#dropdown_style").css("min-height", "");
                            $("#dropdown_style").css("overflow-y", "");
                        }
                        else{
                            $('#unseen_notifications').removeClass('position-absolute top-20 start-80 translate-middle badge badge-sm rounded-pill');
                            document.getElementById("notifications").innerHTML = 'There is no new notification.';
                        }

                    }
                });
                setTimeout(load_stuff, 5000);
            }

        });

        function readStatus(event_id, link){
            $.ajaxSetup({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
            });
            var id = event_id;
            $.ajax({
                url: "{{ url('notification-readed') }}/" + id,
                type:"PUT",
                dataType: 'json',
                contentType: "application/json",
                success:function(data)
                {
                    window.location = link;
                }
            })
        }

    </script>

    @yield('pagespecificscripts')

</body>
</html>
