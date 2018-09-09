@extends('layouts.app')

@section('content')


    <div class="container">
        <header class="codrops-header">
            <div>
                <a style="font-size: 40px;" href="{{route('home')}}" title="Back"><span><i
                                class="fa fa-arrow-circle-left" aria-hidden="true"></i></span></a>

            </div>
            <h1>Front End <span>Courses</span></h1>
            <nav class="codrops-demos">
                <a href="#">All</a>
                <a href="#">Web Design</a>
                <a class="current-demo" href="#">Front End</a>
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
                @forelse ($courses as $course)

                    <div class="card">
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
                                    <h2 class="card__title" style="color: black">{{$course->title}}</h2>
                                    @if (Auth::check())
                                        <div class="card__subtitle float-right">
                                            <favorite
                                                    :course={{$course->id}}
                                                            :favorited={{ $course->favorited() ? 'true' : 'false' }}
                                            ></favorite>
                                        </div>
                                    @endif
                                    <p class="card__subtitle" style="color: rgba(0,0,0,.6);">{{$course->getCategoryTitle()}}</p>
                                    <br>
                                    <p class="card__subtitle" style="color: rgba(0,0,0,.6);">{{$course->date}}</p>
                                </div>

                                <div class="card__copy">
                                    <div class="meta">
                                        <img class="meta__avatar" src="/img/authors/1.png" alt="author01"/>
                                        <span class="meta__author">{{$course->getAuthorName()}}</span>
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