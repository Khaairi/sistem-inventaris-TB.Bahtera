<!DOCTYPE html>
<html>

<head>
    <title>Sistem Inventaris</title>
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        .login-container {
            display: flex;
            height: 100vh;
        }

        .login-form {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            background-color: #0E2F56
        }

        .login-image {
            flex: 2;
            position: relative;
            background-image: linear-gradient(rgba(0,0,0,0.30), rgba(0,0,0,0.30)), url('images/bekron.jpeg');
            background-size: cover;
        }

        .login-icon {
            position: absolute;
            top: 10px;
            left: 10px;
        }

        .image-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: #fff;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row login-container">
            <div class="col-md-8 login-image">
                <img class="login-icon" src="images/logo2.png" alt="Icon" width="100" height="100">
                <div class="image-text">
					<h1 style="font-weight: bold; font-size: 70px;">CV BAHTERA JAYA ABADI</h1>
                </div>
            </div>
            <div class="col-md-4 login-form">
                <form action="/" method="POST">
					@csrf
					<h1 class="text-white pb-3" style="font-size: 50px;">LOGIN</h1>
					@if (session()->has('loginError'))
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
							{{ session('loginError') }}
							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
					@endif

					<div class="form-floating mb-3 mt-2">
						<input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username') }}" placeholder="xxx" autofocus>
						<label for="username">Username</label>
						@error('username')
							<div class="invalid-feedback">
								{{ $message }}
							</div>
						@enderror
					</div>

					<div class="form-floating mb-3 mt-2">
						<input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" value="{{ old('password') }}" placeholder="xxx" autofocus>
						<label for="password">Password</label>
						@error('password')
							<div class="invalid-feedback">
								{{ $message }}
							</div>
						@enderror
					</div>
					
					<button class="btn btn-success" name="login">
						Login
					</button>

					<div class="flex-sb-m w-full p-t-3 p-b-32 pb-4">
					</div>
			
					
                </form>
            </div>
        </div>
    </div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>
