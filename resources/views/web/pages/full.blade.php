@extends('layouts.web')
@section('section')

    <!-- About Us Text -->
    <div class="about-us-container">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 about-us-text wow fadeInLeft">
                    <h3>{{$fullpost->title}}</h3>
                    <p>{!! $fullpost->text !!}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
