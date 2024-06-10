@extends('layouts.staff-account-layout2')
@push('css')
    
@endpush
@section('content')

    @if(@isset($selected_district))
    <!-- Page Header -->
    <div class="page-header">
            <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title">
                    Edit District Details
                    <a href="{{ route('provinces.show',encrypt($selected_district->province_id)) }}" class="btn add-btn border-0" style="background:#006400">
                        <i class="fa fa-eye"></i>
                        view
                    </a>
                </h3>
            </div>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="card">
            <div class="card-body">
                <form action="{{ route('update-province-district',encrypt($selected_district->id)) }}" method="POST">
                    @csrf
                    @if(@session('success'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <span> Successfully updated </span>
                        </div>
                    @endif

                    @if(@session('error')) 
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <span> Unknown error occured. Try again. </span>
                        </div>
                    @endif
        
                    <div class="form-group">
                        <label>District Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="name" value="{{ $selected_district->station }}">
                        @error("name")
                            <label class="text-danger"> {{ $message }} </label>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Date <span class="text-danger">*</span></label>
                        <input type="date" class="form-control" name="date" value="{{ $selected_district->date }}">
                        @error("date")
                            <label class="text-danger"> {{ $message }} </label>
                        @enderror
                    </div>
                    <div class="submit-section">
                        <button class="btn text-white submit-btn border-0" style="background:#006400; height:45px">Update</button>
                    </div>
                </form>
            </div>
        </div>
    @else
        <div class="card">
            <div class="card-body">
                <h4 class="text-danger text-center">This information has already been deleted.</h4>
                <center>
                    <a href="{{ route('provinces.index')}}" class="btn text-white border-0" style="background:#006400">
                        <i class="fa fa-reply"></i> Back to home
                    </a>
                </center>
            </div>
        </div>
    @endif
@endsection
