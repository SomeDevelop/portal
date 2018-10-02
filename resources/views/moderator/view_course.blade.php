@extends('moderator.layout')
@section('content-1')


    <div class="container moderator-bg">
        <div class="col-md-12 mb-3 mt-3">
            <br>
            <h3 class="text-center">{{$course->title}}</h3>
            <h5 class="text-center"><span class="badge badge-secondary"> {{$course->getCategoryTitle()}}</span></h5>
            <img src="{{$course->getAuthorAvatar()}}" alt="" height="75">
            <span>Автор: {{$course->AuthorName()}}</span>
            <p>{!! $course->content !!}</p>
        </div>
        <div class="col-lg-12 mb-3 text-center">
            <img src="{{$course->getImage()}}" alt="">
        </div>
        <div class="col-md-12 mb-3">

            <?php $i = 1?>
            @forelse($lessons as $lesson)


                <div class="card-deck">


                    <a href="#"><h5 class="float-left mt-2">Урок {!! $i++ !!}</h5></a>

                    <div class="next-bg">

                        <div class="card-body">
                            <h6>Тема: {{ $lesson->title }}</h6>
                            <div>{{$lesson->description}}</div>
                        </div>
                        
                    </div>
                </div>
                    <hr>
            @empty

                <p class="mb-3">Не має уроків</p>

            @endforelse
        </div>


    </div>

@endsection
