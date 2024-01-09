@extends('layouts.backend_master')

@section('title', 'Post list')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Post list</h1>
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Post information</h6>
                    </div>

                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{session('success')}}
                            </div>
                        @endif
                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{session('error')}}
                            </div>
                        @endif
                        <table class="table table-bordered">
                            <tr>
                                <th>Sn</th>
                                <th>Title</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            @foreach($posts['records'] as $iteration => $post)
                                <tr>
                                    <td>{{$iteration+1}}</td>
                                    <td>{{$post->title}}</td>
                                    <td>
                                        @if($post->status == 1)
                                            <p class="text text-success">Active</p>
                                        @else
                                            <p class="text text-danger">De Active</p>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('backend.post.show', $post->id)}}" class="btn btn-success">View</a>
                                         <a href="{{route('backend.post.edit', $post->id)}}" class="btn btn-warning">Edit</a>
                                        <form method="post" action="{{route('backend.post.destroy', $post->id)}}">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="submit" class="btn btn-danger" value="DELETE">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
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
