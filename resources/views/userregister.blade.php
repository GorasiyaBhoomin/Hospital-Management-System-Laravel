@include('user.partials.header', ['title' => 'User Registration - KK Patel Hospital'])

<div class="user-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-8">
                <div class="box_card">
                    <h4 class="text-center">Create Patient Account</h4>

                    @if (session('error'))
                        <p style="color:red">{{ session('error') }}</p>
                    @endif

                    <form action="{{ url('user/register') }}" method="POST" class="user_form">
                        @csrf
                        <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter your name"
                                value="{{ old('name') }}">
                            <span style="color:red">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter your email"
                                value="{{ old('email') }}">
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

                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control"
                                placeholder="Re-enter your password">
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn"
                                style="background:#223a66;color:#fff;width:100%;">Register</button>
                        </div>

                        <p class="text-center" style="margin:0;">
                            Already have an account? <a href="{{ url('user/login') }}">Login here</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@include('user.partials.footer')
