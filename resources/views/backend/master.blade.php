<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="_token" content="{!! csrf_token() !!}" />
	<title>@yield('title')</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.5 -->
	<link rel="stylesheet" href="{{ asset('asset/backend/bootstrap/css/bootstrap.min.css') }}">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="{{ asset('asset/backend/dist/css/AdminLTE.min.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('asset/backend/dist/css/skins/_all-skins.min.css') }}">
	<!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('asset/backend/plugins/datatables/dataTables.bootstrap.css') }}">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
</head>
<body class="hold-transition skin-blue sidebar-mini">

	<!-- Site wrapper -->
	<div class="wrapper">

		<!-- HEADER -->
		@include('backend.layouts.header')
		
		<!-- SIDE-BAR -->
		@include('backend.layouts.sidebar')

		<!-- Content Wrapper. Contains page content -->
		@yield('content')
		
		<!-- SIDE-BAR -->
		@include('backend.layouts.footer')

	</div><!-- ./wrapper -->

	<!-- jQuery 2.1.4 -->
	<script src="{{ asset('asset/backend/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
	<!-- Bootstrap 3.3.5 -->
	<script src="{{ asset('asset/backend/bootstrap/js/bootstrap.min.js') }}"></script>
	<!-- DataTables -->
    <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('asset/backend/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
	
	<!-- FastClick -->
	<script src="{{ asset('asset/backend/plugins/fastclick/fastclick.min.js') }}"></script>
	<!-- AdminLTE App -->
	<script src="{{ asset('asset/backend/dist/js/app.min.js') }}"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="{{ asset('asset/backend/dist/js/demo.js') }}"></script>
	
    @yield('script')
	
	<!-- page script -->
    <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
</body>
</html>
