<!doctype html>
<html lang="en">
  <head>
  	<title>Staff login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="assets/loginform/css/style.css">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
		      	<div class="icon d-flex align-items-center justify-content-center bg-success">
		      		<span class="fa fa-user-o"></span>
		      	</div>
		      	<h3 class="text-center mb-4 text-success">Admin</h3>
                @if(@session("wrong-id"))
                    <div class="alert alert-danger">
                        Wrong ID number
                    </div>
                @endif

                @if(@session("blocked-account"))
                    <div class="alert alert-danger">
                        Access denied. Your account is currently de-activated.
                    </div>
                @endif

                @if(@session("wrong-password"))
                    <div class="alert alert-danger">
                        Wrong password
                    </div>
                @endif
				<form action="{{ route('login-user') }}" method="post" class="login-form">
                    @csrf
                    <div class="form-group">
                        <input type="number" class="form-control rounded-left" name="staff_id" 
                        value="{{ old('staff_id') }}" placeholder="Staff ID">

                        @error("staff_id")
                            <label class="text-danger"> {{ $message }} </label>
                        @enderror
                    </div>
                    <div class="form-group d-flex">
                        <input type="password" class="form-control rounded-left" name="password" 
                        placeholder="Password">
                    </div>
                    @error("password")
                        <label class="text-danger"> {{ $message }} </label>
                     @enderror
                    <div class="form-group d-md-flex">
                        <div class="w-50">
                            <label class="checkbox-wrap checkbox-success text-success">
                            </label>
                        </div>
                        <div class="w-50 text-md-right">
                            <a href="#" class="text-success">Forgot Password</a>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success rounded submit p-3 px-5">Login</button>
                    </div>
	          </form>
	        </div>
				</div>
			</div>
		</div>
	</section>

	<script src="assets/loginform/js/jquery.min.js"></script>
  <script src="assets/loginform/js/popper.js"></script>
  <script src="assets/loginform/js/bootstrap.min.js"></script>
  <script src="assets/loginform/js/main.js"></script>

	</body>
</html>

