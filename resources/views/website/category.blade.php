@extends('layouts.website')
@section('website-contents')
@section('title', 'Products')
@push('website-css')
@endpush

<section class="pager">
    <div class="container pager-text py-5">
        <h3 class="text-center text-white fw-bold">Products</h3>
    </div> 
</section>
    <section class="py-4 mt-3">
        <div class="container">
            <div class="inner-page-header ">
                <h4>Our Products >  <span style="color:#000">{{$category->name}}</span></h4> 
               

            </div>
            <div class="row mt-3">
                @if ($product)
                    @foreach ($product as $item) 
                    <div class="col-12 col-md-4 text-center col-lg-2 mb-4">
                        <div class="card gallery gallery-image">
                           
                            <a href="#"><img src="{{ asset($item->image) }}" alt="" title="Beautiful Image" /></a>
                        </div>
                        <a href="{{ route('product.details', $item->id) }}">{{ $item->title }}</a>
                    </div>
                    @endforeach   
                @endif
            </div>
        </div>
    </section>

@endsection