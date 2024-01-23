@extends('layouts.backend_master')

@section('title', 'Edit comment')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Comment Edit</h1>
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Edit comment Status</h6>
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
                        <form action="{{route('backend.comment.update', $info->id )}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <div class="form-group">

                                <label>Status</label>
                                @if( $info->status == 1)
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
@section('script')
    <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection
