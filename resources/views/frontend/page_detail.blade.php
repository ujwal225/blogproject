@extends('layouts.frontend_master')

@section('title', 'Details')
@section('front_header')
    <header class="masthead" style="background-image: url('{{asset('images/post/'.$data['post']->feature_image)}}')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="post-heading">
                        <h1>{{$data['post']->title}}</h1>
                        <h2 class="subheading">{{$data['post']->short_description}}</h2>
                        <span class="meta">
                                Posted by
                                <a href="#!">{{$data['post']->createdBy->name}}</a> on
                                {{$data['post']->created_at}}
                            </span>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection
@section('front_content')
    <article class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                   <P>
                       {{$data['post']->description}}
                   </P>
                </div>
            </div>
        </div>
    </article>
@endsection
