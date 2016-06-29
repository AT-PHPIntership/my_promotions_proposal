<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ trans('labels.label_promotion_admin') }}</title>

    <!-- CSS -->
    <link href="{{ asset('backend/css/vendor.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
   <!-- Ionicons -->
   <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  </head>

  <body class="nav-md footer_fixed">
    <div class="container body">
      <div class="main_container">
      	
      	{{-- header --}}
        @include('backend.layouts.partials.side_bar')

        {{-- navigation --}}
        @include('backend.layouts.partials.navigation')

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        {{-- footer --}}
        @include('backend.layouts.partials.footer')
        
      </div>
    </div>

    <!-- Javascript -->
    <script src="{{ asset('backend/js/vendor.js') }}"></script>
  </body>
</html>
