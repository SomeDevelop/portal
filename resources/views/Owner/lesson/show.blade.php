@extends('owner.layout')

@section('content-1')
    <div class="container">
        <h2 class="text-center">{{$course->title}}</h2>

        <div class="row">

            <div class="col-md-2 mb-3">
                <a class="main-bg" href="{{route('course_lessons.course', ['course' => $course->id])}}"><button type="button" class="btn btn-secondary">Назад</button></a>
            </div>

        </div>
        <div>


                <div class="card">
                    <div class="card-header">
                        <h5 class="float-left">{{ $lesson->title }}</h5>
                    </div>
                    <div class="next-bg">

                        <div class="card-body">

                            <div>{{$lesson->description}}</div>
                            <br>
                            <br>
                            <div>{!!$lesson->content!!}</div>
                        </div>
                    </div>
                </div>






        </div>



    </div>





@endsection