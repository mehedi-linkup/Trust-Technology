@extends('layouts.admin-master', ['pageName' => 'category'])
@section('title', 'Create Category')
@push('admin-css')
@endpush
@section('admin-content')
    <main>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-5">
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
                        @if (Session('status'))
                            <div class="alert-success alert font-weight-bold" role="alert">
                                Category successfully added
                            </div>
                        @endif
                        @if (Session('update'))
                            <div class="alert-success alert font-weight-bold" role="alert">
                                Category successfully Update
                            </div>
                        @endif
                        @if (Session('delete_check'))
                            <div class="alert-danger alert font-weight-bold" role="alert">
                                You must delete your related product first.
                            </div>
                        @endif
                        @if (Session('delete'))
                            <div class="alert-danger alert font-weight-bold" role="alert">
                                Delete successfully
                            </div>
                        @endif
                        <h4 class="heading"><i class="fas fa-plus"></i> Add Category</h4>
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12 mb-2">
                                            <label for="name"> Name <span class="text-danger">*</span> </label>
                                            <input type="text" name="name" value="{{ old('name') }}"
                                                class="form-control shadow-none @error('name') is-invalid @enderror"
                                                id="name" placeholder="Enter Category Name">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-12 mb-2">
                                            <div for="" class="mb-2">Status</div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="1">
                                                <label class="form-check-label" for="inlineRadio1">On</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="0">
                                                <label class="form-check-label" for="inlineRadio2">Off</label>
                                            </div>

                                            @error('status')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        {{-- <div class="col-12 mb-2">
                                            <label for="image"> Image</label>
                                            <input class="form-control" id="image" type="file" name="image"
                                                onchange="readURL(this);">
                                        </div> --}}
                                    </div>
                                    <div class="clearfix border-top">
                                        <div class="mt-2">
                                            <button type="submit" class="btn btn-info">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            {{-- <div class="col-12 col-md-6">
                                <div class="form-group mt-2">
                                    <img class="form-controlo img-thumbnail" src="#" id="previewImage"
                                        style="width: 200px;height: 150px; background: #3f4a49;">
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="card my-3">
                        <div class="card-header">
                            <i class="fas fa-list mr-1"></i>
                            All Category
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($category as $key=>$item)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $item->name }}</td>
                                                {{-- <td>
                                                    @if (!empty($item->image))
                                                        <img class="border" style="height: 40px; width:50px;"
                                                            src="{{ asset($item->image) }}" alt="">
                                                    @else
                                                        <img class="border" style="height: 40px; width:50px;"
                                                            src="{{ asset('noimage.png') }}" alt="">
                                                    @endif
                                                </td> --}}
                                                <td>{{ $item->status }}</td>
                                                <td class="text-nowrap">
                                                    <a class="btn btn-sm  btn-primary"
                                                        href="{{ route('category.edit', $item->id) }}"><i
                                                            class="fas fa-pencil-alt"></i></a>
                                                    <button type="submit" class="btn btn-danger p-1"
                                                        onclick="deleteUser({{ $item->id }})"><i
                                                            class="far fa-trash-alt"></i></button>
                                                    <form id="delete-form-{{ $item->id }}"
                                                        action="{{ route('category.destroy', $item) }}" method="POST"
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
            </div>
        </div>
        {{-- <div class="container-fluid">
        </div> --}}
    </main>
@endsection
@push('admin-js')
    <script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>
    <script>
        // function readURL(input) {
        //     if (input.files && input.files[0]) {
        //         var reader = new FileReader();

        //         reader.onload = function(e) {
        //             $('#previewImage')
        //                 .attr('src', e.target.result)
        //                 .width(200)
        //                 .height(150);
        //         };

        //         reader.readAsDataURL(input.files[0]);
        //     }
        // }
        // document.getElementById("previewImage").src = "/noimage.png";

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
