@extends('layouts.app')

@section('content')


    <div class="container">

        <div class="container">
            <div class="row justify-content-center">
                <div>
                    <div class="row">
                        <div class="col-lg-12">
                            <header class="codrops-header">
                                @if (Auth::check())
                                    <div>
                                        <a style="font-size: 40px;" href="{{route('home')}}" title="Back"><span><i
                                                        class="fa fa-arrow-circle-left" aria-hidden="true"></i></span></a>

                                    </div>
                                @endif

                                    <h1 class="main-color">{{$cat->title}} <span>Courses</span></h1>
                                <nav class="codrops-demos">
                                    <a href="{{route('publiccourses')}}">All <span class="course-count pull-right"> ({{$allcourses->count()}})</span></a>
                                    @forelse ($categories as $category)

                                        <a href="{{route('category.slug', $category->slug)}}">{{$category->title}}<span class="course-count pull-right"> ({{$category->courses()->count()}})</span></a>

                                    @empty
                                        <p>No category created.</p>

                                    @endforelse
                                </nav>
                            </header>
                        </div>
                        @forelse ($courses as $course)
                            <div class="col-lg-4 col-md-6 cart">
                                <div class="cart" data-id="{{ $course->id }}">
                                    <article class="post post-grid">
                                        <div class="post-thumb">
                                            <a href="#"><img src="{{$course->getFullImage()}}" alt="" height="200"></a>

                                            <a href="#" class="post-thumb-overlay text-center">
                                                <div class="text-uppercase text-center">{{__('messages.View Course')}}</div>
                                            </a>
                                        </div>
                                        {{--@if (Auth::check() )--}}
                                        {{--@role('Student')--}}
                                        {{--<div class="panel-footer">--}}
                                        {{--<h4><a href="#" title="Nature Portfolio">{{ $course->title }}</a></h4>--}}
                                        {{--<span class="pull-right">--}}
                                        {{--<button class="like-btn">--}}
                                        {{--<i id="like{{$course->id}}"--}}
                                        {{--class="fa fa-thumbs-up glyphicon glyphicon-thumbs-up {{ auth()->user()->hasLiked($course) ? 'like-course' : '' }}"></i>--}}
                                        {{--</button>--}}
                                        {{--<span--}}
                                        {{--id="like{{$course->id}}-bs3">{{ $course->likers()->get()->count() }}--}}
                                        {{--</span>--}}
                                        {{--</span>--}}
                                        {{--<div>--}}
                                        {{--{{$course->liker}}--}}
                                        {{--</div>--}}
                                        {{--</div>--}}
                                        {{--@endrole--}}




                                        {{--@else--}}
                                        {{--<div class="panel-footer">--}}

                                        {{--<span class="pull-right">--}}
                                        {{--<span class="like-btn">--}}
                                        {{--<i class="fa fa-thumbs-up"></i>--}}
                                        {{--<button--}}
                                        {{--id="like{{$course->id}}-bs3">{{ " ".$course->likers()->get()->count() }}--}}
                                        {{--</button>--}}
                                        {{--</span>--}}
                                        {{--</span>--}}

                                        {{--</div>--}}

                                        {{--@endif--}}

                                        <div class="post-content">

                                            <header class="entry-header text-center card-header">

                                                <h6><a href="{{route('category.slug', $course->getCategorySluge())}}">{{$course->getCategoryTitle()}}</a></h6>

                                                <h1 class="entry-title"><a href="#">{{$course->title}}</a></h1>


                                            </header>
                                            <div class="entry-content">

                                                <div class="social-share">
                                                    <span class="social-share-title pull-left text-capitalize">Автор: {{$course->getAuthorName()}}</span>
                                                    <span class="float-right text-capitalize">{{$course->date}}</span>
                                                </div>
                                                @if (Auth::check())
                                                    @role('Owner','Student','Admin')
                                                    <div class="card__subtitle float-right">
                                                        <favorite
                                                                :course={{$course->id}}
                                                                        :favorited={{ $course->favorited() ? 'true' : 'false' }}
                                                        ></favorite>
                                                    </div>
                                                    @endrole
                                                @else
                                                    <div class="card__subtitle float-right">
                                                        <a href="{{ route('login') }}">Записатися</a>
                                                    </div>
                                                @endif
                                                {{--<div class="float-left">--}}
                                                {{--<h4><a href="#" title="Nature Portfolio">{{ $course->title }}</a></h4>--}}
                                                {{--<span class="pull-right">--}}
                                                {{--<span class="like-btn">--}}
                                                {{--<i class="fa fa-thumbs-up"></i>--}}
                                                {{--<span--}}
                                                {{--id="like{{$course->id}}-bs3">{{ " ".$course->likers()->get()->count() }}--}}
                                                {{--</span>--}}
                                                {{--</span>--}}
                                                {{--</span>--}}

                                                {{--</div>--}}

                                            </div>
                                        </div>

                                    </article>
                                </div>
                            </div>
                        @empty
                            <p>No course created.</p>

                        @endforelse

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection