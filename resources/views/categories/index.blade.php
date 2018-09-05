@extends('admin.layout')

@section('content')
    <!-- Content Wrapper. Contains page content -->

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Категорії
                <small> - теми, що ведуться в блогові</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Головна</a></li>
                <li><a href="{{ route('categories.index') }}">Категорії</a></li>
                <li class="active">Всі категорії</li>
            </ol>
        </section>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
    @endif
        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Всі категорії</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        <a href="{{route('categories.create')}}" class="btn btn-success">Добавити</a>
                    </div>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Назва</th>
                            <th>Дія</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{$category->id}}</td>
                                <td>{{$category->title}}</td>
                                <td><a href="{{route('categories.edit',$category->id)}}" class="fa fa-pencil"></a>
                                    {{Form::open(['route'=>['categories.destroy',$category->id],'method'=>'delete'])}}
                                    <button type="submit" class="delete" onclick="return confirm('Вы уверены?')">
                                        <i class="fa fa-remove"></i>
                                    </button>
                                    {{Form::close()}}
                                </td>
                            </tr>
                        @endforeach

                        </tbody>>
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