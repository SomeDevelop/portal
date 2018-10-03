@extends('owner.layout')

@section('content-1')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Редагувати Урок
                <small>Пиши тільки приємні слова...</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
        {{Form::open([
            'route' => ['lessons.update', $lesson->slug],
            'files' => true,
            'method' => 'put'
        ])}}
        <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Що змінюємо?</h3>
                    {{--                    @include('admin.errors')--}}
                </div>
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Назва</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" value="{{$lesson->title}}" name="title">
                        </div>




                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Повний текст</label>
                            <textarea name="description" id="summary" class="form-control">{{$lesson->description}}</textarea>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Повний текст</label>
                            <textarea name="content" id="summernote" class="form-control">{{$lesson->content}}</textarea>
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


@endsection