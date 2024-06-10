@extends('layouts.staff-account-layout3')
@push('css')
    
@endpush
@section('content')
 <!-- Page Header -->
    @if(@isset($selected_program))
    <div class="page-header">
            <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title">
                    Edit Program
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
                <form action="{{ route('manage-programs.update',encrypt($selected_program->id)) }}" method="POST">
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
                        <input type="text" class="form-control" name="name" value="{{ $selected_program->name }}">
                        @error("name")
                            <label class="text-danger"> {{ $message }} </label>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Select Qualification <span class="text-danger">*</span></label>
                        <select class="form-control" name="qualification">
                            @if($selected_program->qualification == "certicate")
                                <option value="certicate">Certificate</option>
                                <option value="diploma">Diploma</option>
                                <option value="bachelors">Bachelors</option>
                                <option value="masters">Masters</option>
                                <option value="phd">PHD</option>
                            @elseif($selected_program->qualification == "diploma")
                                <option value="diploma">Diploma</option>
                                <option value="certicate">Certificate</option>
                                <option value="bachelors">Bachelors</option>
                                <option value="masters">Masters</option>
                                <option value="phd">PHD</option>
                            @elseif($selected_program->qualification == "bachelors")
                                <option value="bachelors">Bachelors</option>
                                <option value="certicate">Certificate</option>
                                <option value="diploma">Diploma</option>
                                <option value="masters">Masters</option>
                                <option value="phd">PHD</option>
                            @elsif($selected_program->qualification == "masters")
                                <option value="masters">Masters</option>
                                <option value="certicate">Certificate</option>
                                <option value="diploma">Diploma</option>
                                <option value="bachelors">Bachelors</option>
                                <option value="phd">PHD</option>
                            @elseif($selected_program->qualification == "phd")
                                <option value="phd">PHD</option>
                                <option value="certicate">Certificate</option>
                                <option value="diploma">Diploma</option>
                                <option value="bachelors">Bachelors</option>
                                <option value="masters">Masters</option>
                            @endif
                        </select>
                        @error("qualification")
                            <label class="text-danger"> {{ $message }} </label>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Tuition Fee <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" name="tuition_fee" value="{{ $selected_program->tuition_fee }}">
                        @error("tuition_fee")
                            <label class="text-danger"> {{ $message }} </label>
                        @enderror
                    </div>
                    <div class="submit-section">
                        <button class="btn text-white submit-btn border-0" style="background:#006400; height:45px">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    @else
        <div class="card">
            <div class="card-body">
                <h4 class="text-danger">This program is already deleted</h4><br>
                <a href="{{ route('manage-programs.index') }}" class="btn add-btn border-0" style="background:#006400">
                    <i class="fa fa-reply"></i>
                    Back
                </a>
            </div>
        </div>
    @endif
@endsection
