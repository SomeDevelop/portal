@extends('Admin.layout')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Всі Курси
                <small>Всі курси</small>
            </h1>

        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">трям-трям</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        {{--<a href="{{route('courses.create')}}" class="btn btn-success">Добавити</a>--}}
                        <a href="#" class="btn btn-success">Добавити</a>

                    </div>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Назва</th>
                            <th>Категорія</th>
                            <th>Опис</th>
                            {{--<th>Картинка</th>--}}
                            <th>Платний</th>

                            <th>Дія</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($courses as $course)
                            <tr>
                                <td>{{$course->id}}</td>
                                <td>{{$course->title}}</td>
                                <td>{{$course->getCategoryTitle()}}</td>
                                <td>{{$course->getTagsTitles()}}</td>
                                {{--<td>--}}
                                    {{--<img src="{{$course->getImage()}}" alt="" width="100">--}}
                                {{--</td>--}}
                                <td>
                                    1
                                </td>
                                <td>
                                    <a href="{{route('posts.edit', $course->id)}}" class="fa fa-pencil"></a>

                                    {{Form::open(['route'=>['posts.destroy', $course->id], 'method'=>'delete'])}}
                                    <button onclick="return confirm('are you sure?')" type="submit" class="delete">
                                        <i class="fa fa-remove"></i>
                                    </button>

                                    {{Form::close()}}
                                </td>
                            </tr>
                        @endforeach
                        </tfoot>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection