
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="description" content="Smarthr - Bootstrap Admin Template">
		<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
        <meta name="author" content="Dreamguys - Bootstrap Admin Template">
        <meta name="robots" content="noindex, nofollow">
        <title>Login - {{config('app.name')}}</title>

		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('light-theme/img/favicon.png') }}">

		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset('light-theme/css/bootstrap.min.css') }}">

		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="{{ asset('light-theme/css/font-awesome.min.css') }}">

		<!-- Main CSS -->
        <link rel="stylesheet" href="{{ asset('light-theme/css/style.css') }}">

    </head>
    <body >

		<!-- Main Wrapper -->
        <div class="main-wrapper">

			<div class="account-content">
				{{-- <a href="" class="btn btn-primary apply-btn">Apply Job</a> --}}
				<div class="container">

					<!-- Account Logo -->
					<div class="account-logo">
						<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
							<div class="container">
								<a class="navbar-brand" href="{{ url('/') }}">
									{{ config('app.name', 'Laravel') }}
								</a>
								<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
									<span class="navbar-toggler-icon"></span>
								</button>
                            <div id="app">
								<div class="collapse navbar-collapse" id="navbarSupportedContent">
									<!-- Left Side Of Navbar -->
									<ul class="navbar-nav mr-auto">

									</ul>

									<!-- Right Side Of Navbar -->
									<ul class="navbar-nav ml-auto">
										<!-- Authentication Links -->
										@guest
											@if (Route::has('login'))
												<li class="nav-item">
													<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
												</li>
											@endif

											@if (Route::has('register'))
												<li class="nav-item">
													<a class="nav-link" href="{{ route('users.create') }}">Register</a>
												</li>
											@endif
										@else
											<li class="nav-item dropdown">
												<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
													{{ Auth::user()->name }}
												</a>

												<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
													<a class="dropdown-item" href="{{ route('logout') }}"
													onclick="event.preventDefault();
																	document.getElementById('logout-form').submit();">
														{{ __('Logout') }}
													</a>

													<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
														@csrf
													</form>
												</div>
											</li>
										@endguest
									</ul>
								</div>
                            </div>
							</div>
						</nav>

					</div>
					<!-- /Account Logo -->

					@yield('content')
				</div>
			</div>
        </div>
		<!-- /Main Wrapper -->

		<!-- jQuery -->
        <script src="{{ asset('light-theme/js/jquery-3.5.1.min.js') }}"></script>

		<!-- Bootstrap Core JS -->
        <script src="{{ asset('light-theme/js/popper.min.js') }}"></script>
        <script src="{{ asset('light-theme/js/bootstrap.min.js') }}"></script>

		<!-- Custom JS -->
		<script src="{{ asset('light-theme/js/app.js') }}"></script>

    </body>
</html>
