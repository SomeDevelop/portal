@extends('owner.layout')

@section('content-1')
    <div class="container">
        <div class="row">
            <div class="col-md-2 mb-3">
                <a class="btn btn-md btn-pinterest add-course" href="{{route('owner_courses.create')}}">Новий курс</a>
            </div>

        </div>
        <div class="row">

            @forelse($courses as $cours)
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="{{$cours->getImage()}}" data-holder-rendered="true">
                        <div class="card-body">
                            <small class="text-muted float-right text-blue">{{$cours->is_free()}}</small>
                            <h3>{{$cours->title}}</h3>

                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="{{route('course_lessons.course', ['course' => $cours->id])}}"><button type="button" class="btn btn-sm btn-outline-secondary">View</button></a>


                                    <a href="{{route('owner_courses.edit', $cours->id)}}"><button type="button" class="btn btn-sm btn-outline-secondary">Edit</button></a>
                                    <a>
                                    {{Form::open(['route'=>['owner_courses.destroy', $cours->id], 'method'=>'delete'])}}
                                        <button onclick="return confirm('are you sure?')" type="submit" class="btn btn-sm btn-outline-secondary">Delete</button>
                                    {{Form::close()}}
                                    </a>

                                </div>
                                <small class="text-muted float-right">{{$cours->date}}</small>
                            </div>


                        </div>
                    </div>
                </div>
            @empty

                <p>У Вас ще не має курсів</p>

            @endforelse
        </div>


    </div>

    {{--<div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"><h2>Upload</h2></div>--}}
    {{--<div class="tab-pane fade" id="pills-students" role="tabpanel" aria-labelledby="pills-students-tab"><h2>Students</h2></div>--}}
    {{--<div class="tab-pane fade" id="pills-settings" role="tabpanel" aria-labelledby="pills-settings-tab"><h2>Settings</h2></div>--}}


@endsection