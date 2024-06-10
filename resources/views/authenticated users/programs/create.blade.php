@extends('layouts.staff-account-layout2')
@push('css')
    
@endpush
@section('content')
 <!-- Page Header -->
 <div class="page-header">
        <div class="row">
        <div class="col-sm-12">
            <h3 class="page-title">
                Create New Program
                <a href="{{ route('manage-programs.index') }}" class="btn add-btn border-0" style="background:#006400">
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
            <form action="{{ route('manage-programs.store') }}" method="POST">
                @csrf
                @if(@session('success'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <span> Successfully added </span>
                    </div>
                @endif

                @if(@session('error')) 
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <span> Unknown error occured. Try again. </span>
                    </div>
                @endif
    
                <div class="form-group">
                    <label>Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                    @error("name")
                        <label class="text-danger"> {{ $message }} </label>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Select Qualification <span class="text-danger">*</span></label>
                    <select class="form-control" name="qualification">
                        <option value="">---------- select-------------</option>
                        <option value="certicate">Certificate</option>
                        <option value="diploma">Diploma</option>
                        <option value="bachelors">Bachelors</option>
                        <option value="masters">Masters</option>
                        <option value="phd">PHD</option>
                    </select>
                    @error("qualification")
                        <label class="text-danger"> {{ $message }} </label>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Tuition Fee <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" name="tuition_fee" value="{{ old('tuition_fee') }}">
                    @error("tuition_fee")
                        <label class="text-danger"> {{ $message }} </label>
                    @enderror
                </div>
				<div class="submit-section">
					<button class="btn text-white submit-btn border-0" style="background:#006400; height:45px">SUBMIT</button>
				</div>
			</form>
        </div>
    </div>
@endsection
