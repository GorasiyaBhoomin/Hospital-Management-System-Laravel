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

                    @if($errors->any())
                        @foreach ($errors->all() as $error)
                            <p style="color:red">{{$error}}</p>
                        @endforeach
                    @endif

                    @if(Session::has('error'))
                        <p style="color:red">{{ Session::get('error')}}</p>
                    @endif
                    @if(Session::has('success'))
                        <p style="color:red">{{ Session::get('success')}}</p>
                    @endif
                    <form action="{{ route('forgetPassword') }}" method="POST">
                        @csrf
                        <div class="account-logo">
                            <a href=""><img src="/img/experts/logo.png" alt=""></a>
                        </div>
                        <div class="form-group">
                            <label> Email:</label>
                            <input type="email" name="email" placeholder="enter your email" class="form-control">
                            <span style="color:red">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>


                        <div class="form-group text-center">
                            <button type="submit" value="forgot pass" class="btn btn-primary account-btn">Login</button>
                        </div>
                        <p class="mt-3">
                            <a href="/kklogin123">Login</a>
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