@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="container">

            <div class="row">

                <div class="col-lg-12 moderator-bg mb-3 pl-5 p-2">
                    <h3>
                        <a href="{{route('main')}}">{{ __('messages.HOME') }}</a>
                        <span class="castom-a"> > {{ __('messages.moderator_panel') }}</span>
                    </h3>
                </div>

            <ul class="nav nav-pills mb-3 moderator col-lg-12 moderator-bg" id="pills-tab" role="tablist">

                <li class="nav-item">
                    <a class="nav-link" href="{{route('new-courses')}}">Курсы
                        @if($courses->where('status',0)->count() > 0)
                            <span class="badge badge-secondary">{{$courses->where('status',0)->count()}}</span>
                        @endif
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('new-comments')}}">Коменти
                        @if($comments->where('status',0)->count() > 0)
                        <span class="badge badge-secondary">{{$comments->where('status',0)->count()}}</span>
                        @endif
                    </a>
                </li>
            </ul>
            </div>
            <div class="tab-content bg-white" id="pills-tabContent">
            @yield('content-1')
            </div>

        </div>
    </div>
@endsection