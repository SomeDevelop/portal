@extends('products.layout')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 5.6 CRUD Example from scratch</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('cat.create') }}"> Create New Cat</a>
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Title</th>
            <th>Slug</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($cats as $cat)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $cat->title }}</td>
                <td>{{ $cat->slug }}</td>
                <td>
                    <form action="{{ route('cat.destroy',$cat->id) }}" method="POST">


                        <a class="btn btn-info" href="{{ route('cat.show',$product->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('cat.edit',$product->id) }}">Edit</a>


                        @csrf
                        @method('DELETE')


                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>


    {!! $cat->links() !!}


@endsection