@extends('layouts.website', ['pageName' => 'news'])
@section('website-contents')
@section('title', 'About-us')
@push('website-css')
@endpush

<section class="pager" style="background-image: linear-gradient(rgba(3, 1, 10, 0.5), rgba(3, 1, 10, 0.5)), url({{ '../'. $backimage->news }});">
    <div class="container pager-text py-5">
        <h3 class="text-center text-white fw-bold">News</h3>
    </div> 
</section>
<Section class="mt-5">
    <div class="container">
        <div class="inner-page-header ">
            <h4>Our News</h4>
        </div>
        <div class="row mt-3">
            @foreach ($news as $item)  
            <div class="col-lg-4 col-md-6 col-12 mb-3">
                <div class="card">
                    <div class="news-img">
                        <img class="w-100" src="{{ asset($item->image) }}" alt="">
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled d-flex mb-1">
                            {{-- <li class="bloger-name"><a href="">BY, Jony Agro</a> </li> --}}
                            <li class="ms-auto"><span>{{ $item->date }}</span></li>
                        </ul>
                            <h4 class="mb-2">{{ $item->title }}</h4> 
                           {{-- <p> {!! Str::limit($item->description, 230, ' ...') !!} </p>              --}}
                           <p>{{ Str::limit($item->shortdetails, 108, ' ...')}}</p>
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