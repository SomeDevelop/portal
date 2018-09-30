<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script>
        window.auth = {!!auth()->user()!!}
    </script>
    <link rel="shortcut icon" href="/img/logo.png" type="image/png">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}"/>

    <title>edPORTAL</title>
    <!-- Scripts -->
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Anton|Passion+One|PT+Sans+Caption' rel='stylesheet' type='text/css'>
    <!-- Styles -->
        <link href="{{ asset('css/normalize.css') }}" rel="stylesheet">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    {{--<script--}}
            {{--src="https://code.jquery.com/jquery-3.3.1.min.js"--}}
            {{--integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="--}}
            {{--crossorigin="anonymous"></script>--}}

    <?php if (preg_match('/owner/',$_SERVER['REQUEST_URI'],$matches, PREG_OFFSET_CAPTURE) == 1 ||
    preg_match('/owner_courses/',$_SERVER['REQUEST_URI'],$matches, PREG_OFFSET_CAPTURE) == 1 ||

    preg_match('/course_lessons/',$_SERVER['REQUEST_URI'],$matches, PREG_OFFSET_CAPTURE) == 1 ||
    preg_match('/lessons/',$_SERVER['REQUEST_URI'],$matches, PREG_OFFSET_CAPTURE) == 1
    ){?>

    <link href="{{ asset('css/owner.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">--}}
    {{--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>--}}
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>--}}
    {{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>--}}
    {{--<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">--}}
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>--}}

<? }?>


    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    {{--<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">--}}
    {{--<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">--}}
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>--}}
    {{--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>--}}

    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">


    <?php if (preg_match('/publiccourses/',$_SERVER['REQUEST_URI'],$matches, PREG_OFFSET_CAPTURE) == 1 ||
    preg_match('/course/',$_SERVER['REQUEST_URI'],$matches, PREG_OFFSET_CAPTURE) == 1 ||
    preg_match('/course_lesson/',$_SERVER['REQUEST_URI'],$matches, PREG_OFFSET_CAPTURE) == 1 ||
    preg_match('/moderator/',$_SERVER['REQUEST_URI'],$matches, PREG_OFFSET_CAPTURE) == 1 ||
        preg_match('/category/',$_SERVER['REQUEST_URI'],$matches, PREG_OFFSET_CAPTURE) == 1 ||
    preg_match('/home/',$_SERVER['REQUEST_URI'],$matches, PREG_OFFSET_CAPTURE) == 1 ||
//    preg_match('/chat/',$_SERVER['REQUEST_URI'],$matches, PREG_OFFSET_CAPTURE) == 1 ||


    preg_match('/student/',$_SERVER['REQUEST_URI'],$matches, PREG_OFFSET_CAPTURE) == 1

    ){?>
    <link href="{{ asset('css/demo.css') }}" rel="stylesheet">
    <link href="{{ asset('css/card.css') }}" rel="stylesheet">
    <link href="{{ asset('css/pattern.css') }}" rel="stylesheet">
    <link href="{{ asset('css/icons.css') }}" rel="stylesheet">



<? }?>

    <link href="{{ asset('css/menu.css') }}" rel="stylesheet">




</head>
<body>
<svg xmlns="http://www.w3.org/2000/svg" version="1.1" class="filters hidden">
    <defs>
        <filter id="blur" x="-20%" y="0" width="140%" height="100%">
            <feGaussianBlur in="SourceGraphic" stdDeviation="0,0" />
        </filter>
    </defs>
</svg>
<div id="app">

    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container">

            <a class="navbar-brand" href="{{ route('main') }}">
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
                        <li><a class="nav-link" href="{{ route('student') }}">{{__('messages.become a teacher')}}</a></li>

                        @endrole

                        @role('Moderator')
                        <li><a class="nav-link" href="{{ route('moderator') }}">{{__('messages.moderator_panel')}}</a></li>
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
                                <a class="dropdown-item text-info" href="{{route('profile')}}">{{ __('messages.Profile') }}</a>



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
        <div class="menu">
            <div class="menu-bg js-blur"></div>
            <nav class="menu-items">
                <a href="{{route('publiccourses')}}" class="menu-item">
                    <span class="js-blur">{{ __('messages.Courses') }}</span>
                </a>
                <a href="{{route('publiccourses')}}" class="menu-item">
                <span class="js-blur">{{ __('messages.Categories') }}</span>
                </a>
                <a href="{{route('authors')}}" class="menu-item">
                    <span class="js-blur">{{ __('messages.teachers') }}</span>
                </a>
                <a href="#" class="menu-item">
                    <span class="js-blur">{{ __('messages.Students') }}</span>
                </a>
                @if (!Auth::guest())
                <a href="{{ route('chat') }}" class="menu-item">
                    <span class="js-blur">Messenger (Pre-Alpha)</span>
                </a>
                @endif
                <a href="#" class="menu-item">
                    <span class="js-blur">{{ __('messages.about') }}</span>
                </a>
            </nav>
        </div>
        <button class="menu-toggle"><span>Open Menu</span></button>

    </main>
    <?php if (preg_match('/home/',$_SERVER['REQUEST_URI'],$matches, PREG_OFFSET_CAPTURE) != 1
    ){?>

    <hr>
    <footer class="container">
        <p class="float-right"><a href="#">Вгору <i class="fa fa-arrow-up" aria-hidden="true"></i></a></p>
        <p>©2018 edPortal · <a href="#">Bohdanovskyi</a> · </p>
    </footer>
    <? }?>

</div>


<script src="{{ asset('js/app.js') }}" defer></script>


<?php if (preg_match('/owner/',$_SERVER['REQUEST_URI'],$matches, PREG_OFFSET_CAPTURE) == 1 ||
preg_match('/owner_courses/',$_SERVER['REQUEST_URI'],$matches, PREG_OFFSET_CAPTURE) == 1 ||
preg_match('/course_lessons/',$_SERVER['REQUEST_URI'],$matches, PREG_OFFSET_CAPTURE) == 1 ||
preg_match('/lessons/',$_SERVER['REQUEST_URI'],$matches, PREG_OFFSET_CAPTURE) == 1
){?>

{{--<script>--}}
    {{--var $ = jQuery.noConflict();--}}
    {{--$jq('#summernote').summernote({--}}
        {{--placeholder: 'Hello bootstrap 4',--}}
        {{--tabsize: 2,--}}
        {{--height: 100--}}
    {{--});--}}
{{--</script>--}}
<? }?>


{{--<script src="{{ asset('js/vendors/trianglify.min.js') }}" defer></script>--}}
<script src="{{ asset('js/vendors/TweenMax.min.js') }}" defer></script>
{{--<script src="{{ asset('js/vendors/ScrollToPlugin.min.js') }}" defer></script>--}}


<?php if (preg_match('/publiccourses/',$_SERVER['REQUEST_URI'],$matches, PREG_OFFSET_CAPTURE) == 1 ||
preg_match('/category/',$_SERVER['REQUEST_URI'],$matches, PREG_OFFSET_CAPTURE) == 1 ||
preg_match('/show_course/',$_SERVER['REQUEST_URI'],$matches, PREG_OFFSET_CAPTURE) == 1

){?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

{{--<script src="{{ asset('js/vendors/cash.min.js') }}" defer></script>--}}
{{--<script src="{{ asset('js/mo.min.js') }}" defer></script>--}}
{{--<script src="{{ asset('js/Card-polygon.js') }}" defer></script>--}}
{{--<script src="{{ asset('js/demo-2.js') }}" defer></script>--}}
{{--<script src="{{ asset('js/like.js') }}" defer></script>--}}

<script type="text/javascript">
    $(document).ready(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('i.glyphicon-thumbs-up, i.glyphicon-thumbs-down').click(function(){
            console.log('click');
            var id = $(this).parents(".post").data('id');
            console.log(id);
            var c = $('#'+this.id+'-bs3').html();
            console.log('C => '+c);


            var cObjId = this.id;
            var cObj = $(this);
            // console.log(cObjId);
            // console.log(" ");
            // console.log(cObj);



            $.ajax({
                type:'POST',
                url:'/ajaxRequest',
                data:{id:id},
                success: function (data) {
                    if (jQuery.isEmptyObject(data.success.attached)) {
                        $('#' + cObjId + '-bs3').html(parseInt(c) - 1);
                        // console.log('#' + cObjId + '-bs3');
                        $(cObj).removeClass("like-course");
                    } else {
                        $('#' + cObjId + '-bs3').html(parseInt(c) + 1);
                        // console.log('#' + cObjId + '-bs3');

                        $(cObj).addClass("like-course");

                    }
                }
            });
        });
        $(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox();
            console.log('ok');

        });
    });
</script>
<? }?>
<script src="{{ asset('js/motionblur.js') }}" defer></script>
<script src="{{ asset('js/menu.js') }}" defer></script>
</body>
</html>