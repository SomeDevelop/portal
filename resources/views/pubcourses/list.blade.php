@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="container">
            <div class="row justify-content-center">
                <div>
                    <div class="row">
                        <div class="col-lg-12 bg-white mb-3 pl-5 p-2">
                            <h3>
                                <a href="{{route('main')}}">{{ __('messages.HOME') }}</a>
                                <span class="castom-a"> > {{$cat->title}}</span>
                            </h3>
                        </div>
                        <div class="col-lg-12 bg-white mb-3">
                            <header class="codrops-header">
                                <h4 class="main-color">{{$cat->title}}</h4>
                                <nav class="codrops-demos m-2">
                                    <a href="{{route('publiccourses')}}">{{ __('messages.Courses') }} <span class="course-count pull-right"> ({{$allcourses->count()}})</span></a>
                                    @forelse ($categories as $category)

                                        <a href="{{route('category.slug', $category->slug)}}">{{$category->title}}
                                            <span class="course-count pull-right"> ({{$category->courses()->where('status',1)->count()}})</span></a>

                                    @empty
                                        <div class="col-lg-12 col-md-12 cart">
                                            <div class="cart">

                                                <p>No course created.</p>
                                            </div>
                                        </div>

                                    @endforelse
                                </nav>
                            </header>
                        </div>
                        @forelse ($courses as $course)
                            <div class="col-lg-3 col-md-6 p-0 pr-3 cart">
                                <div class="cart" data-id="{{ $course->id }}">
                                    <article class="post post-grid">
                                        <div class="post-thumb">
                                            <a href="#"><img src="{{$course->getFullImage()}}" alt="" height="150"></a>

                                            <a href="{{route('show_course.slug', $course->slug)}}" class="post-thumb-overlay text-center">
                                                <div class="text-uppercase text-center">{{__('messages.View Course')}}</div>
                                            </a>
                                        </div>


                                        <div class="post-content p-0">

                                            <header class="entry-header text-center card-header castom-card-header m-0">

                                                <h6><a href="{{route('category.slug', $course->getCategorySluge())}}">{{$course->getCategoryTitle()}}</a></h6>

                                                <h1 class="entry-title"><a href="{{route('show_course.slug', $course->slug)}}">{{$course->title}}</a></h1>


                                            </header>
                                            <div class="entry-content">

                                                <div class="social-share">
                                                    <span class="social-share-title pull-left text-capitalize">Автор: {{$course->getAuthorName()}}</span>
                                                    <span class="float-right text-capitalize">{{$course->date}}</span>
                                                </div>

                                            </div>
                                        </div>

                                    </article>
                                </div>
                            </div>
                        @empty
                            <div class="col-lg-12 col-md-12 cart">
                                <div class="cart">

                            <p>No course created.</p>
                                </div>
                            </div>

                        @endforelse

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection