{{-- \resources\views\permissions\layout.blade.php --}}
@extends('admin.layout')

@section('title', '| Permissions')

@section('content')
<div class="content-wrapper">
    <div class="col-lg-10 col-lg-offset-1">
        <h1><i class="fa fa-key"></i>{{__('messages.available_permissions')}}

            <a href="{{ route('users.index') }}" class="btn btn-default pull-right">{{__('messages.users')}}</a>
            <a href="{{ route('roles.index') }}" class="btn btn-default pull-right">{{__('messages.roles')}}</a></h1>
        <hr>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">

                <thead>
                <tr>
                    <th>{{__('messages.permissions')}}</th>
                    <th>{{__('messages.operation')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($permissions as $permission)
                    <tr>
                        <td>{{ $permission->name }}</td>
                        <td>
                            <a href="{{ URL::to('permissions/'.$permission->id.'/edit') }}" class="btn btn-info pull-left" style="margin-right: 3px;">{{__('messages.edit')}}</a>

                            {!! Form::open(['method' => 'DELETE', 'route' => ['permissions.destroy', $permission->id] ]) !!}
                            {!! Form::submit(__('messages.delete'), ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <a href="{{ URL::to('permissions/create') }}" class="btn btn-success">{{__('messages.add')}}</a>

    </div>
</div>

@endsection