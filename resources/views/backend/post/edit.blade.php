@extends('layouts.backend_master')

@section('title', 'Edit post')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Post Edit</h1>
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Post Edit Form</h6>
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
                        <form action="{{route('backend.post.update', $post['record']->id )}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">

                            <div class="form-group">
                                <label for="category_id">Category</label>
                                <select  class="form-control" name="category_id">
                                    <option value="">Select Categories</option>
                                    @foreach($post['categories'] as $category)

                                            <option value="{{$category->id}}" {{$category->id == $post['record']->category_id ? 'selected':''}}>{{$category->title}}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <span class="text text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" name="title" value="{{$post['record']->title}}" placeholder="Enter title" />
                                @error('title')
                                <span class="text text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="slug">Slug</label>
                                <input type="text" class="form-control" name="slug" value="{{$post['record']->slug}}" placeholder="Enter slug" />
                                @error('slug')
                                <span class="text text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="short_description">Short Description</label>
                                <textarea type="text" class="form-control" name="short_description" placeholder="Enter short description" >{{$post['record']->short_description}}</textarea>
                                @error('short description')
                                <span class="text text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea type="text" class="form-control" name="description" placeholder="Enter description" >{{$post['record']->description}}</textarea>
                                @error('description')
                                <span class="text text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="image_file">Feature Image</label>
                                <input type="file" class="form-control" name="image_file" readonly>
                                @error('feature_image')
                                <span class="text text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="tag_id">Tag</label>
                                <select  class="form-control" name="tag_id" multiple>
                                    <option value="">Select Tags</option>
                                    @foreach($data['tags'] as $tag)
                                        <option value="{{$tag->id}}" {{in_array($tag->id, $tagId) ? 'selected': ''}}>{{$tag->title}}</option>
                                    @endforeach
                                </select>
                                @error('tag_id')
                                <span class="text text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Status</label>
                                @if( $post['record']->status == 1)
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
