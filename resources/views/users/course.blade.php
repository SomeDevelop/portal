@extends('layouts.app')

@section('content')

    <h1 class="text-center">{{$course->title}}</h1>
    <header class="codrops-header">

        <a style="font-size: 40px;" href="{{ url('my_favorites') }}" title="Back"><span><i
                        class="fa fa-arrow-circle-left" aria-hidden="true"></i></span>
        </a>
        <p>НАЗАД</p>


    </header>
    <main role="main">



        <!-- Marketing messaging and featurettes
        ================================================== -->
        <!-- Wrap the rest of the page in another container to center all the content. -->

        <div class="container marketing">



            <!-- START THE FEATURETTES -->

            <hr class="featurette-divider">
            <?php $i = 1?>
            @forelse($lessons as $lesson)
            <div class="row featurette">
                <div class="col-md-7">
                    <a href="{{route('course_lesson.lesson', $lesson->slug)}}"><h2 class="featurette-heading">Урок {!! $i++ !!}</h2></a>
                    <h5>{{ $lesson->title }}</h5>
                    <p class="lead">{{$lesson->description}}</p>
                </div>
                <div class="col-md-5">
                    <img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" alt="500x500" style="width: 200px; height: 200px;" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22500%22%20height%3D%22500%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20500%20500%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_165c3bb3757%20text%20%7B%20fill%3A%23AAAAAA%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A25pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_165c3bb3757%22%3E%3Crect%20width%3D%22500%22%20height%3D%22500%22%20fill%3D%22%23EEEEEE%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22185.140625%22%20y%3D%22260.996875%22%3E500x500%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true">
                </div>
            </div>

            <hr class="featurette-divider">
            @empty
                <p>В цьому курсі ще не має уроків</p>
            @endforelse




            <!-- /END THE FEATURETTES -->

        </div><!-- /.container -->


        <!-- FOOTER -->
        <footer class="container">
            <p class="float-right"><a href="#">Вгору <i class="fa fa-arrow-up" aria-hidden="true"></i></a></p>
            <p>©2018 edPortal · <a href="#">Bohdanovskyi</a> · </p>
        </footer>
    </main>
@endsection