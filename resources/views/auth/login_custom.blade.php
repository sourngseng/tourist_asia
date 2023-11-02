<div class="card-body login-card-body">
    {{-- <p class="login-box-msg">Sign in to start your session</p> --}}

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}"
                required autocomplete="email" autofocus>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
            </div>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" name="password" required
                autocomplete="current-password">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-8">
                <div class="icheck-primary">
                    <input type="checkbox" id="remember" name="remember" id="remember" {{ old('remember') ? 'checked'
                        : '' }}>
                    <label for="remember">
                        {{ trans('global.remember_me') }}
                    </label>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block">{{ trans('global.login') }}</button>
            </div>
            <!-- /.col -->
        </div>
    </form>

    <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
            <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
            <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
    </div>
    <!-- /.social-auth-links -->

    <p class="mb-1">
        <a class="btn btn-block btn-primary" href="{{ route('password.request') }}">{{ trans('global.forgot_password')
            }}</a>
    </p>
    <p class="mb-0">
        <a class="btn btn-block btn-primary" href="{{ route('register') }}" class="text-center">{{
            trans('global.register') }}</a>
    </p>
</div>