<!doctype html>
<html lang="{{ app()->getLocale() }}">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>edPORTAL</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">


            @if (Route::has('login'))
                <div class="top-right links">

                    @auth
                        <a href="{{ route('language.locale', ['locale' => 'en']) }}">EN</a>
                        <a href="{{ route('language.locale', ['locale' => 'ua']) }}">UA</a>
                        <a href="{{ url('/home') }}">Home</a>

                    @else


                            <a href="{{ route('language.locale', ['locale' => 'en']) }}">EN</a>
                            <a href="{{ route('language.locale', ['locale' => 'ua']) }}">UA</a>




                        <a href="{{ route('login') }}">{{ __('messages.login') }}</a>
                        <a href="{{ route('register') }}">{{ __('messages.register') }}</a>
                    @endauth
                </div>
            @endif

            <div class="content">

                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card card-default">
                                {{--<div class="card-header">Vue.JS SPA example</div>--}}

                                <div class="card-body">
                                    <h1>{{__('messages.ed_portal')}}</h1>

                                    <a href="{{ route('login') }}">
                                        <img src="https://camo.githubusercontent.com/f2f5547663dd4286b279d319270607316d5af2cc/68747470733a2f2f63646e2e706272642e636f2f696d616765732f486477437574382e706e67" alt="WeCode">
                                    </a>
                                    <h4>{{__('messages.welcome')}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>

            </div>
        </div>
    </body>

</html>
