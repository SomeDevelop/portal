@extends('layouts.app')

@section('content')

    <div class="container">

        <section>

            <div class="tabs tabs-style-topline">
                <nav>
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item castom-item">
                            <a class="icon icon-to icon-home"  href="{{route('owner_courses.index')}}" role="tab" aria-controls="pills-profile" aria-selected="false"><span>My Courses</span></a>
                        </li>
                        <li class="nav-item castom-item">
                            <a class="icon icon-to icon-box active"  href="{{route('owner')}}" role="tab" aria-controls="pills-home" aria-selected="true"><span>Profile</span></a>
                        </li>

                        <li class="nav-item castom-item">
                            <a class="icon icon-to icon-upload"  href="#" role="tab" aria-controls="pills-contact" aria-selected="false"><span>Upload (Скоро)</span></a>
                        </li>
                        <li class="nav-item castom-item">
                            <a class="icon icon-to icon-upload"  href="#" role="tab" aria-controls="pills-students" aria-selected="false"><span>Students (Скоро)</span></a>
                        </li>
                        <li class="nav-item castom-item">
                            <a class="icon icon-to icon icon-config"  href="#" role="tab" aria-controls="pills-settings" aria-selected="false"><span>Settings (Скоро)</span></a>
                        </li>
                    </ul>
                    {{--<div class="row">--}}
                        {{--<div class="col-md-8 col-md-offset-2">--}}
                            {{--<br>--}}
                            {{--@include('flash::message')--}}
                            {{--@if ($errors->any())--}}
                                {{--<ul>--}}
                                    {{--@foreach($errors->all() as $error)--}}
                                        {{--<li class="text-danger">{{$error}}</li>--}}
                                    {{--@endforeach--}}
                                {{--</ul>--}}
                            {{--@endif--}}
                        {{--</div>--}}
                    {{--</div>--}}

                </nav>
                <div class="tab-content" id="pills-tabContent">
                    @yield('content-1')
                </div>
            </div>

        </section>

    </div><!-- /container -->
@endsection