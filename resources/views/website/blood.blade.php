@extends('layouts.website') 
@section('website-contents') 
@section('title', 'Register')
@push('website-css') 
<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
<style>
.file-field.big .file-path-wrapper {
height: 3.2rem; }
.file-field.big .file-path-wrapper .file-path {
height: 3rem; }
</style>
@endpush
<section class="pager">
    <div class="container pager-text py-5">
        <h3 class="text-center text-white fw-bold">Blood Bank</h3>
    </div>
</section>
<section class="pt-4 pb-5">
    <div class="container">
        <div class="row">
            <div class="col-10 mx-auto card px-5 pb-5 pt-4 border-0 shadow">
                <div class="inner-page-header mb-4">
                    <h4>Blood Bank Impulse</h4>
                </div>
                {{-- @if(Session('status'))
                <div class="alert-success alert fw-bold p-2" role="alert">
                    Find Your Blood 
                </div>
                @endif --}}
                <form action="{{ route('blood.search') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row form-group mb-4">
                        <div class="col-12 col-md-6 col-lg-6">
                            <label class="" id="basic-addon3">Select Area<span class="text-danger"> *</span></label>
                            <select class="form-control @error('area') is-invalid @enderror" name="area" required>
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
                        <div class="col-lg-4 col-md-4 col-12">
                            <label class="">Blood Group <span class="text-danger"> *</span></label>
                            <select class="form-control @error('blood') is-invalid @enderror"  name="blood" required>
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
                        <div class="col-12 col-md-2 col-lg-2">
                            <label for="" > </label>
                            <button type="submit" class="about-btn mt-4">Search</button>
                        </div>
                    </div>  
                </form>
                <table class="table table-striped table-hover mt-5" id="dataTable">
                    <thead class="text-white" style="background:#ED0404">
                     <th>Name</th>
                     <th>Blood Group</th>
                     <th>Phone</th>
                     <th>Area</th>
                     <th>Address</th>
                    </thead>
                    <tbody> 
                        @forelse ($bloodDonor as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->blood }}</td>
                            <td>{{ $item->phone }}</td>
                                @if ( $item->area == 1)
                                <td>In Dhaka</td>
                                @else
                                <td>Outside Dhaka</td>  
                                @endif
                            <td>{{ $item->address }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center">  !Opps  No Result Found </td>
                        </tr>
                        @endforelse 
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</section>
@push('website-js')
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<script src="{{ asset('content/admin/assets/demo/datatables-demo.js') }}"></script>
 @endpush 
 @endsection
