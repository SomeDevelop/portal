@extends('owner.layout')

@section('content-1')


                            <div class="container marketing">

                                <!-- Three columns of text below the carousel -->
                                <div class="row">
                                    <div class="col-lg-2">
                                        <img class="rounded-circle text-center" src="/img/1.jpg" alt="Generic placeholder image" width="140" height="140">
                                        {{--<p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>--}}
                                        {{--<p><a class="btn btn-secondary" href="#" role="button">View details »</a></p>--}}
                                    </div><!-- /.col-lg-4 -->
                                    <div class="col-lg-10">
                                        {{--<img class="rounded-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">--}}
                                        <h2>{{ Auth::user()->name }}</h2>

                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius accusantium voluptate sint quia nam culpa quam voluptatum eveniet quidem perspiciatis laudantium ullam ea, dicta natus eaque, enim tempore reiciendis veritatis. Tenetur laboriosam nulla libero doloremque eius aspernatur natus molestiae quidem earum ex itaque commodi, maiores eos non delectus deleniti, ab, laudantium sunt soluta quasi? Est laborum quas dolor, ut nobis voluptatum, consectetur eum excepturi, quidem assumenda aut aperiam magni quia sit vel, et quo earum sint eveniet cumque ea. Saepe eligendi eum alias beatae recusandae, non voluptatum voluptatibus, reprehenderit sunt, numquam itaque tenetur commodi sit fugit quas voluptas modi. Odio.            </p>
                                        {{--<p><a class="btn btn-secondary" href="#" role="button">View details »</a></p>--}}
                                    </div><!-- /.col-lg-4 -->

                                </div><!-- /.row -->


                                <!-- START THE FEATURETTES -->

                                <hr class="featurette-divider">

                                <div class="row featurette">
                                    <div class="col-md-7">
                                        <h2 class="featurette-heading">First featurette heading. <span class="text-muted">It'll blow your mind.</span></h2>
                                        <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
                                    </div>
                                    <div class="col-md-5">
                                        <img class="featurette-image img-fluid mx-auto" data-src="holder.js/100x100/auto" alt="500x500" style="width: 400px; height: 200px;" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22500%22%20height%3D%22500%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20500%20500%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_165be1e71b7%20text%20%7B%20fill%3A%23AAAAAA%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A25pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_165be1e71b7%22%3E%3Crect%20width%3D%22500%22%20height%3D%22500%22%20fill%3D%22%23EEEEEE%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22185.140625%22%20y%3D%22260.996875%22%3E500x500%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true">
                                    </div>
                                </div>



                                <hr class="featurette-divider">

                                <!-- /END THE FEATURETTES -->

                            </div>

                        {{--<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">--}}
                            {{--@include('owner.my_courses')--}}
                        {{--</div>--}}
                        {{--<div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"><h2>Upload</h2></div>--}}
                        {{--<div class="tab-pane fade" id="pills-students" role="tabpanel" aria-labelledby="pills-students-tab"><h2>Students</h2></div>--}}
                        {{--<div class="tab-pane fade" id="pills-settings" role="tabpanel" aria-labelledby="pills-settings-tab"><h2>Settings</h2></div>--}}


@endsection
