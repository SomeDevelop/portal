<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script>
        window.auth = {!!auth()->user()!!}
    </script>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>edPORTAL</title>
    <!-- Scripts -->
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Anton|Passion+One|PT+Sans+Caption' rel='stylesheet' type='text/css'>
    <!-- Styles -->
    {{--    <link href="{{ asset('css/normalize.css') }}" rel="stylesheet">--}}

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">


    {{--<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.3.0/css/font-awesome.min.css" />--}}
    <?php if (preg_match('/publiccourses/',$_SERVER['REQUEST_URI'],$matches, PREG_OFFSET_CAPTURE) == 1 ||
    preg_match('/my_favorites/',$_SERVER['REQUEST_URI'],$matches, PREG_OFFSET_CAPTURE) == 1 ||
    preg_match('/my_favorite/',$_SERVER['REQUEST_URI'],$matches, PREG_OFFSET_CAPTURE) == 1

    ){?>
    <link href="{{ asset('css/demo.css') }}" rel="stylesheet">
    <link href="{{ asset('css/card.css') }}" rel="stylesheet">
    <link href="{{ asset('css/pattern.css') }}" rel="stylesheet">


    <? }?>

    <?php if (preg_match('/owner/',$_SERVER['REQUEST_URI'],$matches, PREG_OFFSET_CAPTURE) == 1 ||
            preg_match('/course_lessons/',$_SERVER['REQUEST_URI'],$matches, PREG_OFFSET_CAPTURE) == 1 ||
    preg_match('/lessons/',$_SERVER['REQUEST_URI'],$matches, PREG_OFFSET_CAPTURE) == 1
    ){?>
    <link href="{{ asset('css/owner.css') }}" rel="stylesheet">

    <? }?>

    <script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>

</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/home') }}">
                <img src="https://camo.githubusercontent.com/f2f5547663dd4286b279d319270607316d5af2cc/68747470733a2f2f63646e2e706272642e636f2f696d616765732f486477437574382e706e67" alt="" width="35" height="35">
                edPORTAL

            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->

                <div class="justify-content-center">
                    <ul class="nav">
                        {{--@if (!Auth::guest())--}}
                        {{--<li><a href="{{ route('posts.create') }}">New Article</a></li>--}}
                        @role('Admin')
                        <li><a class="nav-link" href="{{ route('admin') }}">{{__('messages.admin_panel')}}</a></li>
                        @endrole

                        @role('Owner')
                        <li><a class="nav-link" href="{{ route('owner_courses.index') }}">{{__('messages.teacher_panel')}}</a></li>
                        @endrole

                        @role('Student')
                        <li><a class="nav-link" href="{{ route('student') }}">{{__('messages.student_panel')}}</a></li>
                        @endrole
                    </ul>
                </div>
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item"><a class="nav-link" href="{{ route('language.locale', ['locale' => 'en']) }}">EN</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('language.locale', ['locale' => 'ua']) }}">UA</a></li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('messages.login') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('messages.register') }}</a>
                        </li>
                    @else
                        <li class="nav-item"><a class="nav-link" href="{{ route('language.locale', ['locale' => 'en']) }}">EN</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('language.locale', ['locale' => 'ua']) }}">UA</a></li>

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                @role('Student')
                                <a class="dropdown-item text-info" href="{{ url('my_favorites') }}">{{ __('messages.my_favorites') }}</a>
                                @endrole

                                @role('Owner')
                                <a class="dropdown-item text-info" href="{{ url('owner') }}">{{ __('messages.teacher_panel') }}</a>
                                @endrole

                                <a class="dropdown-item text-info" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('messages.logout') }}
                                </a>
                            </div>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">

        @yield('content')

    </main>
</div>
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="{{ asset('js/vendors/trianglify.min.js') }}" defer></script>
<script src="{{ asset('js/vendors/TweenMax.min.js') }}" defer></script>
<script src="{{ asset('js/vendors/ScrollToPlugin.min.js') }}" defer></script>
<script src="{{ asset('js/vendors/cash.min.js') }}" defer></script>
<script src="{{ asset('js/Card-polygon.js') }}" defer></script>
<script src="{{ asset('js/demo.js') }}" defer></script>
<?php if (preg_match('/owner/',$_SERVER['REQUEST_URI'],$matches, PREG_OFFSET_CAPTURE) == 1
){?>


<? }?>


<script>

    ClassicEditor
        .create( document.querySelector( '#summary-ckeditor' ) )
        .then( editor => {
            console.log( editor );
        } )
        .catch( error => {
            console.error( error );
        } );
</script>


</body>
</html>