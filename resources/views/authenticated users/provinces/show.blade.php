@extends('layouts.staff-account-layout2')
@push('css')
    
@endpush
@section('content')
 <!-- Page Header -->
 <div class="page-header">
    <div class="row">
        <div class="col-sm-12">
            <h3 class="page-title">
                <a href="{{ route('provinces.index') }}" class="btn add-btn border-0" style="background:#006400">
                    <i class="fa fa-reply"></i>
                    Back
                </a>
            </h3>
        </div>
    </div>
</div>
<!-- /Page Header -->

@isset($selected_province)
        <table class="table">
            <tr>
                <td>
                    <h3 class="text-capitalize"> 
                        {{ $selected_province->name }}
                    </h3>
                    <div class="col-lg-5" style="margin-left:-20px">
                        <a href="{{ route('provinces.edit',encrypt($selected_province->id)) }}" class="btn btn-sm btn-block text-white"
                        style="background:#006400">Edit</a> 
                    </div>
                </td>
                <td>
                   
                    <form action="{{ route('add-province-location') }}" method="post">
                        @csrf
                        <div class="col-lg-6">         
                            @if(@session("success"))
                                <label class="text-success"> Successfully recorded</label>
                            @endif
                           
                            @if(@session("error"))
                                <label class="text-danger"> Unknown error occured. Try again.</label>
                            @endif
                            
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="province" value="{{ encrypt($selected_province->id )}}">
                                @error("province")
                                    <label class="text-danger"> {{ $message }}</label>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>District <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="location" value="{{ old('old') }}">
                                @error("location")
                                    <label class="text-danger"> {{ $message }}</label>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Date <span class="text-danger">*</span></label>
                                <input type="date" class="form-control" name="date" value="{{ old('date') }}">
                                @error("date")
                                    <label class="text-danger"> {{ $message }}</label>
                                @enderror
                            </div>
                            <input type="submit" class="btn btn-sm text-white btn-block mt-2" style="background:#006400" value="Add">
                        </div>
                    </form>
                </td>
            </tr>
        </table>
        
    @endisset
    
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
    
    <div class="card">
        <div class="card-bod">
            <label>
                Total Districts
                <span class="badge text-white" style="background:#006400">
                   {{ $total_targeted_districts }}
                </span>
            </label>
            <table class="table table-striped">
               @forelse($targeted_districts as $targeted_district)
                    <tr>
                        <td> {{ $targeted_district->station }} </td>
                        <td> {{ $targeted_district->date }} </td>
                        <td> 
                            <a href="{{ route('edit-province-district',encrypt($targeted_district->id)) }}" class="btn btn-sm text-white" style="background:#006400">Edit</a> 
                            <a href="{{ route('delete-province-district',encrypt($targeted_district->id)) }}" class="btn btn-sm btn-danger">Remove</a>   
                        </td>
                    </tr>
               @empty 

               @endforelse
            </table>
            <div class="float-right">
                {{ $targeted_districts->links() }}
            </div>
        </div>
    </div>
@endsection
