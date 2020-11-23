@extends('layouts.web')
@section('section')
<!-- Slider -->
<!-- Slider 2 -->
<div class="slider-2-container">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2 slider-2-text wow fadeInUp">
                <h1>We are <span class="violet">Andia</span> a super cool design agency.</h1>
                <p>We design beautiful websites, logos and prints. Your project is safe with us.</p>
            </div>
        </div>
    </div>
</div>

<!-- Services -->
<div class="services-container">
    <div class="container">
        <div class="row">
            @foreach($postserv as $postservitem)
            <div class="col-sm-3">
                <div class="service wow fadeInUp">
                    <div class="service-icon"><i class="{{$postservitem->icon}}"></i></div>
                    <h3>{{$postservitem->title}}</h3>
                    <p>{!! $postservitem->desc !!}</p>
                    <a class="big-link-1" href="{{route('home.post.full',['postid'=>$postservitem->id])}}">Read more</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Latest work -->
<div class="work-container">
    <div class="container">
        <div class="row">
            @foreach($postprofile as $postprofileitem)
            <div class="col-sm-3">
                <div class="work wow fadeInUp">
                    <img src="{{asset('images/'.$postprofileitem->img)}}" alt="Lorem Website" data-at2x="assets/img/portfolio/work1.jpg">
                    <h3>{{$postprofileitem->title}}</h3>
                    <p>{!! $postprofileitem->desc !!}</p>
                    <div class="work-bottom">
                        <a class="big-link-2 view-work" href="{{asset('images/'.$postprofileitem->img)}}"><i class="fa fa-search"></i></a>
                        <a class="big-link-2" href="{{route('home.post.full',['postid'=>$postprofileitem->id])}}"><i class="fa fa-link"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Testimonials -->
<div class="testimonials-container">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 testimonials-title wow fadeIn">
                <h2>Testimonials</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1 testimonial-list">
                <div role="tabpanel">
                    <!-- Tab panes -->
                    <div class="tab-content">
                        @foreach($ebautpost as $ebautpostitem)
                        <div role="tabpanel" class="tab-pane fade in active" id="tab{{$ebautpostitem->id}}">
                            <div class="testimonial-image">
                                <img src="{{asset('images/'.$ebautpostitem->img)}}" alt="" data-at2x="assets/img/testimonials/1.jpg">
                            </div>
                            <div class="testimonial-text">
                                <p>{!! $ebautpostitem->text !!}</p>
                            </div>
                        </div>
                        @endforeach
                        <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                @foreach($ebautpost as $ebautpostitem)
                                <li role="presentation" class="active">
                                    <a href="#tab{{$ebautpostitem->id}}" aria-controls="tab{{$ebautpostitem->id}}" role="tab" data-toggle="tab"></a>
                                </li>
                                @endforeach
                            </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
