@extends('layouts.web')
@section('section')


    <!-- Services -->
    <div class="services-container">
        <div class="container">
            <div class="row">
                @foreach($post as $postitem)
                    <div class="col-sm-3">
                        <div class="service wow fadeInUp">
                            <div class="service-icon"><i class="{{$postitem->icon}}"></i></div>
                            <h3>{{$postitem->title}}</h3>
                            <p>{!! $postitem->desc !!}</p>
                            <a class="big-link-1" href="{{route('home.post.full',['postid'=>$postitem->id,])}}">Read more</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Call To Action -->
    <div class="call-to-action-container">
        <div class="container">
        </div>
    </div>
@endsection
