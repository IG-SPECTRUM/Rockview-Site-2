@extends('layouts.staff-account-layout')
@push('css')
    
@endpush
@section('content')
<div class="card">
    <div class="card-body">
      
            <h4>
                Total Provinces<label class="badge text-white ml-2" style="background:#006400">{{ $total_provinces  }}</label>
                <div class="float-right">
                   <a href="{{ route('provinces.create') }}" class="btn btn-sm text-white" style="background:#006400"> 
                        <label class="fa fa-plus"></label> New Province
                    </a>
                </div>
            </h4>
        </div>

        @if($total_provinces > 0)
            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <th>Name</th>
                        <th>Targeted Districts</th>
                        <th>Action</th>
                    </tr>

                    @foreach($all_provinces as $province)
                        <tr>
                            <td> {{ $province->name }} </td>
                            <td> 
                                <label class="badge text-white bg-success">
                                    {{ $province->province_station->count() }}
                                </label>    
                            </td>
                            <td> 
                                <a href="{{ route('provinces.show',encrypt($province->id)) }}" class="btn btn-sm text-white" style="background:#006400">More</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
                <div class="float-right">
                    {{ $all_provinces->links() }}
                </div>
            </div>
        @else
            <h3 class="text-danger text-center">You currently do not have provinces in the database.</h3>
        @endif
   </div>

@endsection
