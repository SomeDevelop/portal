@extends('layouts.app')

@section('content')
    <!--main content start-->
    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">

                    <div class="leave-comment mr0"><!--leave comment-->
                        @if(session('status'))
                            <div class="alert alert-success">
                                {{session('status')}}
                            </div>
                        @endif
                        <h3 class="text-uppercase">Мій Профіль</h3>
                        @include('admin.errors')
                        <br>
                        <img src="{{$user->getAvatar()}}" alt="" class="profile-image">
                        <form class="form-horizontal contact-form" role="form" method="post" action="/profile" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="name" name="name"
                                           placeholder="Name" value="{{$user->name}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="email" class="form-control" id="email" name="email"
                                           placeholder="Email" value="{{$user->email}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="password" class="form-control" id="password" name="password"
                                           value="">
                                </div>
                            </div>
                            {{--<div class="form-group">--}}
                                {{--<div class="col-md-12">--}}
                                    {{--{{ Form::label('password', 'Password') }}<br>--}}
                                    {{--{{ Form::password('password', array('class' => 'form-control')) }}--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="file" class="form-control" id="image" name="avatar">
                                </div>
                            </div>
                            <button type="submit" class="btn send-btn">Update</button>

                        </form>
                    </div><!--end leave comment-->
                </div>
                <div class="col-lg-4" data-sticky_column>
                    <div class="primary-sidebar">

                        <aside class="widget border pos-padding moderator-bg text-center">
                            <img src="/img/advee.png" alt="" height="100">
                            <p class="moderator-text">Тут може бути ваше оголошення</p>
                        </aside>
                        <aside class="widget moderator-bg">
                            <h3 class="widget-title text-uppercase text-center">{{__('messages.POPULAR POSTS')}}</h3>

                            @forelse($populars as $popular)
                                @if($popular->followable->status == 1)

                                    <div class="popular-post">
                                        <div class="p-content">
                                            <a href="{{route('show_course.slug', $popular->followable->slug)}}" class="text-uppercase">{{ $popular->followable->title }}</a>
                                            <span class="p-date">Рейтинг: {{$popular->count}}</span>
                                        </div>
                                    </div>
                                @endif
                            @empty
                                <p>No course created.</p>
                            @endforelse
                        </aside>

                        <aside class="widget pos-padding moderator-bg">
                            <h3 class="widget-title text-uppercase text-center">{{__('messages.Recent Posts')}}</h3>

                            <div class="thumb-latest-posts">
                                @forelse($courses->where('status',1) as $course)
                                    <div class="media text-c">

                                        <div class="p-content">
                                            <a href="{{route('show_course.slug', $course->slug)}}"
                                               class="text-uppercase">{{$course->title}}</a>
                                            <span class="p-date">{{$course->created_at->format('d/m/Y')}}</span>
                                        </div>

                                    </div>

                                    <span class="pull-right">{{$course->getAuthorName()}}</span>
                                    <br>
                                    <hr>
                                @empty
                                    <p>No course created.</p>
                                @endforelse
                            </div>

                        </aside>
                        <aside class="widget border pos-padding moderator-bg">
                            <h3 class="widget-title text-uppercase text-center">{{__('messages.Categories')}}</h3>
                            <ul>
                                @foreach($categories as $category)
                                    <li>
                                        <a href="{{route('category.slug', $category->slug)}}">{{$category->title}}</a>
                                        <span class="post-count pull-right"> {{$category->courses()->where('status',1)->count()}}</span>

                                    </li>
                                @endforeach

                            </ul>
                        </aside>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end main content-->
@endsection