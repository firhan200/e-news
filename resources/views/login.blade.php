<!DOCTYPE html>
<html>
	<head>
		<title>E-News</title>
		<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap/bootstrap.min.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
	</head>

	<body class="bg-login">

		<div class="container">
			<div class="row">
				<div class="col-sm-4 offset-sm-4 login-form">
					@if(isset($feedback))
						<div class="alert alert-danger">{{ $feedback }}</div>
					@endif
					<form method="post" action="{{ url('admin/login') }}" class="disable-form">
						{{ csrf_field() }}
						<div class="form-group">
							<input placeholder="email" type="text" name="email" class="form-control" value="firhan.faisal1995@gmail.com">
						</div>
						<div class="form-group">
							<input placeholder="password" type="password" name="password" class="form-control" value="123456">
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary btn-login">Login</button>
						</div>
					</form>
				</div>
			</div>			
		</div>

		<script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>
		<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
	</body>
</html>