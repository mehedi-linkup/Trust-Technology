@extends('layouts.admin-master', ['pageName' => 'product'])
@section('title', 'Create product')
@push('admin-css')
@endpush
@section('admin-content')
    <main>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="form-area">

                        @if (Session('status'))
                            <div class="alert-success alert font-weight-bold" role="alert">
                                product successfully added
                            </div>
                        @endif
                        @if (Session('update'))
                            <div class="alert-success alert font-weight-bold" role="alert">
                                product update Successfully
                            </div>
                        @endif
                        @if (Session('delete'))
                            <div class="alert-danger alert font-weight-bold" role="alert">
                                Delete successfully
                            </div>
                        @endif
                        <h4 class="heading"><i class="fab fa-product-hunt"></i> Add product</h4>
                        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <div class="col-md-6 mb-2">
                                    <label for="title">Product Name <span class="text-danger">*</span> </label>
                                    <input type="text" name="title" value="{{ old('title') }}"
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

                                        <option value="">------Select Category-------</option>

                                        @foreach ($category as $item)
                                            <option value="{{ $item->id }}"
                                                {{ old('category_id') == $item->id ? 'selected' : '' }}>
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
                                    <input type="number" name="price" value="{{ old('price') }}"
                                        class="form-control shadow-none @error('price') is-invalid @enderror" id="price"
                                        placeholder="Enter price">
                                    @error('price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="shortdes">Shortdes <span class="text-danger">*</span></label>
                                    <input type="text" name="shortdes" value="{{ old('shortdes') }}"
                                        class="form-control shadow-none @error('shortdes') is-invalid @enderror"
                                        id="shortdes" placeholder="Enter shortdes">
                                    @error('shortdes')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                    <label for="image">Product Icon</label>
                                    <input class="form-control" id="image" type="file"
                                        class="form-control shadow-none @error('shortdes') is-invalid @enderror"
                                        name="image" onchange="readURL(this);">
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                    <div class="form-group mt-2">
                                        <img class="form-controlo img-thumbnail" src="#" id="previewImage"
                                            style="width: 100px;height: 80px; background: #3f4a49;">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="description">Description</label>
                                    <textarea name="description" class="form-control" id="" cols="30" rows="6"></textarea>
                                </div>
                            </div>

                            <div class="clearfix border-top">
                                <div class="float-md-right mt-2">
                                    <button type="submit" class="btn btn-info">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="card my-3">
                <div class="card-header">
                    <i class="fab fa-product-hunt  mr-1"></i>
                    All product List
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($product as $key=>$item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->category['name'] }}</td>
                                        <td>{{ $item->price }}</td>
                                        <td>
                                            @if (!empty($item->image))
                                                <img class="border" style="height: 40px; width:50px;"
                                                    src="{{ asset($item->image) }}" alt="">
                                            @else
                                                <img class="border" style="height: 40px; width:50px;"
                                                    src="{{ asset('noimage.png') }}" alt="">
                                            @endif
                                        </td>
                                        <td class="text-nowrap">
                                            <a class="btn btn-sm btn-primary"
                                                href="{{ route('product.edit', $item->id) }}"><i
                                                    class="fas fa-pencil-alt"></i></a>
                                            <button type="submit" class="btn btn-danger p-1"
                                                onclick="deleteUser({{ $item->id }})"><i
                                                    class="far fa-trash-alt"></i></button>
                                            <form id="delete-form-{{ $item->id }}"
                                                action="{{ route('product.destroy', $item) }}" method="POST"
                                                style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td rowspan="5">Data Not Found</td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@push('admin-js')
    <script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>
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
        document.getElementById("previewImage").src = "/noimage.png";

        function deleteUser(id) {
            swal({
                title: 'Are you sure?',
                text: "You want to Delete this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete-form-' + id).submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal(
                        'Cancelled',
                        'Your data is safe :)',
                        'error'
                    )
                }
            })
        }
    </script>
@endpush
