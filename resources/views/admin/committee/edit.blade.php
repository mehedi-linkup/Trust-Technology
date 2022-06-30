@extends('layouts.admin-master')
@section('title', 'Create Management')
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
                    <h4 class="heading"><i class="fas fa-user-friends"></i> Update Managment</h4>
                    <form action="{{ route('management.update', $management) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <label for="name"> Name <span class="text-danger">*</span> </label>
                                <input type="text" name="name" value="{{ $management->name }}" class="form-control shadow-none @error('name') is-invalid @enderror" id="name" placeholder="Enter name">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="designation">Dasignation <span class="text-danger">*</span></label>
                                <input type="text" name="designation" value="{{ $management->designation }}" class="form-control shadow-none @error('designation') is-invalid @enderror" id="designation" placeholder="Enter designation">
                                @error('designation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-3 mb-2">
                                <label for="facebook"> Facebook</label>
                                <input type="url" name="facebook" value="{{ $management->facebook  }}" class="form-control shadow-none @error('facebook') is-invalid @enderror" id="facebook" placeholder="Enter facebook">
                                @error('facebook')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <label for="twitter" class="mt-2"> twitter</label>
                                <input type="url" name="twitter" value="{{ $management->twitter }}" class="form-control shadow-none @error('twitter') is-invalid @enderror" id="twitter" placeholder="Enter twitter">
                                @error('twitter')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-3 mb-2">
                                <label for="linkedin"> linkedin</label>
                                <input type="url" name="linkedin" value="{{  $management->linkedin }}" class="form-control shadow-none @error('linkedin') is-invalid @enderror" id="linkedin" placeholder="Enter linkedin">
                                @error('linkedin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <label for="instagram" class="mt-2">Instagram</label>
                                <input type="url" name="instagram" value="{{ $management->instagram }}" class="form-control shadow-none @error('instagram') is-invalid @enderror" id="instagram" placeholder="Enter instagram">
                                @error('instagram')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="image">Management Image</label>
                                <input class="form-control" id="image" type="file" name="image" onchange="readURL(this);">
                                <div class="form-group mt-1">
                                    <img class="form-controlo img-thumbnail" src="#" id="previewImage" style="width: 100px;height: 80px; background: #3f4a49;">
                                </div>
                            </div>
                        </div>
                        
                        <div class="clearfix border-top">
                            <div class="float-md-right mt-2">
                                {{-- <button type="reset" class="btn btn-dark">back</button> --}}
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
    document.getElementById("previewImage").src="{{ asset($management->image) }}";
</script>
@endpush