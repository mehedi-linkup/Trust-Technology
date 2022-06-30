@extends('layouts.website', ['pageName' => 'product'])
@section('website-contents')
@section('title', 'Product Details')
@push('website-css')
@endpush
<section class="pager" style="background-image: linear-gradient(rgba(3, 1, 10, 0.5), rgba(3, 1, 10, 0.5)), url({{ "../".$backimage->product }});">
    <div class="container pager-text py-5">
        <h3 class="text-center text-white fw-bold text-capitalize">{{ $product->category->name }} > {{ $product->title }}</h3>
    </div> 
</section>
<section id="product-detail" class="py-4 product-detail">
    <div class="container"> 
    <div class="inner-page-header mb-3">
        <h4>
          Product Name:  {{ $product->title }} 
        </h4>
    </div>
        <div class="mb-3">
            <div class="col-lg-12 col-md-12 col-12  pt-3">
                <div class="card-body">
                    <div class="principle-image">
                        <img class="w-100" src="{{ asset($product->image) }}" alt="">
                    </div>
                    <div class="princple-message">
                        <strong class="text-capitalize"><span class="hlight-color">Product Name: </span>{{ $product->title }}</strong><br>
                        <strong class="text-capitalize"><span class="hlight-color">Category Name: </span> {{ $product->category->name }}</strong><br>
                        <strong class="text-capitalize"><span class="hlight-color">Price: </span> {{ $product->price }}Tk</strong><br>
                        <p class="mt-3"><span class="hlight-color"><b>Short Description: </b></span>{{ $product->shortdes }}</p>
                        <div class="long-description"><span class="hlight-color"><b>Long Description: </b></span> {!! $product->description !!}</div>
                    </div>
                   
                </div>
            </div>
    </div>
</div>
</section>
@endsection