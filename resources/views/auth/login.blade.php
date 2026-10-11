@extends('layouts.site')

@section('title', 'Login')

@section('content')
<section class="section auth-section bg-gray">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7">
                <div class="auth-card bg-white">
                    <div class="text-center mb-4">
                        <h2 class="mb-2">Welcome back</h2>
                        <p class="text-muted mb-0">Log in to manage your blog content.</p>
                    </div>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input id="email" type="email"
                                class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}"
                                placeholder="you@example.com" autocomplete="email" autofocus required>
                            @error('email')
                                <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror"
                                name="password" placeholder="Enter your password"
                                autocomplete="current-password" required>
                            @error('password')
                                <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
                            <div class="form-check mb-0">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">Remember me</label>
                            </div>
                            @if (Route::has('password.request'))
                                <a class="small" href="{{ route('password.request') }}">Forgot password?</a>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-main btn-round-full btn-block">
                            Login <i class="fas fa-arrow-right ml-2"></i>
                        </button>
                    </form>

                    <p class="text-center text-muted mt-4 mb-0">
                        Don’t have an account?
                        <a href="{{ route('register') }}">Create one</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('style')
<style>
    .auth-section { min-height: 70vh; display: flex; align-items: center; padding: 80px 0; }
    .auth-card { border-radius: 10px; padding: 40px 32px; box-shadow: 0 8px 30px rgba(0,0,0,.06); }
    .auth-card label { font-weight: 600; color: #333; }
    .auth-card .form-control { min-height: 46px; border-radius: 6px; }
    .auth-card .btn-block { width: 100%; }
    @media (max-width: 575px) {
        .auth-card { padding: 28px 20px; }
        .auth-section { padding: 50px 0; }
    }
</style>
@endpush
