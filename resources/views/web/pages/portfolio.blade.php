@extends('layouts.web')
@section('section')

    <div class="portfolio-container">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 portfolio-masonry">
                    @foreach($post as $postitem)
                        <div class="portfolio-box web-design">
                            <div class="portfolio-box-container">

                                <img src="{{asset('images/'.$postitem->img)}}" alt=""
                                     data-at2x="assets/img/portfolio/work1.jpg">
                                <div class="portfolio-box-text">
                                    <h3>{{$postitem->title}}</h3>
                                    <p>{!! $postitem->desc !!}</p>
                                    <a class="big-link-2"
                                       href="{{route('home.post.full',['postid'=>$postitem->id])}}"><i
                                            class="fa fa-link"></i></a>
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection
