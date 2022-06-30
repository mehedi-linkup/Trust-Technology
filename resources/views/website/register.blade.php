@extends('layouts.website', ['pageName' => 'register']) 
@section('website-contents') 
@section('title', 'Register')
@push('website-css') 
<style>
.file-field.big .file-path-wrapper {
height: 3.2rem; }
.file-field.big .file-path-wrapper .file-path {
height: 3rem; }
</style>
@endpush
<section class="pager">
    <div class="container pager-text py-5">
        <h3 class="text-center text-white fw-bold">Register</h3>
    </div>
</section>
<section class="pt-4 pb-5">
    <div class="container">
        <div class="row">
            <div class="col-8 mx-auto card px-5 pb-5 pt-4 border-0 shadow">
                <div class="inner-page-header mb-4">
                    <h4>Register Impulse Blood Bank</h4>
                </div>
                @if(Session('status'))
                <div class="alert-success alert fw-bold p-2" role="alert">
                    Registration Complete
                </div>
                @endif
                <form action="{{ route('member.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-2 row from-group">
                        <div class="col-6">
                            <label class="">Name <span class="text-danger"> *</span></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" name="name" placeholder="Type Your Name" aria-label="" />
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label class="">Phone <span class="text-danger"> *</span></label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" name="phone" placeholder="Type Your Phone Number" aria-label="Server" />
                            @error('phone')
                            <label class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </label>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group mb-2">
                        <div class="col-6">
                            <label class="" id="basic-addon3">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Type Your Email" aria-describedby="basic-addon3" />
                            @error('email')
                            <label class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </label>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label class="">Date Of Birth <span class="text-danger"> *</span></label>
                            <input type="date" name="date" class="form-control @error('date') is-invalid @enderror" value="{{ old('date') }}" placeholder="Type Your " aria-label="Server" />
                            @error('date')
                            <label class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </label>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group mb-2">
                        <div class="col-6">
                            <label class="" id="basic-addon3">Select Area<span class="text-danger"> *</span></label>
                            <select class="form-control @error('area') is-invalid @enderror" name="area">
                                <option value="">Select Area</option>
                                <option value="1">In Dhaka</option>
                                <option value="2">Outside Dhaka</option>     
                              </select>
                            @error('area')
                            <label class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </label>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label class="">Blood Group <span class="text-danger"> *</span></label>
                            <select class="form-control @error('blood') is-invalid @enderror"  name="blood">
                                <option value="">Select Blood Group</option>
                                <option value="A+">A+</option>     
                                <option value="A-">A-</option>     
                                <option value="B+">B+</option>     
                                <option value="O+">O+</option>     
                                <option value="O-">O-</option>     
                                <option value="AB+">AB+</option>     
                                <option value="AB-">AB-</option>     
                              </select>
                              @error('blood')
                              <label class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </label>
                              @enderror
                        </div>
                    </div>
                    <div class="from-group mb-2">
                        <label class="">Address</label>
                        <input type="text" name="address" class="form-control" value="{{ old('address') }}" placeholder="Type Your Address" />
                    </div>
                    <div class="from-group mb-2">
                        <label class="">Image <span class="text-danger">*</span></label><br>
                        <input class="form-control @error('image') is-invalid @enderror" type="file" name="image" />
                        @error('image')
                        <label class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </label>
                        @enderror
                    </div>
                    <div class="d-inline mt-3">
                        <button type="submit" class="about-btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@push('website-js') @endpush @endsection
