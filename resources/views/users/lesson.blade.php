@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="container">
            <div class="col-lg-12 bg-white mb-3 pl-5 p-2">
                <h3>
                    <a href="{{route('main')}}">{{ __('messages.HOME') }}</a> <span class="castom-a"> > </span>
                    <a href="{{ route('student') }}">{{ __('messages.student_panel') }}</a>
                    <span class="castom-a"> > </span>
                    <a href="{{route('course.course', ['course' => $course->slug])}}">{{$course->title}}</a>
                    <span class="castom-a"> > Урок 1</span>
                </h3>
            </div>
            <div class="col-lg-12 bg-white mb-3 pl-5 p-2">
                <h4 class="text-center">
                    Урок: {{ $lesson->title }}
                </h4>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-offset-2">
                    <article class="post">




                    <div class="panel panel-default post-content">



                        {{--<div class="panel-heading">--}}
                            {{--<h5 class="text-center">{{ $lesson->title }}</h5>--}}
                        {{--</div>--}}


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
