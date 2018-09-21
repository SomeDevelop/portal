@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="container">
            <div class="page-header">

                <header class="codrops-header">
                    <h3 class="text-center">{{$course->title}}</h3>
                    <div>
                        <a style="font-size: 40px;" href="{{route('student')}}" title="Back"><span><i
                                        class="fa fa-arrow-circle-left" aria-hidden="true"></i></span>

                        </a>
                        <p>НАЗАД</p>

                    </div>

                </header>
            </div>
            <div class="row justify-content-center">

                <div class="col-lg-8 col-md-offset-2">



                <?php $i = 1?>
                    @forelse($lessons as $lesson)
                    <article class="post">



        <!-- Marketing messaging and featurettes
        ================================================== -->
        <!-- Wrap the rest of the page in another container to center all the content. -->

        <div class="container marketing">



            <!-- START THE FEATURETTES -->




            <div class="row featurette">
                <div class="col-md-7">
                    <a href="{{route('course_lesson.lesson', $lesson->slug)}}"><h2 class="featurette-heading">Урок {!! $i++ !!}</h2></a>
                    <h5>{{ $lesson->title }}</h5>
                    <p>{{$lesson->description}}</p>
                </div>
                <div class="col-md-5 mt-5">
                    <img class="popular-img"src="../assets/images/p1.jpg">
                </div>
            </div>







            <!-- /END THE FEATURETTES -->

        </div><!-- /.container -->


        <!-- FOOTER -->


                    </article>
                        @empty
                            <p>В цьому курсі ще не має уроків</p>
                        @endforelse
                </div>
                @include('users._sidebar')
            </div>
        </div>
    </div>
@endsection