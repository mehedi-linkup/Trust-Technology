@extends('layouts.admin-master', ['pageName' => 'product'])
@section('title', 'Update product')
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
                        <h4 class="heading"><i class="fab fa-product-hunt"></i> Update product</h4>
                        <form action="{{ route('product.update', $product->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label for="title"> Name <span class="text-danger">*</span> </label>
                                    <input type="text" name="title" value="{{ $product->title }}"
                                        class="form-control shadow-none @error('title') is-invalid @enderror" id="title"
                                        placeholder="Enter title">
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label for="title">Category<span class="text-danger">*</span> </label>
                                    <select name="category_id"
                                        class="form-control form-control-sm @error('category_id') is-invalid @enderror">

                                        <option value=" ">------Select Category-------</option>

                                        @foreach ($category as $item)
                                            <option value="{{ $item->id }}"
                                                {{ $item->id == $product->category_id ? 'selected' : '' }}>
                                                {{ $item->name }}</option>
                                        @endforeach

                                    </select>
                                    @error('category_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>The Category field is required.</strong>
                                        </span>
                                    @enderror

                                </div>
                                <div class="col-md-3 mb-2">
                                    <label for="title">Price </label>
                                    <input type="number" name="price" value="{{ $product->price }}"
                                        class="form-control shadow-none @error('price') is-invalid @enderror" id="price"
                                        placeholder="Enter price">
                                    @error('price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="shortdes">shortdes <span class="text-danger">*</span></label>
                                    <input type="text" name="shortdes" value="{{ $product->shortdes }}"
                                        class="form-control shadow-none @error('shortdes') is-invalid @enderror"
                                        id="shortdes" placeholder="Enter shortdes">
                                    @error('shortdes')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                    <label for="image">product Image</label>
                                    <input class="form-control" id="image" type="file" name="image"
                                        onchange="readURL(this);">
                                    <div class="form-group mt-1">
                                        <img class="form-controlo img-thumbnail" src="#" id="previewImage"
                                            style="width: 100px;height: 80px; background: #3f4a49;">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="description"> Description</label>
                                    <textarea name="description" id="" cols="30" rows="6" class="form-control">{{ $product->description }}</textarea>

                                </div>

                            </div>

                            <div class="clearfix border-top">
                                <div class="float-md-right mt-2">
                                    <button type="reset" class="btn btn-dark">Reset</button>
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
                        .width(100)
                        .height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        document.getElementById("previewImage").src = "{{ asset($product->image) }}";
    </script>
@endpush
