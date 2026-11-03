<!DOCTYPE html>
<html lang="en">


<!-- login23:11-->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>KK PATEL ADMIN LOGIN</title>
    <link rel="stylesheet" type="text/css" href="{{URL::to('/')}}/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{URL::to('/')}}/assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{URL::to('/')}}/assets/css/style.css">
    <!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
    <div class="main-wrapper account-wrapper">
        <div class="account-page">
            <div class="account-center">
                <div class="account-box">
                    <center>
                        @if (session('success'))
                            <p style="color:green">{{ session('success') }}</p>
                        @endif
                        @if (session('error'))
                            <p style="color:red">{{ session('error') }}</p>
                        @endif
                    </center>
                    <form action="{{ route('userLogin') }}" method="POST">
                        @csrf
                        <div class="account-logo">
                            <a href=""><img src="/img/experts/logo.png" alt=""></a>
                        </div>
                        <div class="form-group">
                            <label>Username or Email</label>
                            <input type="email" autofocus="" name="email" class="form-control">
                            <span style="color:red">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control">
                            <span style="color:red">
                                @error('password')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary account-btn">Login</button>
                        </div>
                        <p class="mt-3">
                            <a href="/forget-password">Forgot Password?</a>
                        </p>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="{{URL::to('/')}}/assets/js/jquery-3.2.1.min.js"></script>
    <script src="{{URL::to('/')}}/assets/js/popper.min.js"></script>
    <script src="{{URL::to('/')}}/assets/js/bootstrap.min.js"></script>
    <script src="{{URL::to('/')}}/assets/js/app.js"></script>
</body>


<!-- login23:12-->

</html>