@extends('layouts.website', ['pageName' => 'news'])
@section('website-contents')
@section('title', 'News Details')
@push('website-css')
@endpush

<section class="pager" style="background-image: linear-gradient(rgba(3, 1, 10, 0.5), rgba(3, 1, 10, 0.5)), url({{ '../'. $backimage->news }});">
    <div class="container pager-text py-5">
        <h3 class="text-center text-white fw-bold">{{ $news->title }}</h3>
    </div> 
</section>
<section class="py-4">
    <div class="container"> 
    <div class="inner-page-header mb-3">
        <h4>
            {{ $news->title }} 
        </h4>
        <h5 class="float-end">
            <span class="me-0">{{ $news->date }}</span>
        </h5>
    </div>
    <div class="row mb-3">
            <strong class="d-inline-block mb-3"><span class="hlight-color">Headline: </span> {{ $news->shortdetails }}</strong>
            <div class="col-12 pt-3 details-news">
                <img class="float-end p-3 pt-0" style="max-width: 45%; max-height: 300px" src="{{ asset($news->image) }}" alt="">
                <div class=""><strong class="hlight-color">Details: </strong> {!! $news->description !!} </div>
            </div>
    </div>
</div>

</section>
@endsection