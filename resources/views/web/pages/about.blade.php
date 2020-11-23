@extends('layouts.web')
@section('section')

    <!-- About Us Text -->
    <div class="about-us-container">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 about-us-text wow fadeInLeft">
                    @foreach($post as $postitem)
                        <h3>{{$postitem->title}}</h3>
                        <p>{!! $postitem->text !!}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
