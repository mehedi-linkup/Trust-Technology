@extends('layouts.admin-master', ['pageName' => 'gallery'])
@section('title', 'Update Gallery')
@push('admin-css')
@endpush    
@section('admin-content')
<main>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="form-area">
                    @if ($errors->any())
                    <div class="text-danger font-weight-bold font-italic">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif 
                    <h4 class="heading"><i class="far fa-images"></i></i> Update Gallery</h4>
                    <form action="{{ route('gallery.update', $gallery) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <label for="title"> Title <span class="text-danger">*</span> </label>
                                <input type="text" name="title" value="{{ $gallery->title }}" class="form-control shadow-none @error('title') is-invalid @enderror" id="title" placeholder="Enter title">
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="image"> Image</label>
                                <input class="form-control" id="image" type="file" name="image" onchange="readURL(this);">
                                <div class="form-group mt-1">
                                    <img class="form-controlo img-thumbnail" src="#" id="previewImage" style="width: 100px;height: 80px; background: #3f4a49;">
                                </div>
                            </div>
                        </div>
                        
                        <div class="clearfix border-top">
                            <div class="float-md-right mt-2">
                                <a href="{{ route('gallery.index') }}"  class="btn btn-dark">Back</a>
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

            reader.onload = function(e) {
                $('#previewImage')
                    .attr('src', e.target.result)
                    .width(90)
                    .height(75);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    document.getElementById("previewImage").src = "{{ asset($gallery->image) }}";

</script>
@endpush