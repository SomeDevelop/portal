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
    <link href='https://fonts.googleapis.com/css?family=Anton|Passion+One|PT+Sans+Caption' rel='stylesheet'
          type='text/css'>
    <!-- Styles -->
    <link href="{{ asset('css/normalize.css') }}" rel="stylesheet">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    {{--<script--}}
    {{--src="https://code.jquery.com/jquery-3.3.1.min.js"--}}
    {{--integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="--}}
    {{--crossorigin="anonymous"></script>--}}

    <?php if (preg_match('/owner/', $_SERVER['REQUEST_URI'], $matches, PREG_OFFSET_CAPTURE) == 1 ||
    preg_match('/owner_courses/', $_SERVER['REQUEST_URI'], $matches, PREG_OFFSET_CAPTURE) == 1 ||

    preg_match('/course_lessons/', $_SERVER['REQUEST_URI'], $matches, PREG_OFFSET_CAPTURE) == 1 ||
    preg_match('/lessons/', $_SERVER['REQUEST_URI'], $matches, PREG_OFFSET_CAPTURE) == 1
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
    {{--<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">--}}
    {{--<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">--}}

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    {{--<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">--}}
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>--}}
    {{--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>--}}

    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">


    <link href="{{ asset('css/demo.css') }}" rel="stylesheet">
    <link href="{{ asset('css/card.css') }}" rel="stylesheet">
    <link href="{{ asset('css/pattern.css') }}" rel="stylesheet">
    <link href="{{ asset('css/icons.css') }}" rel="stylesheet">


    <link href="{{ asset('css/menu.css') }}" rel="stylesheet">


    <link rel="stylesheet" href="{{asset('css/birds/main.css')}}">
</head>
<body>
<svg xmlns="http://www.w3.org/2000/svg" version="1.1" class="filters hidden">
    <defs>
        <filter id="blur" x="-20%" y="0" width="140%" height="100%">
            <feGaussianBlur in="SourceGraphic" stdDeviation="0,0"/>
        </filter>
    </defs>
</svg>

<div id="app">
    <div class=" col-md-8">
        <div id="container"></div>
    </div>
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel biirds">
        <div class="container">

            <a class="navbar-brand" href="{{ route('main') }}">
                <img class="bg-white rounded-circle" src="/img/logo1.png" alt="" width="35" height="35">
                edPORTAL

            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
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
                        <li><a class="nav-link"
                               href="{{ route('owner_courses.index') }}">{{__('messages.teacher_panel')}}</a></li>
                        @endrole

                        @role('Student')
                        <li><a class="nav-link" href="{{ route('student') }}">{{__('messages.student_panel')}}</a></li>
                        @if(auth()->user()->can('Create'))

                        @else
                            <li><a class="nav-link" href="{{ route('become') }}">{{__('messages.become a teacher')}}</a>
                            </li>

                        @endif

                        @endrole

                        @role('Moderator')
                        <li><a class="nav-link" href="{{route('new-courses')}}">{{__('messages.moderator_panel')}}</a>
                        </li>
                        @endrole
                    </ul>
                </div>
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item"><a class="nav-link"
                                                href="{{ route('language.locale', ['locale' => 'en']) }}">EN</a></li>
                        <li class="nav-item"><a class="nav-link"
                                                href="{{ route('language.locale', ['locale' => 'ua']) }}">UA</a></li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('messages.login') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('messages.register') }}</a>
                        </li>
                    @else
                        <li class="nav-item"><a class="nav-link"
                                                href="{{ route('language.locale', ['locale' => 'en']) }}">EN</a></li>
                        <li class="nav-item"><a class="nav-link"
                                                href="{{ route('language.locale', ['locale' => 'ua']) }}">UA</a></li>

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item text-info"
                                   href="{{route('profile')}}">{{ __('messages.Profile') }}</a>


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
            {{--<a href="#" class="menu-item">--}}
                {{--<span class="js-blur">{{ __('messages.Students') }}</span>--}}
            {{--</a>--}}
            @if (!Auth::guest())
                <a href="{{ route('chat') }}" class="menu-item">
                    <span class="js-blur">Messenger (Pre-Alpha)</span>
                </a>
            @endif
            {{--<a href="#" class="menu-item">--}}
            {{--<span class="js-blur">{{ __('messages.about') }}</span>--}}
            {{--</a>--}}
        </nav>
    </div>
    <button class="menu-toggle"><span>Open Menu</span></button>

</div>


<script src="{{ asset('js/app.js') }}" defer></script>


{{--<script src="{{ asset('js/vendors/trianglify.min.js') }}" defer></script>--}}
<script src="{{ asset('js/vendors/TweenMax.min.js') }}" defer></script>
{{--<script src="{{ asset('js/vendors/ScrollToPlugin.min.js') }}" defer></script>--}}


<?php if (preg_match('/publiccourses/', $_SERVER['REQUEST_URI'], $matches, PREG_OFFSET_CAPTURE) == 1 ||
preg_match('/category/', $_SERVER['REQUEST_URI'], $matches, PREG_OFFSET_CAPTURE) == 1 ||
preg_match('/show_course/', $_SERVER['REQUEST_URI'], $matches, PREG_OFFSET_CAPTURE) == 1

){?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

{{--<script src="{{ asset('js/vendors/cash.min.js') }}" defer></script>--}}
{{--<script src="{{ asset('js/mo.min.js') }}" defer></script>--}}
{{--<script src="{{ asset('js/Card-polygon.js') }}" defer></script>--}}
{{--<script src="{{ asset('js/demo-2.js') }}" defer></script>--}}
{{--<script src="{{ asset('js/like.js') }}" defer></script>--}}

<script type="text/javascript">
    $(document).ready(function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('i.glyphicon-thumbs-up, i.glyphicon-thumbs-down').click(function () {
            console.log('click');
            var id = $(this).parents(".post").data('id');
            console.log(id);
            var c = $('#' + this.id + '-bs3').html();
            console.log('C => ' + c);


            var cObjId = this.id;
            var cObj = $(this);
            // console.log(cObjId);
            // console.log(" ");
            // console.log(cObj);


            $.ajax({
                type: 'POST',
                url: '/ajaxRequest',
                data: {id: id},
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
        $(document).delegate('*[data-toggle="lightbox"]', 'click', function (event) {
            event.preventDefault();
            $(this).ekkoLightbox();
            console.log('ok');

        });
    });
</script>
<? }?>
<script src="{{ asset('js/motionblur.js') }}" defer></script>
<script src="{{ asset('js/menu.js') }}" defer></script>
<script src="{{ asset('js/birds/three.js') }}"></script>
<script src="{{ asset('js/birds/Projector.js') }}"></script>
<script src="{{ asset('js/birds/CanvasRenderer.js') }}"></script>
<script src="{{ asset('js/birds/stats.min.js') }}"></script>
<script src="{{ asset('js/birds/Bird.js') }}"></script>


<script>

    // Based on http://www.openprocessing.org/visuals/?visualID=6910

    var Boid = function () {

        var vector = new THREE.Vector3(),
            _acceleration, _width = 500, _height = 500, _depth = 200, _goal, _neighborhoodRadius = 100,
            _maxSpeed = 4, _maxSteerForce = 0.1, _avoidWalls = false;

        this.position = new THREE.Vector3();
        this.velocity = new THREE.Vector3();
        _acceleration = new THREE.Vector3();

        this.setGoal = function (target) {

            _goal = target;

        };

        this.setAvoidWalls = function (value) {

            _avoidWalls = value;

        };

        this.setWorldSize = function (width, height, depth) {

            _width = width;
            _height = height;
            _depth = depth;

        };

        this.run = function (boids) {

            if (_avoidWalls) {

                vector.set(-_width, this.position.y, this.position.z);
                vector = this.avoid(vector);
                vector.multiplyScalar(5);
                _acceleration.add(vector);

                vector.set(_width, this.position.y, this.position.z);
                vector = this.avoid(vector);
                vector.multiplyScalar(5);
                _acceleration.add(vector);

                vector.set(this.position.x, -_height, this.position.z);
                vector = this.avoid(vector);
                vector.multiplyScalar(5);
                _acceleration.add(vector);

                vector.set(this.position.x, _height, this.position.z);
                vector = this.avoid(vector);
                vector.multiplyScalar(5);
                _acceleration.add(vector);

                vector.set(this.position.x, this.position.y, -_depth);
                vector = this.avoid(vector);
                vector.multiplyScalar(5);
                _acceleration.add(vector);

                vector.set(this.position.x, this.position.y, _depth);
                vector = this.avoid(vector);
                vector.multiplyScalar(5);
                _acceleration.add(vector);

            }
            /* else {

                                    this.checkBounds();

                                }
                                */

            if (Math.random() > 0.5) {

                this.flock(boids);

            }

            this.move();

        };

        this.flock = function (boids) {

            if (_goal) {

                _acceleration.add(this.reach(_goal, 0.005));

            }

            _acceleration.add(this.alignment(boids));
            _acceleration.add(this.cohesion(boids));
            _acceleration.add(this.separation(boids));

        };

        this.move = function () {

            this.velocity.add(_acceleration);

            var l = this.velocity.length();

            if (l > _maxSpeed) {

                this.velocity.divideScalar(l / _maxSpeed);

            }

            this.position.add(this.velocity);
            _acceleration.set(0, 0, 0);

        };

        this.checkBounds = function () {

            if (this.position.x > _width) this.position.x = -_width;
            if (this.position.x < -_width) this.position.x = _width;
            if (this.position.y > _height) this.position.y = -_height;
            if (this.position.y < -_height) this.position.y = _height;
            if (this.position.z > _depth) this.position.z = -_depth;
            if (this.position.z < -_depth) this.position.z = _depth;

        };

        //

        this.avoid = function (target) {

            var steer = new THREE.Vector3();

            steer.copy(this.position);
            steer.sub(target);

            steer.multiplyScalar(1 / this.position.distanceToSquared(target));

            return steer;

        };

        this.repulse = function (target) {

            var distance = this.position.distanceTo(target);

            if (distance < 150) {

                var steer = new THREE.Vector3();

                steer.subVectors(this.position, target);
                steer.multiplyScalar(0.5 / distance);

                _acceleration.add(steer);

            }

        };

        this.reach = function (target, amount) {

            var steer = new THREE.Vector3();

            steer.subVectors(target, this.position);
            steer.multiplyScalar(amount);

            return steer;

        };

        this.alignment = function (boids) {

            var count = 0;
            var velSum = new THREE.Vector3();

            for (var i = 0, il = boids.length; i < il; i++) {

                if (Math.random() > 0.6) continue;

                var boid = boids[i];
                var distance = boid.position.distanceTo(this.position);

                if (distance > 0 && distance <= _neighborhoodRadius) {

                    velSum.add(boid.velocity);
                    count++;

                }

            }

            if (count > 0) {

                velSum.divideScalar(count);

                var l = velSum.length();

                if (l > _maxSteerForce) {

                    velSum.divideScalar(l / _maxSteerForce);

                }

            }

            return velSum;

        };

        this.cohesion = function (boids) {

            var count = 0;
            var posSum = new THREE.Vector3();
            var steer = new THREE.Vector3();

            for (var i = 0, il = boids.length; i < il; i++) {

                if (Math.random() > 0.6) continue;

                var boid = boids[i];
                var distance = boid.position.distanceTo(this.position);

                if (distance > 0 && distance <= _neighborhoodRadius) {

                    posSum.add(boid.position);
                    count++;

                }

            }

            if (count > 0) {

                posSum.divideScalar(count);

            }

            steer.subVectors(posSum, this.position);

            var l = steer.length();

            if (l > _maxSteerForce) {

                steer.divideScalar(l / _maxSteerForce);

            }

            return steer;

        };

        this.separation = function (boids) {

            var posSum = new THREE.Vector3();
            var repulse = new THREE.Vector3();

            for (var i = 0, il = boids.length; i < il; i++) {

                if (Math.random() > 0.6) continue;

                var boid = boids[i];
                var distance = boid.position.distanceTo(this.position);

                if (distance > 0 && distance <= _neighborhoodRadius) {

                    repulse.subVectors(this.position, boid.position);
                    repulse.normalize();
                    repulse.divideScalar(distance);
                    posSum.add(repulse);

                }

            }

            return posSum;

        }

    }

</script>

<script>

    var SCREEN_WIDTH = window.innerWidth,
        SCREEN_HEIGHT = window.innerHeight,
        SCREEN_WIDTH_HALF = SCREEN_WIDTH / 2,
        SCREEN_HEIGHT_HALF = SCREEN_HEIGHT / 2;

    var camera, scene, renderer,
        birds, bird;

    var boid, boids;

    var stats;

    init();
    animate();

    function init() {

        camera = new THREE.PerspectiveCamera(75, SCREEN_WIDTH / SCREEN_HEIGHT, 1, 10000);
        camera.position.z = 450;

        scene = new THREE.Scene();
        scene.background = new THREE.Color(0xffffff);

        birds = [];
        boids = [];

        for (var i = 0; i < 100; i++) {

            boid = boids[i] = new Boid();
            boid.position.x = Math.random() * 400 - 200;
            boid.position.y = Math.random() * 400 - 200;
            boid.position.z = Math.random() * 400 - 200;
            boid.velocity.x = Math.random() * 2 - 1;
            boid.velocity.y = Math.random() * 2 - 1;
            boid.velocity.z = Math.random() * 2 - 1;
            boid.setAvoidWalls(true);
            boid.setWorldSize(500, 500, 400);

            bird = birds[i] = new THREE.Mesh(new Bird(), new THREE.MeshBasicMaterial({
                color: Math.random() * 0xffffff,
                side: THREE.DoubleSide
            }));
            bird.phase = Math.floor(Math.random() * 62.83);
            scene.add(bird);


        }

        renderer = new THREE.CanvasRenderer();
        renderer.setPixelRatio(window.devicePixelRatio);
        renderer.setSize(SCREEN_WIDTH, SCREEN_HEIGHT);

        document.addEventListener('mousemove', onDocumentMouseMove, false);
        document.body.appendChild(renderer.domElement);

        stats = new Stats();
        document.getElementById('container').appendChild(stats.dom);

        //

        window.addEventListener('resize', onWindowResize, false);

    }

    function onWindowResize() {

        camera.aspect = window.innerWidth / window.innerHeight;
        camera.updateProjectionMatrix();

        renderer.setSize(window.innerWidth, window.innerHeight);

    }

    function onDocumentMouseMove(event) {

        var vector = new THREE.Vector3(event.clientX - SCREEN_WIDTH_HALF, -event.clientY + SCREEN_HEIGHT_HALF, 0);

        for (var i = 0, il = boids.length; i < il; i++) {

            boid = boids[i];

            vector.z = boid.position.z;

            boid.repulse(vector);

        }

    }

    //

    function animate() {

        requestAnimationFrame(animate);

        stats.begin();
        render();
        stats.end();

    }

    function render() {

        for (var i = 0, il = birds.length; i < il; i++) {

            boid = boids[i];
            boid.run(boids);

            bird = birds[i];
            bird.position.copy(boids[i].position);

            var color = bird.material.color;
            color.r = color.g = color.b = (500 - bird.position.z) / 1000;

            bird.rotation.y = Math.atan2(-boid.velocity.z, boid.velocity.x);
            bird.rotation.z = Math.asin(boid.velocity.y / boid.velocity.length());

            bird.phase = (bird.phase + (Math.max(0, bird.rotation.z) + 0.1)) % 62.83;
            bird.geometry.vertices[5].y = bird.geometry.vertices[4].y = Math.sin(bird.phase) * 5;

        }

        renderer.render(scene, camera);

    }

</script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"
        integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
        crossorigin="anonymous"></script>

<script src="{{ asset('js/birds/main.js') }}"></script>

</body>
</html>
