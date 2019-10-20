<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login to system</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/mains.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url({{ asset('images/bg-01.jpg') }});">
					<span class="login100-form-title-1">
						Sign In
					</span>
				</div>
                <form method="POST" action="{{ route('login') }}" class="login100-form validate-form">
                    @csrf
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
                        <span class="label-input100">Username</span>
                        <input id="username" type="text" class="input100 @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" autofocus> 
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
                        <span class="label-input100">Password</span>
                        <input id="password" type="password" class="input100 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
                    </div>
                    <p class="text-danger">
                       @if(count($errors)>0)
                            Email or password invalid!
                       @endif
                    </p>
				</form>
			</div>
		</div>
	</div>
	<script src="{{ asset('js/mains.js') }}"></script>

</body>
</html>
