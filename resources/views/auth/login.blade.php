@extends('layouts.app')

@section('content')


<div class="container text-center">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                @csrf

                <img class="mb-1" src="https://camo.githubusercontent.com/f2f5547663dd4286b279d319270607316d5af2cc/68747470733a2f2f63646e2e706272642e636f2f696d616765732f486477437574382e706e67" alt="" width="72" height="72">
                <h1 class="h3 mb-3 font-weight-normal">{{ __('messages.please_sign_in') }}</h1>
                <label for="inputEmail" class="sr-only">{{ __('E-Mail Address') }}</label>
                <input type="email" id="inputEmail" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus placeholder="Email address">
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                @endif

                <label for="inputPassword" class="sr-only">{{ __('Password') }}</label>
                <input type="password" id="inputPassword" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Password">
                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                @endif

                <div class="checkbox mb-3">

                    <input class="form-check-input" type="checkbox" name="remember" id="remember1" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember1">
                        {{ __('messages.remember_me') }}
                    </label>
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit">{{ __('messages.login') }}</button>
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('messages.forgot_your_password') }}
                </a>
                <p class="mt-5 mb-3 text-muted">Bohdanovskyi©2018</p>

            </form>
        </div>
    </div>
</div>

@endsection
