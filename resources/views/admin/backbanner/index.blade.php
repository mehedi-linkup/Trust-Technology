@extends('layouts.admin-master', ['pageName' => 'backbanner'])
@section('title', 'Create Banner')
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
                        <h4 class="heading"><i class="fas fa-edit"></i> Update Banner</h4>
                        <form action="{{ route('back.banner.update', $backimage) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label for="about">About Banner <span style="font-size: 14px; color: #877e7e">(Size:
                                            1350 * 180)</label>
                                    <input class="form-control  @error('about') is-invalid @enderror" id="about"
                                        type="file" name="about" onchange="readAboutURL(this);">
                                    @error('about')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <div class="form-group mt-1">
                                        <img class="form-controlo img-thumbnail" src="#" id="previewAboutImage"
                                            style="width: 100px;height: 80px; background: #3f4a49;">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="product">Product Banner <span
                                            style="font-size: 14px; color: #877e7e">(Size: 1350 * 180)</label>
                                    <input class="form-control  @error('product') is-invalid @enderror" id="product"
                                        type="file" name="product" onchange="readProductURL(this);">
                                    @error('product')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <div class="form-group mt-1">
                                        <img class="form-controlo img-thumbnail" src="#" id="previewProductImage"
                                            style="width: 100px;height: 80px; background: #3f4a49;">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="gallery">Gallery Banner <span
                                            style="font-size: 14px; color: #877e7e">(Size: 1350 * 180)</label>
                                    <input class="form-control  @error('gallery') is-invalid @enderror" id="gallery"
                                        type="file" name="gallery" onchange="readGalleryURL(this);">
                                    @error('gallery')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <div class="form-group mt-1">
                                        <img class="form-controlo img-thumbnail" src="#" id="previewGalleryImage"
                                            style="width: 100px;height: 80px; background: #3f4a49;">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="news">News Banner <span style="font-size: 14px; color: #877e7e">(Size:
                                            1350 * 180)</span></label>
                                    <input class="form-control  @error('news') is-invalid @enderror" id="news"
                                        type="file" name="news" onchange="readNewsURL(this);">
                                    @error('news')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <div class="form-group mt-1">
                                        <img class="form-controlo img-thumbnail" src="#" id="previewNewsImage"
                                            style="width: 100px;height: 80px; background: #3f4a49;">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="contact">Contact Banner <span
                                            style="font-size: 14px; color: #877e7e">(Size: 1350 * 180)</label>
                                    <input class="form-control  @error('contact') is-invalid @enderror" id="contact"
                                        type="file" name="contact" onchange="readContactURL(this);">
                                    @error('contact')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2">
                                    <div class="form-group mt-1">
                                        <img class="form-controlo img-thumbnail" src="#" id="previewContactImage"
                                            style="width: 100px;height: 80px; background: #3f4a49;">
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
        function readAboutURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#previewAboutImage')
                        .attr('src', e.target.result)
                        .width(90)
                        .height(75);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        document.getElementById("previewAboutImage").src = "{{ asset($backbanner->about) }}";
        // -----------
        function readGalleryURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#previewGalleryImage')
                        .attr('src', e.target.result)
                        .width(90)
                        .height(75);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        document.getElementById("previewGalleryImage").src = "{{ asset($backbanner->gallery) }}";
        // -----------
        function readProductURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#previewProductImage')
                        .attr('src', e.target.result)
                        .width(90)
                        .height(75);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        document.getElementById("previewProductImage").src = "{{ asset($backbanner->product) }}";
        // -----------
        function readNewsURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#previewNewsImage')
                        .attr('src', e.target.result)
                        .width(90)
                        .height(75);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        document.getElementById("previewNewsImage").src = "{{ asset($backbanner->news) }}";
        // -----------
        function readContactURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#previewContactImage')
                        .attr('src', e.target.result)
                        .width(90)
                        .height(75);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        document.getElementById("previewContactImage").src = "{{ asset($backbanner->contact) }}";
    </script>
@endpush
