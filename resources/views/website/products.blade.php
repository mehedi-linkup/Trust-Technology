@extends('layouts.website', ['pageName' => 'product'])
@section('website-contents')
@section('title', 'Products')
@push('website-css')
@endpush
<section class="pager" style="background-image: linear-gradient(rgba(3, 1, 10, 0.5), rgba(3, 1, 10, 0.5)), url({{ '../'. $backimage->product }});">
    <div class="container pager-text py-5">
        <h3 class="text-center text-white fw-bold">Product</h3>
    </div>
</section>
    <section class="py-4 mt-3 product">
        <div class="container">
            <div class="row mt-3">
                <div class="col-12 short-category mb-4">
                    <div class="inner-page-header d-flex mb-2">
                        <h4>Category</h4>
                        <button class="btn btn-custom ms-auto" type="button" data-bs-toggle="offcanvas" data-bs-target="#leftOffcanvas" aria-controls="leftOffcanvas">
                            <i class="fas fa-bars"></i>
                        </button>
                        <div class="offcanvas offcanvas-start" tabindex="-1" id="leftOffcanvas" aria-labelledby="leftOffcanvasLabel">
                            <div class="offcanvas-header">
                              <h5 class="offcanvas-title" id="leftOffcanvasLabel">Category</h5>
                              <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body">
                              <ul>
                                @foreach($category as $item)
                                <li>
                                  <a href="{{ route('category.product', $item->id) }}">{{ $item->name }}</a>
                                @endforeach
                              </ul>
                            </div>
                        </div> 
                    </div>
                    
                </div>
                {{-- <div class="col-md-3 col-12 long-category">
                    <div class="inner-page-header mb-md-2">
                        <h4>Category</h4>
                    </div>
                    <ul class="list-group">
                        {{-- <li class="list-group-item active" aria-current="true"><a href="">A first item</a></li> -}}
                        @foreach($category as $item)
                            <li class="list-group-item"><a href="{{ route('category.product', $item->id) }}">{{ $item->name }}</a></li>
                        @endforeach
                    </ul>
                </div> --}}
                <div class="col-md-3 col-12 long-category">
                    <div class="product-panel">
                        <div class="title text-white rounded-top py-2 px-4">
                            <i class="fas fa-briefcase"></i>
                            All Category
                        </div>
                        <aside>
                            <div class="post-category-widget">
                                <ul>
                                    @foreach($category as $item)
                                    <li>
                                        <a href="{{ route('category.product', $item->id) }}" class="product_cat"><i class="fas fa-angle-double-right text-warning me-1"></i>{{ $item->name }}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </aside>
                    </div>
                </div>
                <div class="col-md-9 col-12">
                    <div class="inner-page-header mb-md-2">
                        <h4>Our Products</h4> 
                    </div>
                    <div class="row">
                        @foreach ($products as $item) 
                        <div class="col-12 col-md-3 text-center mb-4">
                            <div class="card gallery-image">
                                <a href="{{route('product.details',$item->id)}}"><img src="{{ asset($item->image) }}" alt="" title="Beautiful Image" /></a>
                            </div>
                            <a class="product-title" href="{{ route('product.details', $item->id) }}">{{ $item->title }}</a>
                        </div>
                        @endforeach 
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection