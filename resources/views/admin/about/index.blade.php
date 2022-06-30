@extends('layouts.admin-master', ['pageName' => 'about'])
@section('title', 'Update About')
@push('admin-css')
<link href="{{ asset('summernote/summernote-bs4.min.css') }}" rel="stylesheet">
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
                         @if(session('status'))
                         <div class="alert alert-success fw-bold">
                             successfully Updated
                         </div>
                         @endif
                    <h4 class="heading"><i class="fas fa-address-card"></i>  Update About</h4>
                    <form action="{{ route('about.update', $about) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-6 mb-2">
                               <div class="mb-3">
                                <label for="description">About text</label>
                                <textarea name="description" id="description" placeholder="Enter description">{!! $about->description !!}</textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                               </div>
                               <div>
                                <label for="trams">Trams & Condition</label>
                                <textarea name="trams" id="trams" placeholder="Enter trams">{!! $about->trams !!}</textarea>
                                @error('trams')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                               </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <div class="mb-3">
                                    <label for="mission">Mission & Vision</label>
                                    <textarea name="mission" id="mission" placeholder="Enter mission">{!! $about->mission !!}</textarea>
                                    @error('mission')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <label for="image">About Image </label>
                                <input class="form-control  @error('image') is-invalid @enderror" id="image" type="file" name="image" onchange="readURL(this);">
                                    @error('image')
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
    document.getElementById("previewImage").src = "{{asset($about->image)  }}";
</script>
<script src="{{ asset('summernote/summernote-bs4.min.js') }}"></script>
    <script>
        $('#description').summernote({
            tabsize: 2,
            height: 150,
        });
        $('#trams').summernote({
            tabsize: 2,
            height: 100,
        });
        $('#mission').summernote({
            tabsize: 2,
            height: 200,
        });

    </script>
@endpush