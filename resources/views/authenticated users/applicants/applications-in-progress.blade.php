@extends('layouts.staff-account-layout')
@push('css')
    
@endpush
@section('content')
<div class="card">
    <div class="card-body">
        <h4>
            Total Applicants
            <label class="badge badge-success">{{ $total_applicants }}</label>
            <div class="float-right">
            Drop-down filter
            </div>
        </h4>

        @if($total_applicants > 0)
            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <thead>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Country</th>
                            <th>Student Number</th>
                            <th>Action</th>
                        </thead>
                    </tr>

                    @foreach($applicants as $applicant)
                        <tr>
                            <td>
                                <img src="storage/applicants/{{ $applicant->image}}" style="width:50px; height:50px">
                            </td>

                            <td> {{ $applicant->name }} </td>
                            <td> {{ $applicant->country }} </td>
                            <td> {{ $applicant->student_id }} </td>
                            <td>
                                <a href="" class="btn btn-sm btn-success">More</a>    
                            </td>
                        </tr>
                    @endforeach
                </table>
                <div class="float-right">
                    {{ $applicants->links() }}
                </div>
            </div>
        @else 
            <h4 class="text-danger"> You currently do not have applicants </h4>
        @endif
    </div>
</div>
@endsection
