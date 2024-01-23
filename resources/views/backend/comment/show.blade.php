@extends('layouts.backend_master')

@section('title', 'Post details')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Post Information</h1>
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Post details</h6>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>post id</th>
                                <td>{{$infos->post_id}}</td>
                            </tr>
                            <tr>
                                <th>post title</th>
                                <td>{{$infos->postID->title}}</td>
                            </tr>
                            <tr>
                                <th>Comment</th>
                                <td>{{$infos->comment}}</td>
                            </tr>

                            <tr>
                                <th>Commented by</th>
                                <td >{{$infos->name}}</td>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td >{{$infos->phone}}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td >{{$infos->email}}</td>
                            </tr>
                            <tr>
                                <th>status</th>
                                <td>
                                    @if($infos->status == 1)
                                        <p class="text text-success">Active</p>
                                    @else
                                        <p class="text text-danger">De Active</p>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                            <tr>
                                <th>Created_at</th>
                                <td>{{$infos->created_at}}</td>
                            </tr>
                            <tr>
                                <th>Updated_at</th>
                                <td>{{$infos->updated_at}}</td>
                            </tr>
                        </table>
                        {{-- <div class="mt-2">
                             {{$categories['records']->links()}}
                         </div> --}}
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>

@endsection
