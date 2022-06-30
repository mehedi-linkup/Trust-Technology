@extends('layouts.website', ['pageName' => 'home'])
@section('website-contents')
@section('title', 'Home')
@push('website-css')
@endpush
<!-- Banner section start -->
<section class="category-section">
    <div class="container-fluid my-container">
        <div class="row">
            {{-- <div class="col-md-3">
                    <div class="mobile-menu">
                        <h3 class="category">Category<i class="fas fa-bars menu-icon"></i></h3>
                    </div>
                    <ul class="main-menu bg-light">

                        @foreach ($category as $item)
                            <li> <i class="far fa-hand-point-right"></i><a href="{{route('website.category',$item->id)}}" class="ml-2">{{$item->name}}</a></li>
                        @endforeach
                        @foreach ($categorylast as $item)
                        <span class="category-last"><li>  <i class="far fa-hand-point-right"></i><a href="{{route('website.category',$item->id)}}">{{$item->name}}</a></li> </span>
                        @endforeach
                        <li  class="more-category" style="overflow: hidden"><a href="#">@if ($categorylast == true)More @endif  <i class="fas fa-plus"></i></a></li>

                    </ul>
                </div> --}}
            <div class="col-md-12 col-12 my-slider">
                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        @php
                            $banners = $sliders->count();
                        @endphp
                        @for ($i = 0; $i < $banners; $i++)
                            <button type="button" data-bs-target="#carouselExampleCaptions"
                                data-bs-slide-to="{{ $i }}" class="{{ $i == 0 ? 'active' : '' }}"
                                aria-current="true" aria-label="Slide 1"></button>
                        @endfor
                    </div>
                    <div class="carousel-inner">
                        @foreach ($sliders as $key => $item)
                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                <img class="banner-img" src="{{ asset($item->image) }}" class="d-block w-100"
                                    alt="">
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>


            </div>
        </div>
    </div>
</section>
<!-- Banner section end -->

<!-- Service section start -->

<!-- Service section end -->

<!-- About section Start -->


<section class="py-5 about-section">
    <div class="container">
        <div class="section-title text-center">
            <h2>About Us</h2>
            <div class="row mt-5">
                <div class="col-md-6">
                    <img class="w-100 h-100" src="{{ asset($about->image) }}" alt="" style="max-height: 350px">
                </div>
                <div class="col-md-6">
                    <div class="about-description mt-2 mt-md-0">
                        <h4>Welcome to {{ $content->name }}</h4>
                        <hr>
                        <div class="description-box" style="min-height: 300px">{!! Str::limit($about->description, 1000, '...') !!}<a href="{{ route('website.about') }}" style="font-size: 14px; color: #00a3c1">See More</a></div>
                        {{-- <a href="{{ route('website.about') }}" class="button-1-a">
                            <button class="button-1 ubtn">
                                <span class="ubtn-hover"></span>
                                <span class="ubtn-data ubtn-text">Read More</span>
                            </button>
                        </a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About section End -->

<section class="product-bg py-4">
    <div class="container">
        <div class="section-title text-center">
            <h2 class="mb-3">Our Product</h2>
        </div>
        <div class="row">
            @foreach ($product as $item)
                <div class="col-12 col-md-4 col-lg-3 mb-4 text-center">
                    <div class="card  gallery-image">
                        <a href="{{ route('product.details', $item->id) }}"><img src="{{ asset($item->image) }}"
                                alt="" /></a>
                    </div>
                    <div>
                        <a class="text-center fw-bold text-capitalize"
                            href="{{ route('product.details', $item->id) }}">{{ $item->title }}</a>
                    </div>
                    <span class=" fw-bold">Tk. {{ $item->price }}</span>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Gallery section Start -->
<section class="bg-light py-4">
    <div class="container">
        <div class="section-title text-center">
            <h2 class="mb-3">Our Gallery</h2>
        </div>
        <div class="row">
            @foreach ($photo as $item)
                <div class="col-12 col-md-6 col-lg-3 mb-4">
                    <div class="card gallery gallery-image">
                        <a href="{{ $item->image }}"><img src="{{ asset($item->image) }}" alt=""
                                title="Beautiful Image" /></a>
                        {{-- <img class="w-100" src="{{ asset($item->image) }}" alt=""> --}}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Gallery section End -->


{{-- <!-- Team section Start -->
    <section class="py-4">
        <div class="container">
            <div class="section-title text-center">
                <h2 class="mb-3">Our Managment</h2>
            </div>
            <div class="row ">
                @foreach ($committee as $item)
                <div class="col-md-6 col-lg-3 col-12">
                    <div class="card team-card">
                        <img src="{{ asset($item->image) }}" class="card-img-top" alt="...">
                        <div class="team-social">
                            <ul>
                                <li><a href="{{ $item->facebook }}"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="{{ $item->twitter }}"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="{{ $item->linkedin }}"><i class="fab fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>
                        <div class="card-body team-body text-center">
                            <h5 class="card-title">{{ $item->name }}</h5>
                            <p class="card-text">{{ $item->designation }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section> --}}

<section class="py-4 bg-light">
    <div class="container">
        <div class="section-title text-center">
            <h2 class="mb-3">Videos </h2>
        </div>
        <div class="row ">
            {{-- @foreach ($video as $item)
                    <iframe class="w-100" height="350" src="{{ $item->video }}">
                    </iframe>
                @endforeach --}}
            {{-- @if ($video)
                <div class="col-md-6">
                    <iframe class="w-100" height="350" src="{{ $video->video }}">
                    </iframe>

                </div>
                @endif --}}
            @foreach ($videos as $item)
                <div class="col-6 col-md-4 col-lg-3">
                    {{-- <div class="row"> --}}
                    {{-- @foreach ($videos as $item) --}}
                    {{-- <div class="col-md-12"> --}}
                    <iframe class="w-100" height="180" src="{{ $item->video }}">
                    </iframe>
                    {{-- </div> --}}
                    {{-- @endforeach --}}
                    {{-- </div> --}}
                </div>
            @endforeach

        </div>
    </div>
</section>


<!-- Comittee section End -->
<Section class="py-5">
    <div class="container">
        <div class="section-title text-center">
            <h2> News</h2>
        </div>
        <div class="row">
            @foreach ($news as $item)
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="card">
                        <div class="news-img">
                            <img class="w-100" src="{{ asset($item->image) }}" alt="">
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled d-flex mb-1">
                                {{-- <li class="bloger-name"><a href="">BY, Jony Agro</a></li> --}}
                                <li class="ms-auto"><span>{{ $item->date }}</span></li>
                            </ul>
                            <h4 class="mb-2">{{ Str::limit($item->title, 50, ' ...') }}</h4>
                            {{-- <p> {!! Str::limit($item->description, 230, ' ...') !!} </p> --}}
                            <p>{{ Str::limit($item->shortdetails, 108, ' ...') }}</p>
                            <div class="d-grid gap-2">
                                {{-- <a class="btn read-more" href="{{ route('website.news-details', $item->slug) }}" type="button">Read More</a> --}}
                                <a href="{{ route('website.news-details', $item->slug) }}" class="button-1-a">
                                    <button class="button-1 ubtn">
                                        <span class="ubtn-hover"></span>
                                        <span class="ubtn-data ubtn-text">Read More</span>
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</Section>
@endsection
@push('website-js')
@endpush
