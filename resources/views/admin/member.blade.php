@extends('layouts.admin-master')
@section('title', 'Create Committee')
@push('admin-css')
@endpush    
@section('admin-content')
<main>
    <div class="container-fluid">
        <div class="card my-3">
            <div class="card-header">
                <i class="fas fa-users mr-1"></i>
                All User List
            </div>
            <div class="card-body">
                @if(Session('delete'))
                <div class="alert-success alert font-weight-bold" role="alert">
                  Delete successfully
                </div>
                @endif
                <div class="table-responsive">
                    <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>D O B</th>
                                <th>Blood</th>
                                <th>Area</th>
                                <th>Status</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($member as $key=>$item)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->date }}</td>
                                    <td>{{ $item->blood }}</td>
                                    @if ( $item->area == 1)
                                    <td>In Mirpur</td>
                                    @else
                                    <td>Outside Mirpur</td>  
                                    @endif
                                    <td> 
                                         @if (!$item->status == 1)
                                             <form action="{{ route('member.approve', $item) }}" method="POST">
                                                @csrf
                                                @method('put')
                                                <input class="btn  btn-primary p-1" type="submit" value="Pending">
                                            </form>   
                                            @else
                                                <form action="{{ route('member.pending', $item) }}" method="POST">
                                                @csrf
                                                @method('put')
                                                <input class="btn  btn-success p-1" type="submit" value="Apporve">
                                            </form>       
                                         @endif  
                                    </td>
                                    <td>
                                        @if(!empty($item->image))
                                        <img class="border" style="height: 40px; width:50px;" src="{{ asset($item->image) }}" alt="">
                                        @else
                                        <img class="border" style="height: 40px; width:50px;" src="{{ asset('noimage.png') }}" alt="">
                                        @endif
                                    </td>
                                    <td class="text-nowrap">
                                        
                                        <button type="submit" class="btn btn-danger p-1" onclick="deleteUser({{ $item->id }})"><i class="far fa-trash-alt"></i></button>
                                        <form id="delete-form-{{ $item->id }}" action="{{ route('member.delete', $item) }}"
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