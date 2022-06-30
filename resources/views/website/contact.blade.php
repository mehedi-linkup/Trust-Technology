@extends('layouts.website', ['pageName' => 'contact']) 
@section('website-contents') 
@section('title', 'Register')
 @push('website-css') @endpush
<section class="pager" style="background-image: linear-gradient(rgba(3, 1, 10, 0.5), rgba(3, 1, 10, 0.5)), url({{ '../'. $backimage->contact }});">
    <div class="container pager-text py-5">
        <h3 class="text-center text-white fw-bold">Contact Us</h3>
    </div>
</section>

<section id="contact" class="contact py-5" style="font-family: 'barlow', sans-serif;">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-12 card p-5 shadow">
                <div class="inner-page-header mb-4">
                    <h4>Contact Northern IT</h4>
                </div>
                @if(Session('status'))
                <div class="alert-success alert fw-bold p-2" role="alert">
                    Your Message has been delivered!
                </div>
                @endif
                <form action="{{ route('contact.store') }}" method="post">
                    @csrf
                    <div class="row from-group mb-3">   
                        <div class="col-6"> 
                            <span class="">Name <span class="text-danger">*</span></span>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" name="name" placeholder="Type Your Name" aria-label="" />
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror  
                        </div>
                        <div class="col-6">
                            <span class="">Phone<span class="text-danger">*</span></span>
                            <input type="tel" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" name="phone" placeholder="Type Your Phone Number" aria-label="Server" />
                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div> 
                    </div>
                    <div class="row from-group mb-3">
                       <div class="col-6">
                            <span class="">Email</span>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Type Your Email" aria-describedby="basic-addon3" />
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                       </div>
                       <div class="col-6">
                        <span class="">Subject</span>
                        <input type="subject" class="form-control @error('subject') is-invalid @enderror" name="subject" value="{{ old('subject') }}" placeholder="Type Your subject" aria-describedby="basic-addon3" />
                        @error('subject')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                       </div>
                    </div>
                    <div class="row from-group mb-3">
                        <div class="col-12">
                            <span class="">Your Message</span>
                            <textarea class="form-control" name="message" aria-label="With textarea"></textarea>
                        </div> 
                    </div>
                    {{-- <div class="d-inline pt-2">

                        <button type="submit" class="about-btn">Submit</button>

                    </div> --}}
                    <a type="submit" class="button-1-a">
                        <button class="button-1 ubtn">
                            <span class="ubtn-hover"></span>
                            <span class="ubtn-data ubtn-text">Submit</span>
                        </button>
                    </a>
                </form>
            </div>

            <div class="col-12 col-lg-4 col-md-4">
                <a href="tel: {{ $content->phone }}" class="card p-4 mb-4 shadow text-center vertical-align" style ="color: rgb(22, 13, 13)">
                    <div class="icon mb-3">
                        <i class="fas fa-phone"></i>
                    </div>

                    {{ $content->phone }}
                </a>
                <a href="mailto: {{ $content->email }}" class="card p-4 mb-4 shadow text-center vertical-align" style ="color: rgb(22, 13, 13)">
                    <div class="icon mb-3">
                        <i class="fas fa-envelope"></i>
                    </div>
                    {{ $content->email }}
                </a>
                <div class="card p-4 shadow text-center vertical-align" style="color: rgb(22, 13, 13)">
                    <div class="icon mb-3">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    {{ $content->address }}
                </div>
            </div>
        </div>
    </div>
</section>
@push('website-js')


@endpush @endsection
