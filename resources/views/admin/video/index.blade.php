@extends('layouts.admin-master', ["pageName" => "video"])
@section('title', 'Create Video')
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
                        Video successfully added
                  </div>
                 @endif
                 @if(Session('update'))
                 <div class="alert-success alert font-weight-bold" role="alert">
                     video successfully Update
               </div>
                @endif
                  @if(Session('delete'))
                  <div class="alert-danger alert font-weight-bold" role="alert">
                    Delete successfully
                  </div>
                  @endif
                    <h4 class="heading"> <i class="fas fa-video mr-1"></i>Add Video</h4>
                    <form action="{{ route('video.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-6 mx-auto">
                                <div class="col-md-12 mb-2">
                                    <label for="title"> Title <span class="text-danger">*</span> </label>
                                    <input type="text" name="title" value="{{ old('title') }}" class="form-control shadow-none @error('title') is-invalid @enderror" id="title" placeholder="Enter title">
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label for="video"> Video Link<span class="text-danger">*</span></label>
                                    <input class="form-control shadow-none @error('video') is-invalid @enderror" id="video" type="url" name="video" placeholder="Enter Embed  Video Link">
                                    @error('video')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="clearfix border-top">
                            <div class="text-center mt-2">
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
                <i class="fas fa-video mr-1"></i> 
                All User List
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Status</th>
                                <th>Video</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($video as $key=>$item)
                                <tr>
                                    <td style="vertical-align: middle">{{ $key+1 }}</td>
                                    <td style="vertical-align: middle">{{ $item->title }}</td>
                                    <td style="vertical-align: middle">
                                      
                                           
                                                @if (!$item->status == 0)
                                                <a href="{{route('video.approve',$item)}}" class="btn  btn-primary p-1">Approve</a>
                                                @else
                                                <a href="{{route('video.approve',$item)}}" class="btn  btn-info p-1">Pending</a>
                                                @endif
                                    
                                    </td>
                                    <td>
                                        <iframe class="w-100" height="120" src="{{ $item->video }}">
                                        </iframe>
                                    </td>
                                    <td class="text-nowrap" style="vertical-align: middle">
                                        <a class="btn btn-sm  btn-primary" href="{{ route('video.edit', $item->id) }}"><i class="fas fa-pencil-alt"></i></a>
                                        <button type="submit" class="btn btn-danger p-1" onclick="deleteUser({{ $item->id }})"><i class="far fa-trash-alt"></i></button>
                                        <form id="delete-form-{{ $item->id }}" action="{{ route('video.destroy', $item) }}"
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