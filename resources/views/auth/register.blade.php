@extends('layouts.app')
@section('content')
<div class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
          <a href="{{url('/')}}"><b>RK </b>Blog</a>
        </div>
      
        <div class="card">
          <div class="card-body register-card-body">
            <p class="login-box-msg">Register a new membership</p>
      
            <form method="POST" action="{{ route('register') }}">
                @csrf
              <div class="input-group mb-3">
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror " placeholder="Full name" required value="{{old('name')}}" >
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-user"></span>
                  </div>
                </div>
                @error('name')
                    <span class="invalid-feedback" role="alert" >
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
              </div>
              <div class="input-group mb-3">
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" required value="{{old('email')}}">
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
                <input id="password" class="form-control @error('password') is-invalid @enderror " type="password" name="password" required autocomplete="new-password" value="{{old('password')}}" placeholder="Password" >
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
              <div class="input-group mb-3">
                <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Re-type Password"/>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-8">
                  <div class="icheck-primary">
                    <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                    <label for="agreeTerms">
                     I agree to the <a href="#">terms</a>
                    </label>
                  </div>
                </div>

                <div class="form-group{{ $errors->has('CapthaCode')? 'has-error' : ''}}" >
                  <label class="col-md-4 control-label">Captcha</label>

                  <div class="col-md-6" >
                    {!! captcha_image_html('ExampleCaptcha') !!}
                    <input class="form-control" type="text" id="CaptchaCode" name="CaptchaCode" />
                    @if($error->has('CaptchaCode'))
                    <span class="help-block" >
                      <strong>{{$errors->first('CaptchaCode')}}</strong>
                    </span>
                    @endif
                  </div>
                </div>

                <!-- /.col -->
                <div class="col-4">
                  <button type="submit" class="btn btn-primary btn-block">Register</button>
                </div>
                <!-- /.col -->
              </div>
            </form>
      
            <a href="{{route('login')}}" class="text-center">I already have a membership</a>
          </div>
          <!-- /.form-box -->
        </div><!-- /.card -->
      </div>
</div>
@endsection

{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
