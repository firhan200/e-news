<!DOCTYPE html>
<html>
	<head>
		<title>@yield('title') | E-News</title>
		<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap/bootstrap.min.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/fontawesome/css/font-awesome.min.css') }}">
	</head>

	<body>
		<div class="sidenav">
			<div class="admin-name" align="center"><i class="fa fa-user-circle"></i> @yield('admin-name')</div>
			<ul class="menu">
				<a href="{{ url('/admin/home') }}" class="@yield('home')"><li><i class="fa fa-home"></i> Home</li></a>
				<a href="{{ url('/admin/news') }}" class="@yield('news')"><li><i class="fa fa-newspaper-o"></i> News</li></a>
				<a href="{{ url('/admin/category') }}" class="@yield('category')"><li><i class="fa fa-tag"></i> Categories</li></a>
				<a href="#" data-toggle="modal" data-target="#myModal"><li><i class="fa fa-sign-out"></i> Logout</li></a>
			</ul>
		</div>

		<div class="main">
			<div class="container">
				@yield('body')
			</div>
		</div>

		<!-- Logout Modal -->
		<div class="modal fade" id="myModal">
		  <div class="modal-dialog">
		    <div class="modal-content">

		      <!-- Modal Header -->
		      <div class="modal-header">
		        <h4 class="modal-title">Logout from system?</h4>
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		      </div>
		      <!-- Modal footer -->
		      <div class="modal-footer">
		        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
		        <a href="{{ url('/admin/logout') }}" class="btn btn-primary">Logout</a>
		      </div>

		    </div>
		  </div>
		</div>

		<!-- Logout Modal -->
		<div class="modal fade" id="confirmModal">
		  <div class="modal-dialog">
		    <div class="modal-content">

		      <!-- Modal Header -->
		      <div class="modal-header">
		        <h4 class="modal-title">Confirmation</h4>
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		      </div>
		      <div class="modal-body" id="confirm-content">
		      </div>
		      <!-- Modal footer -->
		      <div class="modal-footer">
		        <button type="button" class="btn btn-danger" data-dismiss="modal">Abort</button>
		        <a href="#" id="confirm-url" class="btn btn-success">Yes</a>
		      </div>

		    </div>
		  </div>
		</div>

		<script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/bootstrap/popper.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>
		<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
		<script src="{{ asset('js/app.js') }}"></script>
			
		@yield('additional-script')
		</script>
	</body>
</html>