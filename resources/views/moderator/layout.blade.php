@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="container">

            <div class="row">

            <div class="col-md-12 col-md-offset-2">
                <div class="text-center">
                    <a style="font-size: 40px;" href="{{route('publiccourses')}}" title="Back"><span><i
                                    class="fa fa-arrow-circle-left" aria-hidden="true"></i></span>

                    </a>

                    <h3 class="text-center">Мої Курси</h3>
                </div>


            </div>

            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('moderator')}}">Преподаватели</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('new-courses')}}">Курсы</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('new-comments')}}">Коментарии</a>
                </li>
            </ul>
            </div>
            <div class="tab-content" id="pills-tabContent">
            @yield('content-1')
            </div>

        </div>
    </div>
@endsection