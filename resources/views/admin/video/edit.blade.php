@extends('layouts.admin-master', ["pageName" => "video"])
@section('title', 'Update Video')
@push('admin-css')
@endpush    
@section('admin-content')
<main>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="form-area">
                    <h4 class="heading"><i class="fas fa-video mr-1"></i> Update Video</h4>
                    <form action="{{ route('video.update', $video) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-6 mx-auto">
                            <div class="col-md-12 mb-2">
                                <label for="title">Title <span class="text-danger">*</span> </label>
                                <input type="text" name="title" value="{{ $video->title }}" class="form-control shadow-none @error('title') is-invalid @enderror" id="title" placeholder="Enter title">
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-2">
                                <label for="video">Video</label>
                                <input  class="form-control shadow-none @error('video') is-invalid @enderror" id="video" type="url" name="video" value="{{ $video->video }}">
                                @error('video')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        </div> 
                        
                        <div class="clearfix border-top">
                            <div class="text-center mt-2">
                                <a href="{{ route('video.index') }}"  class="btn btn-dark">Back</a>
                                <button type="submit" class="btn btn-info">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
