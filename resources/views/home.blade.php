@extends('layouts.app')

@section('content')
    <h1 class="text-center">Home | Chat</h1>
    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="card-deck">
                <div class="card">
                    <a href="{{ route('publiccourses') }}">
                        <img class="card-img-top" src="/img/front/courses.jpg" alt="Card image cap">

                        {{--<div class="card-body">--}}
                            {{--<h5 class="card-title">{{__('messages.Courses')}}</h5>--}}
                        {{--</div>--}}
                    </a>
                        {{--<div class="card-footer">--}}
                            {{--<small class="text-muted">Last updated 3 mins ago</small>--}}
                        {{--</div>--}}

                </div>
                <div class="card">
                    <img class="card-img-top" src="https://via.placeholder.com/272x180" alt="Card image cap">
                    {{--<div class="card-body">--}}
                        {{--<h5 class="card-title">{{__('messages.Students')}}</h5>--}}
                    {{--</div>--}}
                    {{--<div class="card-footer">--}}
                        {{--<small class="text-muted">Last updated 3 mins ago</small>--}}
                    {{--</div>--}}
                </div>
                <div class="card" >
                    <a href="{{ route('chat') }}">
                    <img class="card-img-top" src="/img/front/chat.jpg" alt="Chat">
                    {{--<div class="card-body">--}}
                        {{--<h5 class="card-title text-center">{{__('messages.Messenger')}}</h5>--}}
                    {{--</div>--}}
                    </a>
                    {{--<div class="card-footer">--}}
                        {{--<small class="text-muted">Last updated 3 mins ago</small>--}}
                    {{--</div>--}}
                </div>
            </div>
        </div>
    </div>
@endsection
