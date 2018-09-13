@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 col-md-offset-2">
                    <div class="page-header">
                        <h3 class="text-center">{{$lesson->getCourseTitle()}}</h3>
                        <header class="codrops-header">
                            <div>
                                <a style="font-size: 40px;" href="{{route('my_favorite.course', ['course' => $course->id])}}" title="Back"><span><i
                                                class="fa fa-arrow-circle-left" aria-hidden="true"></i></span>

                                </a>
                                <p>НАЗАД</p>

                            </div>

                        </header>
                    </div>


                        <div class="panel panel-default">



                            <div class="panel-heading">
                                <h5 class="text-center">{{ $lesson->title }}</h5>
                            </div>


                            <div class="panel-body">
                                {{ $lesson->description }}
                            </div>

                            <hr>
                            <br>
                            <div>
                                {{ $lesson->content }}
                            </div>
                            {{--                        {{dd($myFavorite->id)}}--}}
                            {{--                        <a href="{{route('/my_favorites/', $myFavorite->id)}}">Відкрити</a>--}}



                        </div>

                </div>
            </div>
        </div>
    </div>
@endsection
