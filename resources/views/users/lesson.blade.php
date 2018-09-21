@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-offset-2">
                    <article class="post">

                    <div class="page-header">

                        <header class="codrops-header">
                            <h3 class="text-center">{{$lesson->getCourseTitle()}}</h3>
                            <div>
                                <a style="font-size: 40px;" href="{{route('course.course', ['course' => $course->slug])}}" title="Back"><span><i
                                                class="fa fa-arrow-circle-left" aria-hidden="true"></i></span>

                                </a>
                                <p>НАЗАД</p>

                            </div>

                        </header>
                    </div>


                    <div class="panel panel-default post-content">



                        <div class="panel-heading">
                            <h5 class="text-center">{{ $lesson->title }}</h5>
                        </div>


                        <div class="panel-body">
                            {{ $lesson->description }}
                            <hr>
                            <br>
                            <div>{!!$lesson->content!!}</div>
                        </div>

                    </div>
                    </article>
                </div>
                @include('users._sidebar')
            </div>

        </div>
    </div>
@endsection
