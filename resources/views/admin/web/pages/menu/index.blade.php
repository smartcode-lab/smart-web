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
                    <i class="fas fa-table mr-1"></i>
                    Post List
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
                            @foreach($meniuAll as $meniuAllitem)
                                <tr>
                                    <td>{{$meniuAllitem->id}}</td>
                                    <td>{{$meniuAllitem->title}}</td>
                                    <td>{{$meniuAllitem->type}}</td>
                                    <td>{{date('d-m-Y', strtotime($meniuAllitem->created_at))}}</td>
                                    <td>{{date('d-m-Y', strtotime($meniuAllitem->updated_at))}}</td>
                                    <td>

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
