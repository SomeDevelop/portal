@extends('owner.layout')

@section('content-1')
    <div class="content-wrapper text-center">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Добавити Урок
                <small></small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content text-center">
        {{Form::open([
            'route' => 'lessons.store','files' => 'true'
        ])}}
        <!-- Default box -->
            <div class="box text-center">
                <div class="box-header with-border">

                    <h5 class="box-title">Створи щось надзвичайне</h5>
                    @include('admin.errors')
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Тема уроку</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="title" placeholder="" value="{{old('title')}}">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                        <label for="exampleInputEmail1">Опис</label>
                        <textarea name="description" cols="30" rows="3" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Повный текст</label>
                            <textarea name="content" id="summaryckeditor" class="form-control" cols="30" rows="20"></textarea>
                        </div>
                    </div>
                    <input name="course_id" type="hidden" value="{{$course->id}}">
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button class="btn btn-info pull-right mb-4">Добавити</button>
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
            {{Form::close()}}
        </section>
        <!-- /.content -->
    </div>


@endsection