@extends('layouts.backend_master')

@section('title', 'edit tag')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Tag Edit</h1>
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Tag edit form</h6>
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
                        <form action="{{route('backend.tag.update',  $tag['record']->id)}}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" name="title" value="{{ $tag['record']->title}}" placeholder="Enter title" />
                                @error('title')
                                <span class="text text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="slug">Slug</label>
                                <input type="text" class="form-control" name="slug" value="{{ $tag['record']->slug}}" placeholder="Enter slug" />
                                @error('slug')
                                <span class="text text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Status</label>
                                @if( $tag['record']->status ==   1)
                                    <div class="form-check" >
                                        <input  type="radio" name="status"  value="1" checked >
                                        <label class="form-check-label mr-5" >
                                            Active
                                        </label>
                                        <input   type="radio" name="status"  value="0"  >
                                        <label class="form-check-label" >
                                            Not Active
                                        </label>
                                    </div>
                                @else
                                    <div class="form-check" >
                                        <input  type="radio" name="status"  value="1" >
                                        <label class="form-check-label mr-5" >
                                            Active
                                        </label>
                                        <input   type="radio" name="status"  value="0" checked >
                                        <label class="form-check-label" >
                                            Not Active
                                        </label>
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>

@endsection
