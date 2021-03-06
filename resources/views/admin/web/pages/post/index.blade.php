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
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>title</th>
                                <th>type</th>
                                <th>created_at</th>
                                <th>updated_at</th>
                                <th>action</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>id</th>
                                <th>title</th>
                                <th>type</th>
                                <th>created_at</th>
                                <th>updated_at</th>
                                <th>action</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($postAll as $postAllitem)
                                <tr>
                                    <td>{{$postAllitem->id}}</td>
                                    <td>{{$postAllitem->title}}</td>
                                    <td>{{$postAllitem->type}}</td>
                                    <td>{{date('d-m-Y', strtotime($postAllitem->created_at))}}</td>
                                    <td>{{date('d-m-Y', strtotime($postAllitem->updated_at))}}</td>
                                    <td>
                                        <a href="{{route('admin.post.edit',['postid'=>$postAllitem->id])}}">
                                            <button class="btn btn-success"><i class="fa fa-edit"></i> Edit</button>
                                        </a>
                                        <a href="{{route('admin.post.delete',['postid'=>$postAllitem->id])}}">
                                            <button class="btn btn-warning"><i class="fa fa-trash"></i> Delete</button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
