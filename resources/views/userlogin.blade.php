@include('user.partials.header', ['title' => 'User Login - KK Patel Hospital'])

<div class="user-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-8">
                <div class="box_card">
                    <h4 class="text-center">Patient Login</h4>

                    @if (session('success'))
                        <p style="color:green">{{ session('success') }}</p>
                    @endif
                    @if (session('error'))
                        <p style="color:red">{{ session('error') }}</p>
                    @endif

                    <form action="{{ url('user/login') }}" method="POST" class="user_form">
                        @csrf
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" autofocus
                                placeholder="Enter your email" value="{{ old('email') }}">
                            <span style="color:red">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control"
                                placeholder="Enter your password">
                            <span style="color:red">
                                @error('password')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn"
                                style="background:#223a66;color:#fff;width:100%;">Login</button>
                        </div>

                        <p class="text-center" style="margin:0;">
                            Don't have an account? <a href="{{ url('user/register') }}">Register here</a>
                        </p>
                        <p class="text-center" style="margin:6px 0 0;">
                            <a href="{{ url('forget-password') }}">Forgot Password?</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@include('user.partials.footer')
