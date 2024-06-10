@extends('layouts.staff-account-layout3')
@push('css')
    
@endpush
@section('content')
 <!-- Page Header -->
 <div class="page-header">
        <div class="row">
        <div class="col-sm-12">
            <h3 class="page-title">
                Edit Admin Details
                <a href="{{ route('admins.show',encrypt($admin->id)) }}" class="btn add-btn border-0" style="background:#006400">
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
            <form action="{{ route('admins.update',encrypt($admin->id)) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method("patch")
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
                    <label>Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="name" value="{{ $admin->name }}">
                    @error("name")
                        <label class="text-danger"> {{ $message }} </label>
                    @enderror
                </div>
               
                <div class="form-group">
                    <label> Email <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" name="email" value="{{ $admin->email }}">
                    @error("email")
                        <label class="text-danger"> {{ $message }} </label>
                    @enderror
                </div>
                <div class="form-group">
                    <label> Staff ID <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" name="staff_id" value="{{ $admin->staff_id }}">
                    @error("staff_id")
                        <label class="text-danger"> {{ $message }} </label>
                    @enderror
                </div>

                <div class="form-group">
                    <label> Image(optional)</label>
                    <input type="file" class="form-control" name="image">
                    @if(@session("image-extension-error"))
                        <label class="text-danger"> Wrong image extension </label>
                    @endif
                </div>
                    
				<div class="submit-section">
					<button class="btn text-white submit-btn border-0" style="background:#006400; height:45px">SAVE CHANGES</button>
				</div>
			</form>
        </div>
    </div>
@endsection
