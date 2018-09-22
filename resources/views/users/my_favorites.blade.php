@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="container">
            <header class="codrops-header">
                <h3 class="text-center">{{__('messages.student_panel')}}</h3>

                <div>
                    <a style="font-size: 40px;" href="{{route('publiccourses')}}" title="Back"><span><i
                                    class="fa fa-arrow-circle-left" aria-hidden="true"></i></span>

                    </a>
                    <p>Всі Курси</p>

                </div>

            </header>
            <div class="row justify-content-center">
            <div class="col-lg-8 col-md-offset-2">
                <article class="post">
                    <div class="container marketing">
                <div class="page-header mt-3">

                </div>

                        <br>

                        <h4 class="text-center">Список подписок </h4>
                        <br>
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
                            <hr>
                    <p>Ви ще не записалися ні на один курс</p>
                @endforelse
                        <br>
                        <br>
                    </div>
                </article>
                <article class="post">
                    <h4 class="text-center">Тести</h4>

                </article>
                <article class="post">
                    <h4 class="text-center">Мої Сертифікати</h4>

                </article>
            </div>


                {{--<div class="col-lg-8 col-md-offset-2">--}}
                {{--</div>--}}

                @include('users._sidebar')
            </div>


        </div>
    </div>
@endsection
