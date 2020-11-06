@extends('layouts.web')
@section('section')

    <div class="portfolio-container">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 portfolio-masonry">

                    <div class="portfolio-box web-design">
                        <div class="portfolio-box-container">
                            <img src="{{asset('assets/img/portfolio/work1.jpg')}}" alt="" data-at2x="assets/img/portfolio/work1.jpg">
                            <div class="portfolio-box-text">
                                <h3>Lorem Website</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
