@extends('moderator.layout')

@section('content-1')


    <div class="content moderator-bg">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content m-3 p-3">

            <!-- Default box -->
            <div class="col-lg-7 m-auto">
                {{Form::open([
                                'route' => ['moderator.message.id',$course->id],
                                'method' => 'post'
                                    ])}}
                <div class="modal-content mt-3">
                    <h6 class="pull-left p-3">{{$course->title}}</h6>

                    <div class="modal-header">
                        <h4 class="modal-title">Автор: {{$course->getAuthorName()}}</h4>


                        <img class="pull-right" src="{{$course->getAuthorAvatar()}}" alt="" height="75">
                    </div>

                    <div class="modal-body">


                        <div class="form-group">
                            <label for="message">Написати повідомлення автору...</label>
                            <textarea name="message" id="message" class="form-control">{{$course->comment}}</textarea>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <a href="{{route('new-courses')}}" class="btn btn-secondary">Назад</a>
                        {{--<a type="button" class="btn btn-secondary" >Close</a>--}}
                        <button type="submit" class="btn btn-primary">ВІДПРАВИТИ</button>
                    </div>
                </div>
                {{Form::close()}}
            </div>

            <!-- /.box-body -->

            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
    <!-- Модальное окно -->


@endsection