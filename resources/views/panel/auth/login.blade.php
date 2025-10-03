<x-kit.auth>

    <x-slot name="title">Admin Login</x-slot>

    <div class="container d-flex align-items-center justify-content-center">
        <div class="row w-100">
            <div class="col-sm-6 offset-sm-3">

                <div class="text-center mb-3">
                    <span class="fa-stack fa-3x">
                        <i class="fa-solid fa-circle fa-stack-2x"></i>
                        <i class="fa-solid fa-user-gear fa-stack-1x text-dark fa-inverse"></i>
                    </span>
                    <h4 class="display-5">Welcome Back Sir</h4>
                    <p class="text-muted">You can continue from where you left off...</p>
                </div>

                <div class="card">
                    <div class="card-body">

                        <form method="post" action="{{ route('panel.login.post') }}">

                            @csrf

                            <div class="mb-3">
                                <label for="email" class="col-form-label fw-bold text-md-end">Email Address</label>
                                <input id="email" type="email" class="form-control input-bottom @error('email') is-invalid @enderror"
                                       placeholder="Enter your email address" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="col-form-label fw-bold text-md-end">Password</label>
                                <input id="password" type="password" class="form-control input-bottom @error('password') is-invalid @enderror"
                                       placeholder="Enter your password" name="password" required autocomplete="current-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">Remember Me</label>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-success">Let Me In</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-kit.auth>
