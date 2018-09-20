@extends('layouts.app')

@section('content')
    {{--<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">--}}
    {{--<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">--}}

    {{--<meta name="csrf-token" content="{{ csrf_token() }}" />--}}

    <div class="container">
        <header class="codrops-header">
            @if (Auth::check())
                <div>
                    <a style="font-size: 40px;" href="{{route('home')}}" title="Back"><span><i
                                    class="fa fa-arrow-circle-left" aria-hidden="true"></i></span></a>

                </div>
            @endif

            <h1 class="main-color">All <span>Courses</span></h1>
            <nav class="codrops-demos">
                <a class="current-demo" href="#">All</a>
                <a href="#">Web Design</a>
                <a href="#">Front End</a>
                <a href="#">Back End</a>
                <a href="#">Photoshop</a>
                <a href="#">Різне</a>

            </nav>
        </header>
        <div class="content">
            <!-- trianglify pattern container -->
            <div class="pattern pattern--hidden"></div>
            <!-- cards -->
            <div class="wrapper">
                <? $i = 1 ?>
                    @if($courses->count())
                @forelse ($courses as $course)

                    <div class="card" data-id="{{ $course->id }}">
                        <div class="card__container card__container--closed">
                            <svg class="card__image" xmlns="http://www.w3.org/2000/svg"
                                 xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1920 500"
                                 preserveAspectRatio="xMidYMid slice">
                                <defs>
                                    {!! $i++ !!}

                                    <clipPath id="clipPath{{$i}}">
                                        <polygon class="clip" points="0,500 0,0 1920,0 1920,500"></polygon>
                                    </clipPath>
                                </defs>
                                <image clip-path="url(#clipPath{{$i}})" width="1920" height="500"
                                       xlink:href="{{$course->getFullImage()}}"></image>
                            </svg>
                            <div class="card__content">
                                <i class="card__btn-close fa fa-times"></i>

                                <div class="card__caption" style="background-color: rgba(255,255,255,.7);">

                                    <h4 class="card__title" style="color: black">{{$course->title}}</h4>
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
                                    <p class="card__subtitle"
                                       style="color: rgba(0,0,0,.6);">{{$course->getCategoryTitle()}}</p>

                                    <br>
                                    {{--<p class="card__subtitle" style="color: rgba(0,0,0,.6);">{{$course->date}}</p>--}}
                                </div>

                                <div class="card__copy">

                                    <div class="meta">
                                        <img class="rounded-circle text-center" src="/img/admin.jpg"
                                             alt="Generic placeholder image" width="75" height="75"
                                             data-toggle="lightbox" data-title="Amazing Nature"
                                             data-footer="The beauty of nature" data-type="image">

                                        <span class="meta__author">{{$course->getAuthorName()}}</span>
                                        {{--<div>--}}
                                        {{--<ol class="grid">--}}
                                        {{--<li class="grid__item">--}}
                                        {{--<button class="icobutton icobutton--thumbs-up"><span class="fa fa-thumbs-up"></span></button>--}}
                                        {{--</li>--}}
                                        {{--</ol>--}}

                                        {{--</div>--}}
                                        @if (Auth::check() )
                                            @role('Owner','Student','Admin')
                                                <div class="panel-footer">
                                                {{--<h4><a href="#" title="Nature Portfolio">{{ $course->title }}</a></h4>--}}
                                                <span class="pull-right">
                                                <span class="like-btn">
                                                    <i id="like{{$course->id}}"
                                                       class="fa fa-thumbs-up glyphicon glyphicon-thumbs-up {{ auth()->user()->hasLiked($course) ? 'like-course' : '' }}"></i>
                                                    <div
                                                            id="like{{$course->id}}-bs3">{{ $course->likers()->get()->count() }}
                                                    </div>
                                                </span>
                                            </span>
                                                <div>
                                                    {{$course->liker}}
                                                </div>
                                            </div>
                                            @endrole

                                            @else
                                            <div class="panel-footer">
                                                {{--<h4><a href="#" title="Nature Portfolio">{{ $course->title }}</a></h4>--}}
                                                <span class="pull-right">
                                                <span class="like-btn">
                                                    <i class="fa fa-thumbs-up"></i>
                                                    <div
                                                            id="like{{$course->id}}-bs3">{{ " ".$course->likers()->get()->count() }}
                                                    </div>
                                                </span>
                                            </span>

                                            </div>

                                        @endif
                                        <span class="meta__date">{{$course->date}}</span>


                                    </div>


                                    <div>
                                        {!!$course->content!!}
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                @empty
                    <p>No course created.</p>

                @endforelse
            @endif

            </div>

            <!-- /cards -->
        </div><!-- /content -->
        <!-- Related demos -->
        <section class="container content--related">
            {{--<p class="codrops-header">--}}
            {{--{{ $courses->links() }}--}}
            {{--</p>--}}

        </section>
    </div>

@endsection