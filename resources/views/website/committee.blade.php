@extends('layouts.website', ['pageName' => 'committee'])
@section('website-contents')
@section('title', 'Management')
@push('website-css')
@endpush

<section class="pager">
    <div class="container pager-text py-5">
        <h3 class="text-center text-white fw-bold">Management</h3>
    </div> 
</section>

<section id="team" class="mt-5">
    <div class="container">
        <div class="inner-page-header ">
            <h4>Our Management</h4>   
        </div>
        <div class="row mt-3 mb-3">
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
</section>


@endsection