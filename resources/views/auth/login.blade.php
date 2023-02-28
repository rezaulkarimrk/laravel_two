@extends('layouts.app')
@section('content')
<div class="hold-transition login-page" >
    <div class="login-box">
        <div class="login-logo">
          <a href="{{url('/')}}"><b>Admin</b>LTE</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
          <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to start your session</p>
      
            <form method="POST" action="{{ route('login') }}">
                @csrf
              <div class="input-group mb-3">
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror " placeholder="Email" value="{{old('email')}}" required autofocus autocomplete="username" >
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                  </div>
                </div>
                @error('email')
                    <span class="invalid-feedback" role="alert" >
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
              </div>
              <div class="input-group mb-3">
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror " placeholder="Password" required>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
                @error('password')
                    <span class="invalid-feedback" role="alert" >
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
              </div>
              <div class="row">
                <div class="col-8">
                  <div class="icheck-primary">
                    {{-- <input type="checkbox" id="remember"> --}}
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                  </div>
                </div>
                <!-- /.col -->
                <div class="col-4">
                  <button type="submit" class="btn btn-primary btn-block">Sign In</button>
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
              <a href="{{ route('password.request') }}">I forgot my password</a>
            </p>
            <p class="mb-0">
              <a href="{{route('register')}}" class="text-center">Register a new membership</a>
            </p>
          </div>
          <!-- /.login-card-body -->
        </div>
    </div>
</div>

@endsection