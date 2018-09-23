@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="container">
            <div class="col-lg-12 bg-white mb-3 pl-5 p-2">
                <h3>
                    <a href="{{route('main')}}">{{ __('messages.HOME') }}</a>
                    <span class="castom-a"> > {{ __('messages.student_panel') }}</span>
                </h3>
            </div>
            <div class="row justify-content-center">
            <div class="col-lg-8 col-md-offset-2">
                <article class="post">
                    <div class="container marketing">
                <div class="page-header mt-4">

                </div>
                        <h4 class="text-center">Ваші курси</h4>


                        <hr>
                    @forelse ($myFavorites as $myFavorite)
                    <div class="panel panel-default">
                        @role('Student')
                            <a class="float-right" href="{{route('course.course', ['course' => $myFavorite->slug])}}">Відкрити</a>
                        @endrole


                        <div class="panel-heading">
                            <h5>{{ $myFavorite->title }}</h5>
                        </div>





                        <br>
{{--                        {{dd($myFavorite->id)}}--}}
{{--                        <a href="{{route('/my_favorites/', $myFavorite->id)}}">Відкрити</a>--}}



                    </div>
                @empty

                    <p>Ви ще не записалися ні на один курс</p>
                @endforelse
                        <br>
                        <br>
                    </div>
                </article>
                <article class="post">
                    <h4 class="text-center mt-4">Тести</h4>

                    <hr>
                </article>
                <article class="post">
                    <h4 class="text-center mt-4">Мої Сертифікати</h4>

                    <hr>
                </article>
            </div>


                {{--<div class="col-lg-8 col-md-offset-2">--}}
                {{--</div>--}}

                @include('users._sidebar')
            </div>


        </div>
    </div>
@endsection
