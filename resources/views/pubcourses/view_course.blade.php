@extends('layouts.app')

@section('content')
    <!--main content start-->

        <div class="container">
            <div class="row">
                <div class="col-lg-12 bg-white mb-3 pl-5 p-2">
                    <h3>
                        <a href="{{route('main')}}">{{ __('messages.HOME') }}</a>
                        <span class="castom-a"> > {{ __('messages.Courses') }}</span>
                    </h3>
                </div>
                <div class="col-lg-8">
                    <article class="post">
                        <div class="post-thumb">
                            <img src="{{$course->getFullImage()}}" alt="">
                        </div>
                        <div class="post-content">
                            <header class="entry-header text-center text-uppercase">
                                <h6><a href="{{route('category.slug', $course->getCategorySluge())}}"> {{$course->getCategoryTitle()}}</a></h6>

                                <h1 class="entry-title">{{$course->title}}</h1>


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

                            <div class="social-share">
							<span
                                    class="social-share-title pull-left text-capitalize pl-3">Автор: {{$course->getAuthorName()}}</span>
                                <span class="float-right pr-3">{{$course->date}}</span>
                                {{--<ul class="text-center pull-right">--}}
                                    {{--<li><a class="s-facebook" href="#"><i class="fa fa-facebook"></i></a></li>--}}
                                    {{--<li><a class="s-twitter" href="#"><i class="fa fa-twitter"></i></a></li>--}}
                                    {{--<li><a class="s-google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>--}}
                                    {{--<li><a class="s-linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>--}}
                                    {{--<li><a class="s-instagram" href="#"><i class="fa fa-instagram"></i></a></li>--}}
                                {{--</ul>--}}
                            </div>
                        </div>
                    </article>
                    <div class="top-comment"><!--top comment-->
                        <img src="assets/images/comment.jpg" class="pull-left img-circle" alt="">
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

                            <div class="popular-post">


                                <a href="#" class="popular-img"><img src="assets/images/p1.jpg" alt="">

                                    <div class="p-overlay"></div>
                                </a>

                                <div class="p-content">
                                    <a href="#" class="text-uppercase">Home is peaceful Place</a>
                                    <span class="p-date">February 15, 2016</span>

                                </div>
                            </div>
                            <div class="popular-post">

                                <a href="#" class="popular-img"><img src="assets/images/p1.jpg" alt="">

                                    <div class="p-overlay"></div>
                                </a>

                                <div class="p-content">
                                    <a href="#" class="text-uppercase">Home is peaceful Place</a>
                                    <span class="p-date">February 15, 2016</span>
                                </div>
                            </div>
                            <div class="popular-post">


                                <a href="#" class="popular-img"><img src="assets/images/p1.jpg" alt="">

                                    <div class="p-overlay"></div>
                                </a>

                                <div class="p-content">
                                    <a href="#" class="text-uppercase">Home is peaceful Place</a>
                                    <span class="p-date">February 15, 2016</span>
                                </div>
                            </div>
                        </aside>

                        <aside class="widget pos-padding">
                            <h3 class="widget-title text-uppercase text-center">{{__('messages.Recent Posts')}}</h3>

                            <div class="thumb-latest-posts">
                                @forelse($courses as $course)
                                <div class="media">
                                    <div class="media-left">
                                        <a href="#"><img src="{{$course->getFullImage()}}" alt="" width="75">

                                            <div class="p-overlay"></div>
                                        </a>
                                    </div>
                                    <div class="p-content">
                                        <a href="#" class="text-uppercase">{{$course->title}}</a>
                                        <span class="p-date">{{$course->created_at->format('d/m/Y')}}</span>
                                    </div>
                                </div>
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