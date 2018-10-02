<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>edPORTAL</title>
    <link rel="shortcut icon" href="/img/logo.png" type="image/png">

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

        a {
            text-decoration: none !important;
        }

        h5 {
            color: grey;
        }
    </style>
    <link rel="stylesheet" href="css/birds/main.css">
</head>
<body>
<div class=" col-md-8">
    <div id="container"></div>
</div>
<div class="flex-center position-ref full-height birds">


    @if (Route::has('login'))
        <div class="top-right links">

            @auth
                <a href="{{ route('language.locale', ['locale' => 'en']) }}">EN</a>
                <a href="{{ route('language.locale', ['locale' => 'ua']) }}">UA</a>
                <a href="{{ url('/publiccourses') }}">Home</a>

            @else


                <a href="{{ route('language.locale', ['locale' => 'en']) }}">EN</a>
                <a href="{{ route('language.locale', ['locale' => 'ua']) }}">UA</a>




                <a href="{{ route('login') }}">{{ __('messages.login') }}</a>
                <a href="{{ route('register') }}">{{ __('messages.register') }}</a>
            @endauth
        </div>
    @endif
    <div id="page-wrapper">
        <div class="content">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card card-default">
                        {{--<div class="card-header">Vue.JS SPA example</div>--}}
                        <div class="card-body">
                            <h1>{{__('messages.ed_portal')}}</h1>

                            <a href="{{ route('publiccourses') }}">
                                <img src="/img/logo.png" alt="WeCode">
                                <h5>{{__('messages.enter')}}</h5>
                            </a>
                            <h4>{{__('messages.welcome')}}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="js/birds/three.js"></script>

<script src="js/birds/Projector.js"></script>
<script src="js/birds/CanvasRenderer.js"></script>

<script src="js/birds/stats.min.js"></script>

<script src="js/birds/Bird.js"></script>

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
{{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"--}}
        {{--integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"--}}
        {{--crossorigin="anonymous"></script>--}}
<script src="js/birds/main.js"></script>
</body>

</html>
