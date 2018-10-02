@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="container">
            <div class="col-lg-12 bg-white mb-3 pl-5 p-2">
                <h3>
                    <a href="{{route('main')}}">{{ __('messages.HOME') }}</a> <span class="castom-a"> > </span>
                    <a href="{{ route('student') }}">{{ __('messages.student_panel') }}</a>
                    <span class="castom-a"> > {{$course->title}}</span>
                </h3>
            </div>
            <div class="col-lg-12 bg-white mb-3 pl-5 p-2">
                <h4 class="text-center">
                    {{$course->title}}
                </h4>
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
                    <a href="{{route('course_lesson.lesson', $lesson->slug)}}"><img class="popular-img" src="{{asset('img/folder1.png')}}"></a>
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