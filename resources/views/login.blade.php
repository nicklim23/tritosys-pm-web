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
		TritoSys PM
	</title>
	<!-- Fonts and icons -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<!-- Nucleo Icons -->
	<link href="{{asset('assets/css/nucleo-icons.css')}}" rel="stylesheet" />
	<link href="{{asset('assets/css/nucleo-svg.css')}}" rel="stylesheet" />
	<!-- Font Awesome Icons -->
	<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
	<!-- CSS Files -->
	<link id="pagestyle" href="{{asset('assets/css/argon-dashboard.css?v=2.0.2')}}" rel="stylesheet" />
</head>

<body>
	<main class="main-content main-content-bg mt-0">
		<div class="page-header min-vh-100">
			<span class="mask bg-gradient-dark opacity-6"></span>
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-4 col-md-7">
						<div class="card border-0 mb-0">
							<div class="card-header bg-transparent">
								<img src="{{asset('assets/img/logos/logo.png')}}" style="width: 100%" alt="main_logo">
							</div>
							<div class="card-body px-lg-5 pt-0">
								<div class="text-center text-muted mb-4">
									<small>Welcome to TritoSys PM</small>
								</div>
								<form id="formLogin" action="{{url('/loginAction')}}" method="POST" role="form" class="text-start">
								@csrf
									<div class="mb-3">
										<input type="email" id="email" name="email" class="form-control" placeholder="Email" aria-label="Email" required>
									</div>
									<div class="mb-3">
										<input type="password" id="password" name="password" class="form-control" placeholder="Password" aria-label="Password" required>
									</div>
									<div class="text-center">
										<button type="submit" name="submit" class="btn btn-primary w-100 my-4 mb-2">Sign in</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>

	<!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
	<footer class="footer py-5">
		<div class="container">
		  <div class="row">
			<div class="col-lg-8 mb-4 mx-auto text-center">
			  <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
				Company
			  </a>
			  <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
				About Us
			  </a>
			  <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
				Team
			  </a>
			  <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
				Products
			  </a>
			  <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
				Blog
			  </a>
			  <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
				Pricing
			  </a>
			</div>
			<div class="col-lg-8 mx-auto text-center mb-4 mt-2">
			  <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
				<span class="text-lg fab fa-dribbble"></span>
			  </a>
			  <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
				<span class="text-lg fab fa-twitter"></span>
			  </a>
			  <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
				<span class="text-lg fab fa-instagram"></span>
			  </a>
			  <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
				<span class="text-lg fab fa-pinterest"></span>
			  </a>
			  <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
				<span class="text-lg fab fa-github"></span>
			  </a>
			</div>
		  </div>
		  <div class="row">
			<div class="col-8 mx-auto text-center mt-1">
			  <p class="mb-0 text-secondary">
				Copyright © <script>
				  document.write(new Date().getFullYear())
				</script> Soft by Creative Tim.
			  </p>
			</div>
		  </div>
		</div>
	</footer>
		
	<!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
	<!--   Core JS Files   -->
	<script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
	<script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
	<script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
	<script src="{{ asset('assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
	<!-- Kanban scripts -->
	<script src="{{ asset('assets/js/plugins/dragula/dragula.min.js') }}"></script>
	<script src="{{ asset('assets/js/plugins/jkanban/jkanban.js') }}"></script>
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
	<script async defer src="{{ asset('assets/js/buttons.js') }}"></script>
	<!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
	<script src="{{ asset('assets/js/argon-dashboard.min.js?v=2.0.2') }}"></script>
	<script src="{{asset('assets/js/plugins/sweetalert.min.js')}}"></script>

	@if(session('status')=="failed")
		<script>
			Swal.fire(
			  'Error!',
			  "Invalid Email Or Password!",
			  'error'
			)
		</script>
	@endif

</body>
</html>