<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="description" content="Smarthr - Bootstrap Admin Template">
		<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
        <meta name="author" content="Dreamguys - Bootstrap Admin Template">
        <meta name="robots" content="noindex, nofollow">
        <title>{{$title }} - {{config('app.name')}} </title>
		@yield('custom_style')
		@include('layouts.partials.common-style')
        @include('layouts.partials.flash')
    </head>

    <body>

        <!-- Main Wrapper -->
        <div class="main-wrapper">

			@include('layouts.partials.top_bar')

			@include('layouts.partials.side-bar')

            @yield('content')

        </div>
        <!-- /Main Wrapper -->

		@include('layouts.partials.common-js')

        @yield('custom_script')

        <script>
            $(function() {
                $('.alert').delay(1500).fadeIn('normal', function() {
                    $(this).delay(3500).fadeOut();
                    });
                });
        </script>
    </body>
</html>
