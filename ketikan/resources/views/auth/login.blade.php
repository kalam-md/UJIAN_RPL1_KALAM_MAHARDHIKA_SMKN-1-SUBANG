@extends('layouts.app_login')

@section('title', 'Login')

@section('content')
<div class="page-header header-filter" style="background-image: url('/assets/img/profile_city.jpg'); background-size: cover; background-position: top center;">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-md-6 ml-auto mr-auto">
        <div class="card card-login">
          <form class="form" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="card-header card-header-primary text-center">
              <h4 class="card-title">Login</h4>
            </div>
            <p class="description text-center">Login untuk masuk ke aplikasi</p>
            <div class="card-body">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">mail</i>
                  </span>
                </div>
                <input id="email" type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" autofocus placeholder="Email">
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
              </div>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">lock_outline</i>
                  </span>
                </div>
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password">
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-primary mt-4">Login</button>
              </div>
              <div class="text-center">
              @if (Route::has('password.request'))
                  <a class="btn btn-primary btn-link btn-wd btn-sm" href="{{ route('password.request') }}">
                      {{ __('Lupa Password?') }}
                  </a>
              @endif
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection