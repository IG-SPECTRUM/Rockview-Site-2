@extends('layouts.staff-account-layout3')
@push('css')
    
@endpush
@section('content')
 <!-- Page Header -->
 @if(@isset($selected_school))
 <div class="page-header">
        <div class="row">
        <div class="col-sm-12">
            <h3 class="page-title">
                Edit School
                <a href="{{ route('schools.show',encrypt($selected_school->id)) }}" class="btn add-btn border-0" style="background:#006400">
                    <i class="fa fa-reply"></i>
                    Back
                </a>
            </h3>
        </div>
        </div>
    </div>
    <!-- /Page Header -->
@endif

    <div class="card">
        <div class="card-body">
            @if(@isset($selected_school))
                <form action="{{ route('schools.update',encrypt($selected_school->id)) }}" method="POST">
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
                        <input type="text" class="form-control" name="name" value="{{ $selected_school->name }}">
                        @error("name")
                            <label class="text-danger"> {{ $message }} </label>
                        @enderror
                    </div>
                    <div class="submit-section">
                        <button class="btn text-white submit-btn border-0" style="background:#006400; height:45px">Save Changes</button>
                    </div>
                </form>
            @else 
                <h3 class="text-danger">This information no longer exist.</h3>
                <p>
                    <a href="{{ route('schools.index') }}" class="btn add-btn border-0" style="background:#006400">
                        <i class="fa fa-reply"></i>
                        Back
                    </a>
                </p>
            @endif
        </div>
    </div>
@endsection
