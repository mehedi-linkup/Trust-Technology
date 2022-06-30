@extends('layouts.admin-master', ['pageName' => 'register'])
@section('title', 'Create User')
@push('admin-css')
@endpush    
@section('admin-content')
<main>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if(Session('status'))
                    <div class="alert-success alert font-weight-bold" role="alert">
                        User Created Successfully
                  </div>
                 @endif
                 @if(Session('update'))
                 <div class="alert-success alert font-weight-bold" role="alert">
                     video Updated Successfully
               </div>
                @endif
                  @if(Session('delete'))
                  <div class="alert-danger alert font-weight-bold" role="alert">
                    User Delete successfully
                  </div>
                  @endif
                <div class="form-area">
                    <h4 class="heading"><i class="fa fa-user-plus"></i> Add User</h4>
                    <form action="{{ route('register.store') }}" method="POST" enctype="multipart/form-data">
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
                                <label for="email">E-Mail Address <span class="text-danger">*</span></label>
                                <input type="email" name="email" value="{{ old('email') }}" class="form-control shadow-none @error('email') is-invalid @enderror" id="email" placeholder="Enter Email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="username"> UserName <span class="text-danger">*</span></label>
                                <input type="text" name="username" value="{{ old('username') }}" class="form-control shadow-none @error('username') is-invalid @enderror" id="username" placeholder="Enter Username">
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <label for="password" class="mt-2"> Password <span class="text-danger">*</span></label>
                                <input type="password" name="password" value="{{ old('password') }}" class="form-control shadow-none @error('password') is-invalid @enderror" id="password" placeholder="Enter Password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="image">User Image</label>
                                <input class="form-control" id="image" type="file" name="image" onchange="readURL(this);">
                                <div class="form-group mt-2">
                                    <img class="form-controlo img-thumbnail" src="#" id="previewImage" style="width: 100px;height: 80px; background: #3f4a49;">
                                </div>
                            </div>
                        </div>
                        
                        <div class="clearfix border-top">
                            <div class="float-md-right mt-2">
                                <button type="reset" class="btn btn-dark">Reset</button>
                                <button type="submit" class="btn btn-info">Create</button>
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
                <i class="fas fa-users mr-1"></i>
                All User List
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Username</th>
                                <th>Image</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $key=>$user)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>
                                        @if(!empty($user->image))
                                        <img class="border" style="height: 40px; width:50px;" src="{{ asset($user->image) }}" alt="">
                                        @else
                                        <img class="border" style="height: 40px; width:50px;" src="{{ asset('noimage.png') }}" alt="">
                                        @endif
                                    </td>
                                    <td class="text-nowrap">
                                        <a href="{{ route('register.destroy', $user->id) }}" class="btn btn-danger p-1" onclick="return confirm('Are you sure?')"><i class="far fa-trash-alt"></i></button>
                                        {{-- <form id="delete-form-{{ $user->id }}" action="{{ route('register.destroy', $user) }}"
                                            method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form> --}}
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
</script>
@endpush