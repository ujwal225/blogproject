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
    <div class="my-5 mx-5">
        <h3>comments</h3>
        <!-- * * * * * * * * * * * * * * *-->
        <!-- * * SB Forms Contact Form * *-->
        <!-- * * * * * * * * * * * * * * *-->
        <!-- This form is pre-integrated with SB Forms.-->
        <!-- To make this form functional, sign up at-->
        <!-- https://startbootstrap.com/solution/contact-forms-->
        <!-- to get an API token!-->
        <form method="post" action="{{route('frontend.post_comment', $data['post']->id)}}" id="contactForm" >
            @csrf
            <div class="form-floating">
                <input name="name" class="form-control" id="name" type="text" placeholder="Enter your name..." data-sb-validations="required" />
                <label for="name">Name</label>
                <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
            </div>
            <div class="form-floating">
                <input name="email" class="form-control" id="email" type="email" placeholder="Enter your email..." data-sb-validations="required,email" />
                <label for="email">Email address</label>
                <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
            </div>
            <div class="form-floating">
                <input name="phone" class="form-control" id="phone" type="tel" placeholder="Enter your phone number..." data-sb-validations="required" />
                <label for="phone">Phone Number</label>
                <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>
            </div>
            <div class="form-floating">
                <textarea name="comment" class="form-control" id="message" placeholder="Enter your message here..." style="height: 12rem" data-sb-validations="required"></textarea>
                <label for="message">Message</label>
                <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
            </div>
            <br />
            <!-- Submit success message-->
            <!---->
            <!-- This is what your users will see when the form-->
            <!-- has successfully submitted-->
            <div class="d-none" id="submitSuccessMessage">
                <div class="text-center mb-3">
                    <div class="fw-bolder">Form submission successful!</div>
                    To activate this form, sign up at
                    <br />
                    <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                </div>
            </div>
            <!-- Submit error message-->
            <!---->
            <!-- This is what your users will see when there is-->
            <!-- an error submitting the form-->
            <!-- Submit Button-->
            <input class="btn btn-primary text-uppercase" type="submit" value="Send">
        </form>
    </div>
@endsection
