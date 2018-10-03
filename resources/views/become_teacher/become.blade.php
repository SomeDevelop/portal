@extends('become_teacher.layout')


@section('content')
    <main class="py-4 birds mt-5">

        <div class="container">
            <div class="row justify-content-center">

                <div class="col-md-6 col-lg-3 mb-3 mt-5">
                    <a class="btn btn-md btn-info add-course" href="{{route('student_courses.create')}}">Створити
                        курс</a>
                    {{--<a class="btn btn-md btn-info add-course" href="#">Створити курс</a>--}}
                </div>


            </div>

        </div>
        @if($courses->count())
            <div class="container student-bg mt-3 pb-3">
                <div class="col-md-6 float-left pt-3">

                    <h5><span class="fa fa-thumbs-o-up"></span><span class="text-body"> - одобрено</span></h5>

                </div>
                <div class="col-md-6 float-left pt-3">

                    <h5><span class="fa fa-thumbs-o-down"></span><span class="text-body"> - ще не одобрено</span></h5>

                </div>
                <div class="form-group col-lg-12">

                    <table id="example1" class="table table-bordered table-striped bg-white">
                        <thead>
                        <tr>

                            <th class="text-center">Курс</th>
                            <th class="text-center">Повідомлення від модератора</th>
                            <th class="text-center"></th>


                        </tr>
                        </thead>
                        <tbody>
                        @forelse($courses as $course)
                            <tr>
                                <td>
                                    <a href="{{route('student_course.slug', $course->slug)}}"
                                       title="Відкрити">{{$course->title}}</a><br>

                                    <a href="{{route('student_course.slug', $course->slug)}}"><button type="button" class="btn btn-sm btn-outline-secondary">View</button></a>


                                    <a href="{{route('student_courses.edit', $course->slug)}}"><button type="button" class="btn btn-sm btn-outline-secondary">Edit</button></a>
                                    <a>
                                        {{Form::open(['route' => ['student_courses.destroy', $course->slug], 'method'=>'delete'])}}
                                        <button onclick="return confirm('Ти впевнений?')" type="submit" class="btn btn-sm btn-outline-secondary">Delete</button>
                                        {{Form::close()}}
                                    </a>
                                </td>
                                <td>
                                    @if($course->comment != null)
                                        {{$course->comment}}
                                    @else
                                        У вас не має повідомлень
                                    @endif
                                </td>
                                <td>

                                    @if($course->status == 1)
                                        <h5><i class="fa fa-thumbs-o-up"></i></h5>

                                    @else
                                        <h5><i class="fa fa-thumbs-o-down"></i></h5>

                                    @endif

                                </td>


                            </tr>

                        @empty
                            <p>У Вас ще не має курсів</p>
                        @endforelse
                        </tfoot>
                    </table>

                </div>

            </div>
        @endif


    </main>
@endsection