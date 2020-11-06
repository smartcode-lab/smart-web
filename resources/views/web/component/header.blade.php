<div class="container">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-navbar-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/" >A</a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="top-navbar-1">
        <ul class="nav navbar-nav navbar-right">
            <li @if(!isset($slug)) class="active" @endif>
                <a href="{{url('/')}}">
                    <i class="fa fa-home"></i><br>Home
                </a>
                {{--<ul class="dropdown-menu dropdown-menu-left" role="menu">
                    <li class="active"><a href="/">Home</a></li>
                </ul>--}}
            </li>
            @foreach($menu AS $item)
            <li @if(isset($slug) && $slug == $item->slug) class="active" @endif>
                <a href="{{route('home.post',['slug'=>$item->slug])}}"><i class="fa {{$item->ucin}}"></i><br>{{$item->title}}</a>
            </li>
            @endforeach
           <!--
            <li>
                <a href="services.html"><i class="fa fa-tasks"></i><br>Services</a>
            </li>
            <li>
                <a href="about.html"><i class="fa fa-user"></i><br>About</a>
            </li>
            <li>
                <a href="contact.html"><i class="fa fa-envelope"></i><br>Contact</a>
            </li>
            -->
        </ul>
    </div>
</div>
