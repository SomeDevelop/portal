@extends('layouts.app')

@section('content')
    <!--main content start-->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 bg-white mb-3 pl-5 p-2">
                    <h3>
                        <a href="{{route('main')}}">{{ __('messages.HOME') }}</a>
                        <span class="castom-a"> > </span>
                        <a href="{{route('authors')}}">{{ __('messages.teachers') }}</a>
                        <span class="castom-a"> > {{$author->name}}</span>
                    </h3>
                </div>
                <div class="col-md-8">
                    <div class="leave-comment mr0"><!--leave comment-->
                        <img src="{{$author->getAvatar()}}" alt="" class="profile-image pull-right" height="150">
                        <div>
                            <h5 class="text-uppercase">{{$author->name}}</h5>

                            <br>
                            <br>
                            <div>
                                Всього курсів: {{$author_courses->count()}}

                                <br>
                                <?php $p = 0; ?>
                                @foreach($author_courses as $course)
                                    <?php

                                    $p = $p + $course->likers()->get()->count() ?>


                                @endforeach

                            </div>
                            <div>
                                Рейтинг: {{$p+$author_courses->count()*10}}
                                <br>
                                <br>
                            </div>
                        </div>
                    </div>
                    <div class="leave-comment mr0">
                        Курси автора:
                        <br><br>
                        @forelse($author_courses->where('status',1) as $author_course)
                            <div>
                                <a href="{{route('show_course.slug', $author_course->slug)}}">{{$author_course->title}}</a>
                                <span class="badge badge-secondary">рейтинг {{$author_course->likers()->get()->count()}}</span>
                            </div>
                            <br>
                        @empty
                            <p>У автора ще не має курсів</p>
                        @endforelse
                    </div>
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
                                            <a href="{{route('show_course.slug', $popular->followable->slug)}}"
                                               class="text-uppercase">{{ $popular->followable->title }}</a>
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