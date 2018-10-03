@extends('layouts.app')

@section('content')
    <div class="container">
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Редагувати Курс
                <small>Пиши тільки приємні слова...</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
        {{Form::open([
            'route' => ['student_courses.update', $course->slug],
            'files' => true,
            'method' => 'put'
        ])}}
        <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Що змінюємо?</h3>
                                        @include('admin.errors')
                </div>
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Назва</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" value="{{$course->title}}" name="title">
                        </div>

                        <div class="form-group">
                            <img src="{{$course->getImage()}}" alt="" class="img-responsive" width="200">
                            <label for="exampleInputFile">Головна картинка</label>
                            <input type="file" id="exampleInputFile" name="image">


                        </div>
                        <div class="form-group">
                            <label>Категорія</label>
                            {{Form::select('category_id',
                                $categories,
                                 $course->getCategoryId(),
                                 ['class' => 'form-control select2'])
                             }}
                        </div>

                    <!-- Date -->


                        <!-- checkbox -->

                    </div>
                    <div class="col-md-12">
                    <div class="form-group">
                    <label for="exampleInputEmail1">Опис</label>
                    <textarea name="description" id="" cols="30" rows="10" class="form-control">{{$course->description}}</textarea>
                    </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Повний текст</label>
                            <textarea name="content" id="summernote" class="form-control">{{$course->content}}</textarea>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">

                    <button class="btn btn-warning pull-right">Змінити</button>
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
        </section>
    </div>
    </div>
@endsection