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
                                <th>Category</th>
                                <td>{{$post['record']->category->title}}</td>
                            </tr>
                            <tr>
                                <th>title</th>
                                <td>{{$post['record']->title}}</td>
                            </tr>

                            <tr>
                                <th>Short Description</th>
                                <td class="overflow-hidden">{{$post['record']->short_description}}</td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td class="overflow-hidden">{{$post['record']->description}}</td>
                            </tr>
                            <tr>
                                <th>status</th>
                                <td>
                                    @if($post['record']->status == 1)
                                        <p class="text text-success">Active</p>
                                    @else
                                        <p class="text text-danger">De Active</p>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Feature Image</th>
                                <td><img src="{{asset('/images/post/'. $post['record']->feature_image)}}" alt="image" /></td>
                            </tr>
                            <tr>
                                <th>Tags</th>
                               <td>
                                   <ul>
                                       @foreach($tagId as $tags)
                                           <li>{{$tags->title}}</li>
                                       @endforeach
                                   </ul>
                               </td>
                            </tr>
                            <tr>
                                <th>views</th>
                                <td>{{$post['record']->view_count}}</td>
                            </tr>
                            <tr>
                            <tr>
                                <th>Created_at</th>
                                <td>{{$post['record']->created_at}}</td>
                            </tr>
                            <tr>
                                <th>Updated_at</th>
                                <td>{{$post['record']->updated_at}}</td>
                            </tr>
                            <tr>
                                <th>Created_by</th>
                                <td>{{\App\Models\User::find($post['record']->created_by)->name}}</td>
                            </tr>
                            @if(!empty($post['record']->updated_by))
                                <tr>
                                    <th>Updated_by</th>
                                    <td>{{$post['record']->updatedBy->name}}</td>
                                </tr>
                            @endif


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
