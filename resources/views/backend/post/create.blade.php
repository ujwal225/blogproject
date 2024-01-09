@extends('layouts.backend_master')

@section('title', 'Create post')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Post Create</h1>
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Post Form</h6>
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
                        <form action="{{route('backend.post.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="category_id">Category</label>
                                <select  class="form-control" name="category_id">
                                    <option value="">Select Categories</option>
                                    @foreach($data['categories'] as $category)
                                        <option value="{{$category->id}}">{{$category->title}}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <span class="text text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" name="title" value="{{old('title')}}" placeholder="Enter title" />
                                @error('title')
                                <span class="text text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="slug">Slug</label>
                                <input type="text" class="form-control" name="slug" value="{{old('slug')}}" placeholder="Enter slug" />
                                @error('slug')
                                <span class="text text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="short_description">Short Description</label>
                                <textarea type="text" class="form-control" name="short_description" value="{{old('short_description')}}" placeholder="Enter short description" ></textarea>
                                @error('short_description')
                                <span class="text text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea type="text" class="form-control" name="description" value="{{old('description')}}" placeholder="Enter description" ></textarea>
                                @error('description')
                                <span class="text text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="image_file">Feature Image</label>
                                <input type="file" class="form-control" name="image_file" value="{{old('image')}}"  />
                                @error('feature_image')
                                <span class="text text-danger">{{$message}}</span>
                                @enderror
                            </div>

                          <div class="form-group">
                                <label for="tag_id[]">Tag</label>
                                <select  class="form-control" name="tag_id[]" multiple>
                                    <option value="">Select Tags</option>
                                    @foreach($data['tags'] as $tag)
                                        <option value="{{$tag->id}}">{{$tag->title}}</option>
                                    @endforeach
                                </select>
                                @error('tag_id')
                                <span class="text text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <div class="form-check">
                                    <input  type="radio" name="status" id="activeRadio" value="1">
                                    <label class="form-check-label mr-5" for="activeRadio">
                                        Active
                                    </label>
                                    <input   type="radio" name="status" id="inactiveRadio" value="0" checked>
                                    <label class="form-check-label" for="inactiveRadio">
                                        De Active
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>

@endsection
