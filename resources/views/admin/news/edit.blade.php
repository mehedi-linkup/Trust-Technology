@extends('layouts.admin-master', ['pageName' => 'news'])
@section('title', 'Update Profile')
@push('admin-css')
<link href="{{ asset('summernote/summernote-bs4.min.css') }}" rel="stylesheet">
@endpush    
@section('admin-content')
<main>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="form-area">
                    <h4 class="heading"><i class="fas fa-sliders-h"></i></i> Update News</h4>
                    <form action="{{ route('news.update', $news) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <div> 
                                    <label for="title"> Name <span class="text-danger">*</span> </label>
                                    <input type="text" name="title" value="{{$news->title }}" class="form-control shadow-none @error('title') is-invalid @enderror" id="title" placeholder="Enter title">
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>  
                                <div>
                                    <label for="date">Date <span class="text-danger">*</span></label>
                                    <input type="date" name="date" value="{{ $news->date }}" class="form-control shadow-none @error('date') is-invalid @enderror" id="date" placeholder="Enter date">
                                    @error('date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div> 
                                <div>
                                    <label for="image">User Image</label>
                                    <input class="form-control" id="image" type="file" name="image" onchange="readURL(this);">
                                    <div class="form-group mt-1">
                                        <img class="form-controlo img-thumbnail" src="#" id="previewImage" style="width: 100px;height: 80px; background: #3f4a49;">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <div class="mb-2">
                                    <label for="shortdetails"> Short Details <span class="text-danger">*</span> </label>
                                    <input type="text" name="shortdetails" value="{{ $news->shortdetails }}" class="form-control shadow-none @error('shortdetails') is-invalid @enderror" id="shortdetails" placeholder="Enter shortdetails">
                                    @error('shortdetails')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div>
                                    <label for="description"> description <span class="text-danger">*</span></label>
                                    <textarea name="description" id="description" placeholder="Enter description">{!! $news->description !!}</textarea>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                               
                            </div>
                            <div class="col-md-6 mb-2">
                               
                            </div>
                        </div>
                        
                        <div class="clearfix border-top">
                            <div class="float-md-right mt-2">
                               <a href="{{ route('news.index') }}" class="btn btn-dark">Back</a>
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
@push('admin-js')
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#previewImage')
                    .attr('src', e.target.result)
                    .width(100)
                    .height(80);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    document.getElementById("previewImage").src="{{ asset($news->image) }}"; 
</script>
<script src="{{ asset('summernote/summernote-bs4.min.js') }}"></script>
    <script>
        $('#description').summernote({
            tabsize: 2,
            height: 150,
        });

    </script>
@endpush