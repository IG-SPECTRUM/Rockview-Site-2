@extends('layouts.staff-account-layout2')
@push('css')
    
@endpush
@section('content')
 <!-- Page Header -->
 <div class="page-header">
        <div class="row">
        <div class="col-sm-12">
            <h3 class="page-title">
                <a href="{{ route('schools.index') }}" class="btn add-btn border-0" style="background:#006400">
                    <i class="fa fa-reply"></i>
                    Back
                </a>
            </h3>
        </div>
        </div>
    </div>
    <!-- /Page Header -->
    @isset($selected_school)
        <table class="table">
            <tr>
                <td>
                    <img src="../storage/website/images/course.png" style="width:100px; height:100px;">
                    <h3 class="text-capitalize"> 
                        {{ $selected_school->name }}
                    </h3>
                    <a href="{{ route('schools.edit',encrypt($selected_school->id)) }}"
                     class="btn btn-sm text-white" style="background:#006400">Edit</a>
                </td>
                <td>
                    @if(@isset($none_added_programs))
                        <form action="{{ route('add-program-to-school') }}" method="post">
                            @csrf
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label>Add Program
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-control" name="program">
                                        <option value="">------------- select ------------</option>
                                        @foreach($none_added_programs as $program)
                                            <?php
                                                $already_added_program = \App\Models\global_models\FacaultyProgram::where("program_id",$program->id)
                                                ->where("facaulty_id",$selected_school->id)->get()->first();    
                                            ?>
                                            @if(@isset($already_added_program))
                                                @if(!$already_added_program->program_id == $program->id)
                                                   <option value="{{ encrypt($program->id) }}">{{ $program->name }}</option>
                                                @endif
                                            @else 
                                                <option value="{{ encrypt($program->id) }}">{{ $program->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @if(@session("success"))
                                        <label class="text-success"> Successfully added</label>
                                    @endif
                                    @error("program")
                                        <label class="text-danger">{{ $message }}</label>
                                    @enderror
                                    @error("school")
                                        <label class="text-danger">{{ $message }}</label>
                                    @enderror
                                    @if(@session("error"))
                                        <label class="text-danger"> Unknown error occured. Try again.</label>
                                    @endif
                                    <input type="hidden" class="form-control" name="school" value="{{ encrypt($selected_school->id )}}">
                                    <input type="submit" class="btn btn-sm text-white btn-block mt-2" style="background:#006400" value="Add">
                                </div>
                            </div>
                        </form>
                    @endif
                </td>
            </tr>
        </table>
        <br><br><br>
    @endisset
    <div class="card">
        <div class="card-body">
            <label>
                Total programs
                <span class="badge text-white" style="background:#006400">
                    {{ $total_school_programs }}
                </span>
            </label>
            @if(@session('success'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <span> Successfully removed</span>
                </div>
            @endif

            @if(@session('error')) 
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <span> Unknown error occured. Try again. </span>
                </div>
            @endif
            <table class="table table-striped">
                @forelse($school_programs as $program)
                    <tr>
                        <td>
                            {{ $program->program->name }}
                        </td>
                        <td>
                            <a href="{{ route('delete-school-confirmation',[encrypt($program->id),encrypt($selected_school->id)]) }}" class="text-danger">Remove</a>
                        </td>
                    </tr>
                @empty

                @endforelse
            </table>
            <div class="float-right">
                {{ $school_programs->links() }}
            </div>
        </div>
    </div>
@endsection
