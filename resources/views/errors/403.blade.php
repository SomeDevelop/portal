@extends('layouts.app')

@section('content')
    <section class="page_404">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 ">
                    <div class="col-sm-10 col-sm-offset-1  text-center">
                        <div class="four_zero_four_bg">
                            <h1 class="text-center ">403</h1>


                        </div>

                        <div class="contant_box_404">
                            <h3 class="h2">
                                {{__("messages.look_like_you_re_lost")}}
                                {{--Look like you're lost--}}

                            </h3>


                            <h5>
                                {{--the page you are looking for not avaible!--}}
                                {{__("messages.the page you are looking for not avaible")}}

                            </h5>

                            <a href="{{ url('/') }}" class="link_404">
                                {{__("messages.to_home")}}

                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection