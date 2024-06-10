@extends('layouts.staff-account-layout')
@push('css')
    
@endpush
@section('content')
<div class="card">
    <div class="card-body">
      
            <h4>
                Total Schools<label class="badge text-white ml-2" style="background:#006400">{{ $total_programs  }}</label>
                <div class="float-right">
                   <a href="{{ route('manage-programs.create') }}" class="btn btn-sm text-white" style="background:#006400"> 
                        <label class="fa fa-plus"></label> New Program
                    </a>
                </div>
            </h4>
        </div>
        @if(@session('success'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <span> Successfully deleted </span>
            </div>
        @endif

        @if(@session('error')) 
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <span> Unknown error occured. Try again. </span>
            </div>
        @endif
        
        @if($total_programs > 0)
            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <th>Programs</th>
                        <th>Qualification</th>
                        <th>Tuition Fee</th>
                        <th>Action</th>
                    </tr>

                    @foreach($all_programs as $program)
                        <tr>
                            <td> {{ $program->name }} </td>
                            <td>  {{ $program->qualification }}  </td>
                            <td>  <b>K</b> {{ $program->tuition_fee }}  </td>
                            <td> 
                                <a href="{{ route('manage-programs.edit',encrypt($program->id)) }}" class="btn btn-sm text-white" style="background:#006400">Edit</a>
                                <a href="{{ route('delete-program-confirmation',encrypt($program->id)) }}" class="btn btn-sm btn-danger">Delete</a> 
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        @else
            <h3 class="text-danger text-center">You currently do not have programs in the database.</h3>
        @endif
   </div>

@endsection
