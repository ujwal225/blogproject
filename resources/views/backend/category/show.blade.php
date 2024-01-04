@extends('layouts.backend_master')

@section('title', 'Category details')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Category Information</h1>
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Category details</h6>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered">
                          <tr>
                              <th>title</th>
                              <td>{{$category['record']->title}}</td>
                          </tr>
                          <tr>
                              <th>rank</th>
                              <td>{{$category['record']->rank}}</td>
                          </tr>
                          <tr>
                              <th>status</th>
                              <td>
                                  @if($category['record']->status == 1)
                                      <p class="text text-success">Active</p>
                                  @else
                                      <p class="text text-danger">De Active</p>
                                  @endif
                              </td>
                          </tr>
                            <tr>
                                <th>Created_at</th>
                                <td>{{$category['record']->created_at}}</td>
                            </tr>
                            <tr>
                                <th>Updated_at</th>
                                <td>{{$category['record']->updated_at}}</td>
                            </tr>
                            <tr>
                                <th>Created_by</th>
                                <td>{{\App\Models\User::find($category['record']->created_by)->name}}</td>
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
