@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="content-wrapper text-center">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Добавити курс
                <small></small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content text-center">
        {{Form::open([
            'route' => 'student_courses.store','files' => 'true'
        ])}}
        <!-- Default box -->
            <div class="box text-center">
                <div class="box-header with-border">
                    {{--<h3 class="box-title">Що будемо постити?</h3>--}}
                    <h5 class="box-title">Створи щось надзвичайне</h5>
                    @include('admin.errors')
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Назва</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="title" placeholder="" value="{{old('title')}}">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputFile">Головна картинка</label>
                            <input type="file" id="exampleInputFile" name="image">
                        </div>
                        <div class="form-group justify-content-center">
                            <label>Категорія</label>
                            {{Form::select('category_id',
                                $categories,
                                 null,
                                 ['class' => 'form-control select2'])
                             }}

                        </div>
                    {{--<div class="form-group">--}}
                    {{--<label>Теги</label>--}}
                    {{--{{Form::select('tags[]',--}}
                    {{--$tags,--}}
                    {{--null,--}}
                    {{--['class' => 'form-control select2',--}}
                    {{--'multiple' => 'multiple',--}}
                    {{--'data-placeholder' => 'Выберите теги'])--}}
                    {{--}}--}}

                    {{--</div>--}}
                    <!-- Date -->


                        <!-- checkbox -->

                        <!-- checkbox -->
                        {{--<div class="form-group text-left">--}}
                        {{--<label>--}}
                        {{--<input type="checkbox" class="minimal" name="status">--}}
                        {{--</label>--}}
                        {{--<label>--}}
                        {{--Чорновик--}}
                        {{--</label>--}}
                        {{--</div>--}}

                    </div>
                    {{--<div class="col-md-12">--}}
                    {{--<div class="form-group">--}}
                    {{--<label for="exampleInputEmail1">Опис</label>--}}
                    {{--<textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-6">--}}
                    {{--<div name="content" id="summernote"></div>--}}
                    {{--</div>--}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Повный текст</label>
                            <textarea name="content" id="summernote" rows="17"></textarea>
                        </div>
                    </div>
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
    </div>
@endsection