<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentallela Alela! | </title>

    <!-- Bootstrap -->
    <link href="{{ asset('assets/backend/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- jQuery custom content scroller -->
    <link href="{{ asset('assets/backend/css/jquery.mCustomScrollbar.min.css') }}" rel="stylesheet"/>

    <!-- Custom Theme Style -->
    <link href="{{ asset('assets/backend/css/custom.min.css') }}" rel="stylesheet">
  </head>

  <body class="nav-md footer_fixed">
    <div class="container body">
      <div class="main_container">
      	
      	{{-- header --}}
        @include('backend.layouts.side_bar')

        {{-- navigation --}}
        @include('backend.layouts.navigation')

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Fixed Footer <small> Just add class <strong>footer_fixed</strong></small></h3>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        {{-- footer --}}
        @include('backend.layouts.footer')
        
      </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('assets/backend/js/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('assets/backend/js/bootstrap.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('assets/backend/js/fastclick.js') }}"></script>
    <!-- NProgress -->
    <script src="{{ asset('assets/backend/js/nprogress.js') }}"></script>
    <!-- jQuery custom content scroller -->
    <script src="{{ asset('assets/backend/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{ asset('assets/backend/js/custom.min.js') }}"></script>
  </body>
</html>
