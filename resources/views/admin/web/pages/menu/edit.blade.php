@extends('admin.layouts.web')
@section('section')

    <main>
        <div class="container-fluid">
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                <li class="breadcrumb-item active">Posts</li>
            </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalLong">
                        <i class="fa fa-plus"></i> Add Post
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="modal-body">
                            <form method="post" action="{{route('admin.menu.edit',['menuid'=>$menu->id])}}">
                                @csrf
                                <div class="form-group">
                                    <label for="inputAddress">type</label>
                                    <select id="inputState" class="form-control" name="type">
                                        <option {{$menu->type == 'about' ? 'selected' : ''}} name="about">about</option>
                                        <option {{$menu->type == 'contact' ? 'selected' : ''}} name="contact">contact</option>
                                        <option {{$menu->type == 'portfolio' ? 'selected' : ''}} name="portfolio">portfolio</option>
                                        <option {{$menu->type == 'services' ? 'selected' : ''}} name="services">services</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="title" placeholder="title" name="title" value="{{$menu->title}}">
                                </div>
                                <div class="form-group">
                                    <label for="slug">Slug</label>
                                    <input type="text" class="form-control" id="slug" placeholder="slug" name="slug" value="{{$menu->slug}}">
                                </div>
                                <div class="form-group">
                                    <label for="ucin">ucin</label>
                                    <input type="text" class="form-control" id="ucin" placeholder="ucin" name="ucin" value="{{$menu->ucin}}">
                                </div>
                                <button type="submit" class="btn btn-primary">save</button>
                            </form>
                            <br>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    @include('admin.web.pages.menu.component.add_form')

    </div>
@endsection
