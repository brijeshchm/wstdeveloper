<!doctype html>
<html lang="en">

<head>
<title>Login</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="Iconic Bootstrap 4.5.0 Admin Template">
<meta name="author" content="WrapTheme, design by: ThemeMakker.com">

<link rel="icon" href="favicon.ico" type="image/x-icon">
<!-- VENDOR CSS -->
<link rel="stylesheet" href="{{asset('admin/assets/vendor/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('admin/assets/vendor/font-awesome/css/font-awesome.min.css')}}">

<!-- MAIN CSS -->
<link rel="stylesheet" href="{{asset('admin/assets/css/main.css')}}">

</head>

<body data-theme="light" class="font-nunito">
	<!-- WRAPPER -->
	<div id="wrapper" class="theme-cyan">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle auth-main hospital">
				<div class="auth-box">
                    <div class="top">
                        <img src="{{asset('admin/assets/images/logo-white.svg')}}" alt="Iconic">
                    </div>
					<div class="card">
                        <div class="header">
                            <p class="lead">Login to your account</p>
                        </div>
                        <div class="body">
                            <form class="form-auth-small" action="{{ url('/admin/login') }}" method="POST">
                                <div class="form-group">
								 {{ csrf_field() }}
                                    <label for="signin-email" class="control-label sr-only">{{ __('Email Address') }}</label>
                                    <input type="email" name="email" class="form-control" id="signin-email" placeholder="Enter The Email ID" value="{{ old('email') }}">
									@error('email')
									<span class="help-block" role="alert">
									<strong>{{ $message }}</strong>
									</span>
									@enderror
                                </div>
                                <div class="form-group">
                                    <label for="signin-password" class="control-label sr-only">{{ __('Password') }}</label>
                                    <input type="password" name="password" class="form-control" id="signin-password" placeholder="Enter The Password">
									  @error('password')
                                    <span class="help-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <div class="form-group clearfix">
                                    <label class="fancy-checkbox element-left">
                                        <input type="checkbox">
                                        <span>Remember me</span>
                                    </label>								
                                </div>
                                <button type="submit" name="login" value="login" class="btn btn-primary btn-lg btn-block">LOGIN</button>
                                <div class="bottom">
                                    <span class="helper-text m-b-10"><i class="fa fa-lock"></i> <a href="page-forgot-password.html">Forgot password?</a></span>
                                    <span>Don't have an account? <a href="page-register.html">Register</a></span>
                                </div>
                            </form>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
</body>
</html>
