@extends('admin.layout')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Добавити курс
                <small></small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
        {{Form::open([
            'route' => 'courses.store','files' => 'true'
        ])}}
        <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Що будемо постити?</h3>
                    @include('admin.errors')
                </div>
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Назва</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="title" placeholder="" value="{{old('title')}}">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputFile">Головна картинка</label>
                            <input type="file" id="exampleInputFile" name="image">
                        </div>
                        <div class="form-group">
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
                        <div class="form-group">
                            <label>Дата:</label>

                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control pull-right" id="datepicker" name="date" value="{{old('date')}}">
                            </div>
                            <!-- /.input group -->
                        </div>

                        <!-- checkbox -->
                        <div class="form-group">
                            <label>
                                <input type="checkbox" class="minimal" name="is_featured">
                            </label>
                            <label>
                                Рекомендувати
                            </label>
                        </div>

                        <!-- checkbox -->
                        <div class="form-group">
                            <label>
                                <input type="checkbox" class="minimal" name="status">
                            </label>
                            <label>
                                Чорновик
                            </label>
                        </div>
                        <div class="form-group">
                            <label>
                                <input type="checkbox" class="minimal" name="is_free">
                            </label>
                            <label>
                                Платный
                            </label>
                        </div>
                    </div>
                    {{--<div class="col-md-12">--}}
                        {{--<div class="form-group">--}}
                            {{--<label for="exampleInputEmail1">Опис</label>--}}
                            {{--<textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Повный текст</label>
                            <textarea name="content" id="summary-ckeditor" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">

                    <button class="btn btn-success pull-right">Добавити</button>
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
            {{Form::close()}}
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection