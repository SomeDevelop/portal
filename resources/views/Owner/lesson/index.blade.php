@extends('owner.layout')

@section('content-1')
    <div class="container">
        <h2 class="text-center">{{$course->title}}</h2>
        <div class="row">

            <div class="col-md-2 mb-3">
                <a class="btn btn-md btn-pinterest add-course" href="{{route('lessons.create',['course'=>$course->id])}}">Новий урок1</a>
            </div>

        </div>
        <div>
            <?php $i = 1?>
            @forelse($lessons as $lesson)
{{--                <h3>{{$lesson->getCourseTitle()}}</h3>--}}

                    <div class="card">
                        <div class="card-header">
                            <h3 class="float-left">Урок {!! $i++ !!}</h3>
                        </div>
                        <div class="next-bg">

                        <div class="card-body">
                            <h5 class="card-title">Тема: {{ $lesson->title }}</h5>
                            <div>{{$lesson->description}}</div>
                        </div>

                        <div class="btn-group ml-4">
                            {{--<a href="{{route('course_lessons.course', ['course' => $cours->id])}}">--}}
                                {{--<button type="button" class="btn btn-sm btn-outline-secondary">View</button>--}}
                            {{--</a>--}}


{{--                            <a href="{{route('owner_courses.edit', $cours->id)}}"><button type="button" class="btn btn-sm btn-outline-secondary">Edit</button></a>--}}
                            {{--<a>--}}
                                {{--{{Form::open(['route'=>['owner_courses.destroy', $cours->id], 'method'=>'delete'])}}--}}
                                {{--<button onclick="return confirm('are you sure?')" type="submit" class="btn btn-sm btn-outline-secondary">Delete</button>--}}
                                {{--{{Form::close()}}--}}
                            {{--</a>--}}
{{--{{dd($lesson->id)}}--}}
                            <a href="{!! route('lessons.show',$lesson->slug) !!}" class="main-bg">
                                <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                            </a>


                            <a href="#" class="main-bg">
                                <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                            </a>
                            {{--<a>--}}
                            {{--{{Form::open(['route'=>['owner_courses.destroy', $cours->id], 'method'=>'delete'])}}--}}
                            {{--<button onclick="return confirm('are you sure?')" type="submit" class="btn btn-sm btn-outline-secondary">Delete</button>--}}
                            {{--{{Form::close()}}--}}
                            {{--</a>--}}


                        </div>
                        </div>
                    </div>





            @empty

                <p>Не має уроків</p>

            @endforelse
        </div>



    </div>


@endsection