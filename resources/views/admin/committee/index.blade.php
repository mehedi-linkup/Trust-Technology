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
                     
                  @if(Session('status'))
                    <div class="alert-success alert font-weight-bold" role="alert">
                        Management successfully added
                  </div>
                 @endif
                  @if(Session('delete'))
                  <div class="alert-danger alert font-weight-bold" role="alert">
                    Delete successfully
                  </div>
                  @endif
                    <h4 class="heading"><i class="fas fa-user-friends"></i> Add  Management</h4>
                    <form action="{{ route('management.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <label for="name"> Name <span class="text-danger">*</span> </label>
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control shadow-none @error('name') is-invalid @enderror" id="name" placeholder="Enter name">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="designation">Dasignation <span class="text-danger">*</span></label>
                                <input type="text" name="designation" value="{{ old('designation') }}" class="form-control shadow-none @error('designation') is-invalid @enderror" id="designation" placeholder="Enter designation">
                                @error('designation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-3 mb-2">
                                <label for="facebook"> Facebook</label>
                                <input type="url" name="facebook" value="{{ old('facebook') }}" class="form-control shadow-none @error('facebook') is-invalid @enderror" id="facebook" placeholder="Enter facebook">
                                @error('facebook')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <label for="twitter" class="mt-2"> twitter</label>
                                <input type="url" name="twitter" value="{{ old('twitter') }}" class="form-control shadow-none @error('twitter') is-invalid @enderror" id="twitter" placeholder="Enter twitter">
                                @error('twitter')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-3 mb-2">
                                <label for="linkedin"> linkedin</label>
                                <input type="url" name="linkedin" value="{{ old('linkedin') }}" class="form-control shadow-none @error('linkedin') is-invalid @enderror" id="linkedin" placeholder="Enter linkedin">
                                @error('linkedin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <label for="instagram" class="mt-2">Instagram</label>
                                <input type="url" name="instagram" value="{{ old('instagram') }}" class="form-control shadow-none @error('instagram') is-invalid @enderror" id="instagram" placeholder="Enter instagram">
                                @error('instagram')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="image">Management Image</label>
                                <input class="form-control" id="image" type="file" name="image" onchange="readURL(this);">
                                <div class="form-group mt-2">
                                    <img class="form-controlo img-thumbnail" src="#" id="previewImage" style="width: 100px;height: 80px; background: #3f4a49;">
                                </div>
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
                <i class="fas fa-user-friends ml-1"></i>
                All Management
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Dasignation</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($committee as $key=>$item)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->designation }}</td>
                                    <td>
                                        @if(!empty($item->image))
                                        <img class="border" style="height: 40px; width:50px;" src="{{ asset($item->image) }}" alt="">
                                        @else
                                        <img class="border" style="height: 40px; width:50px;" src="{{ asset('noimage.png') }}" alt="">
                                        @endif
                                    </td>
                                    <td class="text-nowrap">
                                        <a class="btn btn-sm  btn-primary" href="{{ route('management.edit', $item->id) }}"><i class="fas fa-pencil-alt"></i></a>
                                        <button type="submit" class="btn btn-danger p-1" onclick="deleteUser({{ $item->id }})"><i class="far fa-trash-alt"></i></button>
                                        <form id="delete-form-{{ $item->id }}" action="{{ route('management.destroy', $item) }}"
                                            method="POST" style="display: none;">
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
            
            reader.onload = function (e) {
                $('#previewImage')
                    .attr('src', e.target.result)
                    .width(100)
                    .height(80);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    document.getElementById("previewImage").src="/noimage.png";
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