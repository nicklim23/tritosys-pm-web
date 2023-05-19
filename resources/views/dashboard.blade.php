<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="assets/images/favicon-32x32.png" type="image/png" />
	<!--plugins-->
	<link href="assets2/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet"/>
	<link href="assets2/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="assets2/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="assets2/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<!-- loader-->
	<link href="assets2/css/pace.min.css" rel="stylesheet" />
	<script src="assets2/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="assets2/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets2/css/bootstrap-extended.css" rel="stylesheet">
	<link href="assets2/css/bootstrap-extended.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="assets2/css/app.css" rel="stylesheet">
	<link href="assets2/css/icons.css" rel="stylesheet">
	
	<title>Tritosys PM</title>
</head>

<body class="bg-theme bg-theme1">
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
		<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<!-- <div>
					<img src="assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
				</div> -->
				<div>
					<h4 class="logo-text">Tritosys Project</h4>
				</div>
				<div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
				</div>
			</div>
			<!--navigation-->
			<ul class="metismenu" id="menu">
                <li class="nav-item">
                    <a class="nav-link {{ Request::segment(1) == 'dashboard' ? 'active' : '' }}" href="{{ url('dashboard') }}">
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
                                    <i class="bx bx-right-arrow-alt"></i>
                                    <span class="sidenav-normal"> Listing </span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link " href="{{ url('projects/add') }}">
                                    <i class="bx bx-right-arrow-alt"></i>
                                    <span class="sidenav-normal"> Add Project </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#siteNav" class="nav-link {{ Request::segment(1) == 'sites' ? 'active' : '' }}" aria-controls="siteNav" role="button" aria-expanded="false">
                        <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                            <i class="ni ni-pin-3 text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Sites</span>
                    </a>
                    <div class="collapse {{ Request::segment(1) == 'sites' ? 'sites/add' : '' }}" id="siteNav">
                        <ul class="nav ms-4">
                            <li class="nav-item {{ Request::segment(1) == 'sites' && Request::segment(2) == '' ? 'active' : '' }}">
                                <a class="nav-link {{ Request::segment(1) == 'sites' && Request::segment(2) == '' ? 'active' : '' }}" href="{{ url('sites') }}">
                                    <i class="bx bx-right-arrow-alt"></i>
                                    <span class="sidenav-normal"> Listing </span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link {{ request()->is('*sites/add*') ? 'active' : '' }}" href="{{ url('sites/add') }}">
                                    <i class="bx bx-right-arrow-alt"></i>
                                    <span class="sidenav-normal"> Add Site </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#customerNav" class="nav-link {{ Request::segment(1) == 'customers' ? 'active' : '' }}" aria-controls="customerNav" role="button" aria-expanded="false">
                        <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                            <i class="ni ni-single-02 text-info text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Customers</span>
                    </a>
                    <div class="collapse {{ Request::segment(1) == 'customers' ? 'show' : '' }}" id="customerNav">
                        <ul class="nav ms-4">
                            <li class="nav-item {{ Request::segment(1) == 'customers' && Request::segment(2) == '' ? 'active' : '' }}">
                                <a class="nav-link {{ Request::segment(1) == 'customers' && Request::segment(2) == '' ? 'active' : '' }}" href="{{ url('customers') }}">
                                    <i class="bx bx-right-arrow-alt"></i>
                                    <span class="sidenav-normal"> Listing </span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link {{ request()->is('*customers/add*') ? 'active' : '' }}" href="{{ url('customers/add') }}">
                                    <i class="bx bx-right-arrow-alt"></i>
                                    <span class="sidenav-normal"> Add Customer </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
			</ul>
			<!--end navigation-->
		</div>
		<!--end sidebar wrapper -->
		<!--start header -->
		<header>
			<div class="topbar d-flex align-items-center">
				<nav class="navbar navbar-expand">
					<div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
					</div>
					<div class="search-bar flex-grow-1">
						<div class="position-relative search-bar-box">
							<input type="text" class="form-control search-control" placeholder="Type to search..."> <span class="position-absolute top-50 search-show translate-middle-y"><i class='bx bx-search'></i></span>
							<span class="position-absolute top-50 search-close translate-middle-y"><i class='bx bx-x'></i></span>
						</div>
					</div>
					<div class="top-menu ms-auto">
						<ul class="navbar-nav align-items-center">
							<li class="nav-item mobile-search-icon">
								<a class="nav-link" href="#">	<i class='bx bx-search'></i>
								</a>
							</li>
							<li class="nav-item">
                            <a href="{{ url('/dashboard') }}" class="nav-link text-white font-weight-bold px-0">
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
						</ul>
					</div>
					<div class="user-box dropdown">
                        <a href="{{ url('/logout') }}" class="nav-link text-white font-weight-bold px-0 ms-3">
                            <i class="fa fa-sign-out me-sm-2"></i>
                        </a>
					</div>
				</nav>
			</div>
		</header>

<div class="page-wrapper">
	<div class="page-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="card  mb-4">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">
                                            Total<br>Projects
                                        </p>
                                        <h5 class="font-weight-bolder mt-2">
                                            4
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                        <i class="ni ni-curved-next text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="card  mb-4">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">
                                            Total<br>Sites
                                        </p>
                                        <h5 class="font-weight-bolder mt-2">
                                            3
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                        <i class="ni ni-spaceship text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="card  mb-4">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Total<br>Customers</p>
                                        <h5 class="font-weight-bolder mt-2">
                                            5
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                                        <i class="ni ni-like-2 text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card z-index-2">
                <div class="card-header p-3 pb-0">
                    <h6>Summary Line chart</h6>
                </div>
                <div class="card-body p-3">
                    <div class="chart">
                        <canvas id="line-chart" class="chart-canvas" height="300"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>

<script src="assets2/js/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
	<!--plugins-->
	<script src="assets2/js/jquery.min.js"></script>
	<script src="assets2/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="assets2/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="assets2/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<script src="assets2/plugins/chartjs/chart.min.js"></script>
	<script src="assets2/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="assets2/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
	<script src="assets2/plugins/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
	<script src="assets2/plugins/sparkline-charts/jquery.sparkline.min.js"></script>
	<script src="assets2/plugins/jquery-knob/excanvas.js"></script>
	<script src="assets2/plugins/jquery-knob/jquery.knob.js"></script>
	  <script>
		  $(function() {
			  $(".knob").knob();
		  });
	  </script>
	  <script src="assets/js/index.js"></script>
	<!--app JS-->
	<script src="assets/js/app.js"></script>
    <script src="{{ asset('assets/js/plugins/chartjs.min.js') }}"></script>
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
    <script>
        // Line chart
        var ctx1 = document.getElementById("line-chart").getContext("2d");

        new Chart(ctx1, {
            type: "line",
            data: {
                labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                        label: "Projects",
                        tension: 0.4,
                        borderWidth: 0,
                        pointRadius: 2,
                        pointBackgroundColor: "#5e72e4",
                        borderColor: "#5e72e4",
                        borderWidth: 3,
                        data: [5, 4, 3, 22, 15, 25, 40, 23, 50],
                        maxBarThickness: 6
                    },
                    {
                        label: "Sites",
                        tension: 0.4,
                        borderWidth: 0,
                        pointRadius: 2,
                        pointBackgroundColor: "#3A416F",
                        borderColor: "#3A416F",
                        borderWidth: 3,
                        data: [3, 9, 4, 14, 29, 29, 34, 23, 40],
                        maxBarThickness: 6
                    },
                    {
                        label: "Customers",
                        tension: 0.4,
                        borderWidth: 0,
                        pointRadius: 2,
                        pointBackgroundColor: "#17c1e8",
                        borderColor: "#17c1e8",
                        borderWidth: 3,
                        data: [4, 8, 7, 9, 3, 9, 14, 13, 20],
                        maxBarThickness: 6
                    },
                ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#b2b9bf',
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: true,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#b2b9bf',
                            padding: 10,
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });
    </script>
</body>

</html>
