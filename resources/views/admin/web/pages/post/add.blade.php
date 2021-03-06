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
                    <a href="{{route('admin.post.add')}}">
                        <button type="button" class="btn btn-success">
                            <i class="fa fa-plus"></i> Add Post
                        </button>
                    </a>
                </div>
                <div class="card-body">
                    <div class="modal-body">
                        <form method="post" action="{{route('admin.post.add')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="inputAddress">type</label>
                                <select id="inputState" class="form-control" name="type">
                                    <option value="about">about</option>
                                    <option value="contact">contact</option>
                                    <option value="portfolio">portfolio</option>
                                    <option value="services">services</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">menu</label>
                                <select id="inputState" class="form-control" name="menu">
                                    @foreach($menu as $menuitem)
                                        <option value="{{$menuitem->uuid}}">{{$menuitem->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" placeholder="title" name="title"
                                       value="{{old('title')}}">
                            </div>
                            <div class="form-group">
                                <label for="desc">desc</label>
                                <textarea name="desc" id="desc">{{old('desc')}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="text">text</label>
                                <textarea name="text" id="text">{{old('text')}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="slug">Slug</label>
                                <input type="text" class="form-control" id="slug" placeholder="slug" name="slug"
                                       value="{{old('slug')}}">
                            </div>
                            <div class="form-group">
                                <label for="icon">icon</label>
                                <input type="text" class="form-control" id="icon" placeholder="icon" name="icon"
                                       value="{{old('icon')}}">
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" name="img">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                                <br>
                            </div>
                            <br>
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
    </main>
@endsection
