@extends('layouts.app')

@section('content')
    <!--main content start-->

    <div class="container">
        <div class="row">
            <div class="col-lg-12 bg-white mb-3 pl-5 p-2">
                <h3>
                    <a href="{{route('main')}}">{{ __('messages.HOME') }}</a>
                    <span class="castom-a"> > </span>
                    <a href="{{route('publiccourses')}}">{{ __('messages.Courses') }}</a>
                    <span class="castom-a"> > {{$course->title}}</span>
                </h3>
            </div>
            <div class="col-lg-8">
                <article class="post"  data-id="{{ $course->id }}">
                    <div class="post-thumb">
                        <img src="{{$course->getFullImage()}}" alt="">
                    </div>
                    <div class="post-content">
                        <div>
                            <span class="social-share-title text-capitalize pl-3">Автор: {{$course->getAuthorName()}}</span>
                            <p class="pull-right"><span class="pr-3">{{$course->date}}</span></p>
                        </div>
                        <header class="entry-header text-center text-uppercase">



                            <h6>
                                <a href="{{route('category.slug', $course->getCategorySluge())}}"> {{$course->getCategoryTitle()}}</a>
                            </h6>

                            <h1 class="entry-title">{{$course->title}}</h1>
                            @if (Auth::check())
                                @role('Student')
                                <div class="card__subtitle float-right pr-3">
                                    <favorite
                                            :course={{$course->id}}
                                                    :favorited={{ $course->favorited() ? 'true' : 'false' }}
                                    ></favorite>
                                </div>
                                @endrole
                            @else
                                <div class="card__subtitle float-right pr-3">
                                    <a href="{{ route('login') }}">Записатися</a>
                                </div>
                            @endif
                            @if (Auth::check() )
                                @role('Student')
                                <div class="panel-footer">
                                    <span class="pull-left pl-3">
                                <button class="like-btn">
                                <i id="like{{$course->id}}"
                                   class="fa fa-thumbs-up glyphicon glyphicon-thumbs-up {{ auth()->user()->hasLiked($course) ? 'like-course' : '' }}"></i>
                                </button>
                                <span
                                        id="like{{$course->id}}-bs3">{{ $course->likers()->get()->count() }}
                                </span>
                                </span>
                                    <div>
                                        {{$course->liker}}
                                    </div>
                                </div>
                                @endrole




                            @else
                                <div class="panel-footer">

                                <span class="pull-left pl-3">
                                <span class="like-btn">
                                <i class="fa fa-thumbs-up"></i>

                                </span>{{$course->likers()->get()->count()}}
                                </span>

                                </div>

                            @endif
                        </header>
                        <div class="entry-content">
                            <p>{!! $course->content !!}
                            </p>
                            <?php $i = 1?>
                            @forelse($lessons as $lesson)
                                <article class="post">


                                    <!-- Marketing messaging and featurettes
                                    ================================================== -->
                                    <!-- Wrap the rest of the page in another container to center all the content. -->

                                    <div class="container marketing">


                                        <!-- START THE FEATURETTES -->


                                        <div class="row featurette">
                                            <div class="col-md-7">
                                                <h5 class="featurette-heading">Урок {!! $i++ !!}</h5>
                                                <h6>{{ $lesson->title }}</h6>
                                                <p>{{$lesson->description}}</p>
                                            </div>
                                            {{--<div class="col-md-5 mt-5">--}}
                                            {{--<img class="popular-img"src="../assets/images/p1.jpg">--}}
                                            {{--</div>--}}
                                        </div>


                                        <!-- /END THE FEATURETTES -->

                                    </div><!-- /.container -->


                                    <!-- FOOTER -->


                                </article>
                            @empty
                                <br>
                                <hr>
                                <p>В цьому курсі ще не має уроків</p>
                            @endforelse


                        </div>
                        {{--<div class="decoration">--}}
                        {{--<a href="#" class="btn btn-default">Decoration</a>--}}
                        {{--<a href="#" class="btn btn-default">Decoration</a>--}}
                        {{--</div>--}}


                    </div>
                </article>
                <div class="top-comment"><!--top comment-->
                    <img src="{{$course->getAuthorAvatar()}}" class="pull-left rounded-circle" alt="" height="50">
                    <h4>{{$course->getAuthorName()}}</h4>

                    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy hello ro mod tempor
                        invidunt ut labore et dolore magna aliquyam erat.</p>
                </div><!--top comment end-->

                <div class="bottom-comment"><!--bottom comment-->
                    <h4>3 comments</h4>

                    <div class="comment-img">
                        <img class="img-circle" src="assets/images/comment-img.jpg" alt="">
                    </div>

                    <div class="comment-text">
                        <a href="#" class="replay btn pull-right"> Replay</a>
                        <h5>Rubel Miah</h5>

                        <p class="comment-date">
                            December, 02, 2015 at 5:57 PM
                        </p>


                        <p class="para">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed
                            diam nonumy
                            eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam
                            voluptua. At vero eos et cusam et justo duo dolores et ea rebum.</p>
                    </div>
                </div>
                <!-- end bottom comment-->


                <div class="leave-comment"><!--leave comment-->
                    <h4>Leave a reply</h4>


                    <form class="form-horizontal contact-form" role="form" method="post" action="#">
                        <div class="form-group">
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                            </div>
                            <div class="col-md-6">
                                <input type="email" class="form-control" id="email" name="email"
                                       placeholder="Email">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" class="form-control" id="subject" name="subject"
                                       placeholder="Website url">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
										<textarea class="form-control" rows="6" name="message"
                                                  placeholder="Write Massage"></textarea>
                            </div>
                        </div>
                        <a href="#" class="btn send-btn">Post Comment</a>
                    </form>
                </div><!--end leave comment-->
            </div>
            <div class="col-lg-4" data-sticky_column>
                <div class="primary-sidebar">

                    <aside class="widget">
                        <h3 class="widget-title text-uppercase text-center">{{__('messages.POPULAR POSTS')}}</h3>

                        @forelse($populars as $popular)
                        <div class="popular-post">
                            <div class="p-content">
                                <a href="{{route('show_course.slug', $popular->followable->slug)}}" class="text-uppercase">{{ $popular->followable->title }}</a>
                                <span class="p-date">Рейтинг: {{$popular->count}}</span>
                            </div>
                        </div>
                        @empty
                            <p>No course created.</p>
                        @endforelse
                    </aside>

                    <aside class="widget pos-padding">
                        <h3 class="widget-title text-uppercase text-center">{{__('messages.Recent Posts')}}</h3>

                        <div class="thumb-latest-posts">
                            @forelse($courses as $course)
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
                    <aside class="widget border pos-padding">
                        <h3 class="widget-title text-uppercase text-center">{{__('messages.Categories')}}</h3>
                        <ul>
                            @foreach($categories as $category)
                                <li>
                                    <a href="{{route('category.slug', $category->slug)}}">{{$category->title}}</a>
                                    <span class="post-count pull-right"> {{$category->courses()->count()}}</span>
                                </li>
                            @endforeach

                        </ul>
                    </aside>

                </div>
            </div>
        </div>
    </div>

    <!-- end main content-->
@endsection