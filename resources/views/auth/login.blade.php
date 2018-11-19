@extends('layouts.app_pages')

@section('content')
<?php $tab = 'login'; ?>
<div class="container">
    <div class="row center" style="padding:5%;margin:2%;">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="padding:10px;color:#421702;">{{ __('Login') }}</div>

                <div class="card-body" style="padding:15px;">
                    <form method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        @if($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                        @if($message = Session::get('warning'))
                            <div class="alert alert-warning">
                                <p>{{ $message }}</p>
                            </div>
                        @endif

                        <div class="form-group row">
                            <label style="font-size:15px;padding:0;" for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address :') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label style="font-size:15px;" for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password :') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row" style="text-align:left;">
                            <label for="" class="col-md-4 col-form-label text-md-right"></label>
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0" style="text-align: left;">
                            <div class="col-md-8 offset-md-4">
                                <a class="pull-left" style="width:250px;margin:5px 0px;" class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>

                                <button type="submit" class="btn btn-primary" style="background:#421702;border:#421702">
                                    {{ __('Login') }}
                                </button>

                            </div>
                        </div>
                    </form>
                    <p>Don't have an account? Please <a href="{{ route('register') }}" >Register</a> to proceed</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
