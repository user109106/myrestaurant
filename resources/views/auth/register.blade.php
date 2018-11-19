@extends('layouts.app_pages')

@section('content')
<?php $tab = 'register'; ?>
<div class="container">
    <div class="row center" style="padding:5%;margin:2%;">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="padding:10px;color:#421702;">{{ __('Please fill up this form to Register') }}</div>

                <div class="card-body" style="padding:25px;">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label style="font-size:15px;padding:0;" for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name :') }}</label>

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
                            <label style="font-size:15px;padding:0;" for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address :') }}</label>

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
                            <label style="font-size:15px;padding:0;" for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password :') }}</label>

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
                            <label style="font-size:15px;padding:0;" for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password :') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0" style="text-align:left;">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right"></label>
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" style="background:#421702;border:#421702">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
