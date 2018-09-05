@extends('admin.layout')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Добавити категорію

            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="box">
                <form action="{{ route('categories.store') }}" method="POST">
                    @csrf
                <div class="box-header with-border">
                    <h3 class="box-title">Добавляєм категорію</h3>
                    @if($errors->any())
                        <div class="container">
                            <div class="row">
                                <div class="col-md-10 col-md-offset-0">
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach($errors->all() as $error)
                                                <li>{{ $error }}</li>

                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Назва</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="title">
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <a class="btn btn-primary" href="{{ route('categories.index') }}"> Back</a>
                    <button type="submit" class="btn btn-success pull-right">Submit</button>
                </div>
                <!-- /.box-footer-->
                </form>
            </div>
        </section>
    </div>
@endsection