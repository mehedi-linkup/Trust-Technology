@extends('layouts.admin-master', ['pageName' => 'profile'])
@section('title', 'Create content')
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
                    <h4 class="heading"><i class="fa fa-edit"></i>  Update content</h4>
                    <form action="{{ route('company.update', $content) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <label for="name"> Name <span class="text-danger">*</span> </label>
                                <input type="text" name="name" value="{{ $content->name }}" class="form-control shadow-none @error('name') is-invalid @enderror" id="name" placeholder="Enter name">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="phone">Phone <span class="text-danger">*</span></label>
                                <input type="number" name="phone" value="{{ $content->phone }}" class="form-control shadow-none @error('phone') is-invalid @enderror" id="phone" placeholder="Enter phone">
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="address">Address</label>
                                <input type="text" name="address" value="{{ $content->address }}" class="form-control shadow-none @error('address') is-invalid @enderror" id="address" placeholder="Enter address">
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="slogan">slogan</label>
                                <input type="text" name="slogan" value="{{ $content->slogan }}" class="form-control shadow-none @error('slogan') is-invalid @enderror" id="slogan" placeholder="Enter slogan">
                                @error('slogan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                           
                            <div class="col-md-6 mb-2">
                                <label for="email">Email</label>
                                <input type="email" name="email" value="{{ $content->email }}" class="form-control shadow-none @error('email') is-invalid @enderror" id="email" placeholder="Enter email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="about">about</label>
                                <input type="text" name="about" value="{{ $content->about }}" class="form-control shadow-none @error('about') is-invalid @enderror" id="about" placeholder="Enter about">
                                @error('about')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-3 mb-2">
                                <label for="facebook"> Facebook</label>
                                <input type="url" name="facebook" value="{{ $content->facebook  }}" class="form-control shadow-none @error('facebook') is-invalid @enderror" id="facebook" placeholder="Enter facebook">
                                @error('facebook')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <label for="twitter" class="mt-2"> twitter</label>
                                <input type="url" name="twitter" value="{{ $content->twitter }}" class="form-control shadow-none @error('twitter') is-invalid @enderror" id="twitter" placeholder="Enter twitter">
                                @error('twitter')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-3 mb-2">
                                <label for="linkedin"> linkedin</label>
                                <input type="url" name="linkedin" value="{{  $content->linkedin }}" class="form-control shadow-none @error('linkedin') is-invalid @enderror" id="linkedin" placeholder="Enter linkedin">
                                @error('linkedin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <label for="instagram" class="mt-2">Instagram</label>
                                <input type="url" name="instagram" value="{{ $content->instagram }}" class="form-control shadow-none @error('instagram') is-invalid @enderror" id="instagram" placeholder="Enter instagram">
                                @error('instagram')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="logo">content Logo</label>
                                <input class="form-control  @error('logo') is-invalid @enderror" id="logo" type="file" name="logo" onchange="readURL(this);">
                                    @error('logo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                <div class="form-group mt-1">
                                    <img class="form-controlo img-thumbnail" src="#" id="previewImage" style="width: 100px;height: 80px; background: #3f4a49;">
                                </div>
                            </div>
                        </div>
                        
                        <div class="clearfix border-top">
                            <div class="float-md-right mt-2">
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
    document.getElementById("previewImage").src = "{{ asset($content->logo) }}";

</script>
@endpush