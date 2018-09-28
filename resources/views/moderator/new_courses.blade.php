@extends('moderator.layout')

@section('content-1')


    <div class="content-wrapper">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="col-lg-12">

                <div class="col-md-4 float-left">

                    <h5><span class="fa fa-lock"></span><span class="text-body"> - блокуємо</span></h5>

                </div>
                <div class="col-md-4 float-left">

                    <h5><span class="fa fa-thumbs-o-up"></span><span class="text-body"> - дозволяємо</span></h5>

                </div>
                <div class="col-md-4 float-left">

                    <h5><span class="fa fa-remove"></span><span class="text-body"> - видаляємо</span></h5>

                </div>
                <!-- /.box-header -->

                {{--<div class="form-group col-lg-12">--}}
                {{--<a href="create.html" class="btn btn-success">Добавить</a>--}}
                {{--</div>--}}
                <div class="form-group col-lg-12">

                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Текст</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($courses as $course)
                            <tr>

                                <td>

                                    {{$course->id}}

                                </td>
                                <td>{{$course->title}}
                                </td>
                                <td>
                                    @if($course->status == 1)
                                        <h5><a href="/moderator/courses/toggle/{{$course->id}}" class="fa fa-lock float-left"></a></h5>

                                    @else
                                        <h5><a href="/moderator/courses/toggle/{{$course->id}}" class="fa fa-thumbs-o-up float-left"></a></h5>

                                    @endif
                                    {{Form::open(['route' => ['courses.destr', $course->id], 'method'=>'delete'])}}
                                    <button onclick="return confirm('Ти впевнений?')" type="submit" class="delete float-left ml-3 moderator-btn">
                                        <i class="fa fa-remove"></i>
                                    </button>

                                    {{--<a href="#" class=""></a>--}}
                                    {{Form::close()}}

                                    @if($course->status == 0)
                                        <span class="moderator-new pl-3 float-left">NEW</span>
                                    @endif
                                </td>
                            </tr>

                        @empty
                            <p>Курси відсутні</p>
                        @endforelse
                        </tfoot>
                    </table>

                </div>

            </div>

            <!-- /.box-body -->

            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
    {{ $comments->links() }}
    <!-- /.content-wrapper -->


@endsection