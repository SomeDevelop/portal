@extends('admin.layout')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Редагувати категорію
                <small>якісь приємні слова...</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Змінюємо</h3>
                    {{--@include('admin.errors')--}}
                </div>
                <form action="{{ route('categories.update',$category->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="box-body">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Назва</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="title" placeholder="" value="{{$category->title}}">
                            </div>
                        </div>

                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button class="btn btn-default">Назад</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                <!-- /.box-footer-->

            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection