@extends('owner.layout')

@section('content-1')
    <div class="container">
            <div class="row">
                <div class="col-md-2 mb-3">
                    <a class="btn btn-md btn-info add-course" href="{{route('owner_courses.create')}}">Новий курс</a>
                </div>

            </div>
        <div class="row">

            @forelse($courses as $cours)

                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 p-0 pr-3 cart courses">
                    <div class="cart">
                        <article class="post post-grid">
                            <div class="post-thumb">
                                <a href="#"><img src="{{$cours->getImage()}}" alt="" height="150"></a>


                            <div class="post-content p-0">

                                <header class="entry-header text-center card-header castom-card-header owner-card-header m-0">

                                    <h6>{{$cours->title}}</h6>

                                </header>

                                <div class="d-flex justify-content-between align-items-center bg-white">
                                    <div class="btn-group pl-3 pb-2">
                                        <a href="{{route('course_lessons.course', ['course' => $cours->id])}}"><button type="button" class="btn btn-sm btn-outline-secondary">View</button></a>


                                        <a href="{{route('owner_courses.edit', $cours->id)}}"><button type="button" class="btn btn-sm btn-outline-secondary">Edit</button></a>
                                        <a>
                                            {{Form::open(['route'=>['owner_courses.destroy', $cours->id], 'method'=>'delete'])}}
                                            <button onclick="return confirm('are you sure?')" type="submit" class="btn btn-sm btn-outline-secondary">Delete</button>
                                            {{Form::close()}}
                                        </a>

                                    </div>
                                    <span class="text-muted text-right pr-3">{{$cours->created_at->format('d-m-y')}}</span>
                                </div>
                            </div>
                            </div>
                        </article>
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