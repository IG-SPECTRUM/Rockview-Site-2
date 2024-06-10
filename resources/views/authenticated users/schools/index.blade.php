@extends('layouts.staff-account-layout')
@push('css')
    
@endpush
@section('content')
<div class="card">
    <div class="card-body">
      
            <h4>
                Total Schools<label class="badge text-white ml-2" style="background:#006400">{{ $total_schools  }}</label>
                <div class="float-right">
                   <a href="{{ route('schools.create') }}" class="btn btn-sm text-white" style="background:#006400"> 
                        <label class="fa fa-plus"></label> New School
                    </a>
                </div>
            </h4>
        </div>

        @if($total_schools > 0)
            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <th>School</th>
                        <th>Programs</th>
                        <th>Action</th>
                    </tr>

                    @foreach($all_schools as $school)
                        <tr>
                            <td> {{ $school->name }} </td>
                            <td> 
                                <?php 
                                    $total_programs = \App\Models\global_models\FacaultyProgram::where("facaulty_id",$school->id)->get()->count();
                                ?>
                                <label class="badge text-white" style="background:#006400">
                                    {{ $total_programs }}
                                </label>
                            </td>
                            <td> <a href="{{ route('schools.show',encrypt($school->id)) }}" class="btn btn-sm text-white" style="background:#006400">MORE</a> </td>
                        </tr>
                    @endforeach
                </table>
                <div class="float-right">
                    {{ $all_schools->links() }}
                </div>
            </div>
        @else
            <h3 class="text-danger text-center">You currently do not have schools in the database.</h3>
        @endif
   </div>

@endsection
