@extends('layouts.app')

@section('content')
    <!--main content start-->
    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="leave-comment mr0"><!--leave comment-->


                    </div>

                </div>


                <div class="col-lg-4" data-sticky_column>
                    <div class="primary-sidebar">

                        <aside class="widget">
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

                        <aside class="widget pos-padding">
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
                        <aside class="widget border pos-padding">
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