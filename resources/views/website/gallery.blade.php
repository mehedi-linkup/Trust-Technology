@extends('layouts.website', ['pageName' => 'gallery'])
@section('website-contents')
@section('title', 'About-us')
@push('website-css')
@endpush

<section class="pager" style="background-image: linear-gradient(rgba(3, 1, 10, 0.5), rgba(3, 1, 10, 0.5)), url({{ '../'. $backimage->gallery }});">
    <div class="container pager-text py-5">
        <h3 class="text-center text-white fw-bold">Gallery</h3>
    </div> 
</section>
    <section class="py-4 mt-3">
        <div class="container">
            <div class="inner-page-header ">
                <h4>Photo Gallery</h4> 
            </div>
            <div class="row mt-3">
                @foreach ($photo as $item) 
                <div class="col-12 col-md-6 col-lg-3 mb-4">
                    <div class="card gallery gallery-image">
                        <a href="{{ $item->image }}"><img src="{{ asset($item->image) }}" alt="" title="Beautiful Image" /></a>
                        {{-- <img class="w-100" src="{{ asset($item->image) }}" alt=""> --}}
                    </div>
                </div>
                @endforeach 
            </div>
        </div>
    </section>

@endsection