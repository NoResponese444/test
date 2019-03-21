<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
</head>
<body>
	@if(\Session::has('alert'))
        <div class="alert alert-danger">
            <div>{{Session::get('alert')}}</div>
        </div>
    @endif
    @if(\Session::has('alert-success'))
        <div class="alert alert-success">
            <div>{{Session::get('alert-success')}}</div>
        </div>
    @endif
	<form action="{{ url('/loginPost') }}" method="post">
		{{ csrf_field() }}
		<div class="form-group">
		    <label for="email">Email:</label>
		    <input type="email" class="form-control" id="email" name="email">
		</div>
		<div class="form-group">
		    <label for="alamat">Password:</label>
		    <input type="password" class="form-control" id="password" name="password"></input>
		</div>
		<div class="form-group">
		    <button type="submit" class="btn btn-md btn-primary">Login</button>
		    <a href="{{url('/')}}" class="btn btn-md btn-warning">Register</a>
		</div>
	</form>
</body>
</html>