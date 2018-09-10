@extends('layouts.app')

@section('content')

    <div class="container">

        <section>

            <div class="tabs tabs-style-topline">
                <nav>
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="icon icon-home"  href="{{route('owner_courses.index')}}" role="tab" aria-controls="pills-profile" aria-selected="false"><span>My Courses</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="icon icon-box active"  href="{{route('owner')}}" role="tab" aria-controls="pills-home" aria-selected="true"><span>Profile</span></a>
                        </li>

                        <li class="nav-item">
                            <a class="icon icon-upload"  href="#" role="tab" aria-controls="pills-contact" aria-selected="false"><span>Upload</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="icon icon-upload"  href="#" role="tab" aria-controls="pills-students" aria-selected="false"><span>Students</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="icon icon icon-config"  href="#" role="tab" aria-controls="pills-settings" aria-selected="false"><span>Settings</span></a>
                        </li>
                    </ul>
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <br>
                            @include('flash::message')
                            @if ($errors->any())
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li class="text-danger">{{$error}}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>
                    <div class="tab-content" id="pills-tabContent">
                        @yield('content-1')
                    </div>
                </nav>
            </div>

        </section>

    </div><!-- /container -->
@endsection