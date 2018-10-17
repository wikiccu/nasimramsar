@extends('layouts.admin')

@section('content')


<div class="register-box">
        <div class="register-logo">
                <a href="{{url('/')}}"><b>موسسه</b>نسیم رامسر</a>
        </div>

        <div class="register-box-body">
                <p class="login-box-msg">عضویت در سایت</p>

        <form action="{{ route('register') }}" method="post">
            @csrf

            <div class="form-group has-feedback">
                <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" name="name"  placeholder="نام کامل" type="text" value="{{ old('name') }}" required autofocus>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                @if ($errors->has('name'))
                    <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group has-feedback">
                <input class="form-control{{ $errors->has('mobile') ? ' is-invalid' : '' }}" placeholder="شماره موبایل" type="tel" id="mobile" name="mobile" value="{{ old('mobile') }}" required>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                @if ($errors->has('mobile'))
                    <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $errors->first('mobile') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group has-feedback">
                <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" name="email" placeholder="ایمیل" type="email" value="{{ old('email') }}" required>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group has-feedback">
                <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" name="password" placeholder="کلمه رمز" type="password" required>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group has-feedback">
                <input class="form-control" id="password-confirm" name="password_confirmation" placeholder="تکرار کلمه رمز" type="password" required>
                <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
            </div>

            <div class="col-md-6 pull-right">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" checked="checked" readonly="readonly">

                    <label class="form-check-label" for="remember">
                         با قوانین سایت موافقم.
                    </label>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-4 pull-left">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">عضویت</button>
                </div>
            </div>
        </form>

          <a href="{{ route('login') }}" class="text-center">عضو سایت هستم</a>
        </div>
        <!-- /.form-box -->
      </div>


{{--
  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="mobile" class="col-md-4 col-form-label text-md-right">{{ __('Mobile Number') }}</label>

                            <div class="col-md-6">
                                <input id="mobile" type="text" class="form-control{{ $errors->has('mobile') ? ' is-invalid' : '' }}" name="mobile" value="{{ old('mobile') }}" required>

                                @if ($errors->has('mobile'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>  --}}
@endsection
