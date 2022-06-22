@extends('layouts.login')

@section('content')
<div class="login-wrapper d-flex align-items-center justify-content-center">
    <div class="custom-container">
    <div class="text-center px-4"><img class="login-intro-img" src="img/bg-img/19.jpg" alt=""></div>
    <!-- Register Form -->
    <div class="register-form mt-4">
        <h6 class="mb-3 text-center">Log in to Budget Control.</h6>
        <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
            <input class="form-control @error('username') is-invalid @enderror" type="text" placeholder="Username" name="username" value="{{ old('username') }}" autofocus>
            @error('username')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group position-relative">
            <input class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" id="psw-input" type="password" placeholder="Enter Password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <div class="position-absolute" id="password-visibility"><i class="bi bi-eye"></i><i class="bi bi-eye-slash"></i></div>
        </div>
        <button class="btn btn-primary w-100" type="submit">Sign In</button>
        </form>
    </div>
    </div>
</div>
@endsection
