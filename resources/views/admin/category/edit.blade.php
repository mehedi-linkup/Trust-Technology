@extends('layouts.admin-master', ['pageName' => 'category'])
@section('title', 'Create Category')
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
                  @if(Session('status'))
                    <div class="alert-success alert font-weight-bold" role="alert">
                        Category successfully added
                  </div>
                 @endif
                 @if(Session('update'))
                 <div class="alert-success alert font-weight-bold" role="alert">
                    Category successfully Update
               </div>
              @endif
                  @if(Session('delete'))
                  <div class="alert-danger alert font-weight-bold" role="alert">
                    Delete successfully
                  </div>
                  @endif
                    <h4 class="heading"><i class="fas fa-edit"></i> Edit Category</h4>
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-6 mx-auto">
                            <form action="{{ route('category.update',$category->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="col-12 mb-2">
                                        <label for="title"> Name <span class="text-danger">*</span> </label>
                                        <input type="text" name="name" value="{{$category->name }}" class="form-control shadow-none @error('name') is-invalid @enderror" id="title" placeholder="Enter Category Name">
                                        @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-12 mb-2">
                                        <div for="" class="mb-2">Status</div>
                                        @if($category->status == 1)
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="1" checked>
                                            <label class="form-check-label" for="inlineRadio1">On</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="0">
                                            <label class="form-check-label" for="inlineRadio2">Off</label>
                                        </div>
                                        @else
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="1">
                                            <label class="form-check-label" for="inlineRadio1">On</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="0" checked>
                                            <label class="form-check-label" for="inlineRadio2">Off</label>
                                        </div>
                                        @endif
                                    </div>
                                    {{-- <div class="col-12 mb-2">
                                        <label for="image"> Image</label>
                                        <input class="form-control" id="image" type="file" name="image" onchange="readURL(this);">
                                        <div class="form-group mt-2">
                                            <img class="form-controlo img-thumbnail" src="#" id="previewImage" style="width: 100px;height: 80px; background: #3f4a49;">
                                        </div>
                                    </div> --}}
                                </div>
                                <div class="clearfix border-top">
                                    <div class="mt-2">
                                        <a href="{{route('category.index')}}" class="btn btn-dark">back</a>
                                        <button type="submit" class="btn btn-info">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</main>
@endsection
@push('admin-js')
<script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>
<script>
    // function readURL(input) {
    //     if (input.files && input.files[0]) {
    //         var reader = new FileReader();
            
    //         reader.onload = function (e) {
    //             $('#previewImage')
    //                 .attr('src', e.target.result)
    //                 .width(100)
    //                 .height(80);
    //         };

    //         reader.readAsDataURL(input.files[0]);
    //     }
    // }
    // document.getElementById("previewImage").src="{{ asset($category->image)}}";

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