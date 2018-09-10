@extends('layouts.app')

@section('content')
    <div class="container">
        <header class="codrops-header">
            <div>
                <a style="font-size: 40px;" href="{{route('home')}}" title="Back"><span><i
                                class="fa fa-arrow-circle-left" aria-hidden="true"></i></span>

                </a>
                <p>Всі Курси</p>

            </div>

        </header>
        <div class="container">
            <div class="row justify-content-center">
            <div class="col-md-8 col-md-offset-2">
                <div class="page-header">
                    <h3 class="text-center">Мої Курси</h3>
                </div>
                <hr>
                @forelse ($myFavorites as $myFavorite)
                    <div class="panel panel-default">
                        @role('Student')
                            <a class="float-right" href="{{route('my_favorite.course', ['course' => $myFavorite->id])}}">Відкрити</a>
                        @endrole

                        @role('Admin')
                        <a class="float-right" href="{{route('my_favorite.course', ['course' => $myFavorite->id])}}">Відкрити</a>
                        @endrole
                        <div class="panel-heading">
                            {{ $myFavorite->title }}
                        </div>


                        <div class="panel-body">
                            {{ $myFavorite->date }}
                        </div>

                        <hr>
                        <br>
{{--                        {{dd($myFavorite->id)}}--}}
{{--                        <a href="{{route('/my_favorites/', $myFavorite->id)}}">Відкрити</a>--}}



                    </div>
                @empty
                    <p>Ви ще не записалися ні на один курс</p>
                @endforelse
            </div>
        </div>
        </div>
    </div>
@endsection
