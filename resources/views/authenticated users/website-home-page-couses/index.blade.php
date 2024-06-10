@extends('layouts.staff-account-layout')
@push('css')
    
@endpush
@section('content')
<h4>
    <div class="float-right">
        <a href="{{ route('website-main-page-couses.create') }}" class="btn btn-sm text-white" style="background:#006400"> 
            <label class="fa fa-plus"></label> New Couse
        </a>
    </div>
</h4><br><br>
<div class="card">
    <div class="card-body">
        @if(@session('success'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <span> Successfully deleted. </span>
            </div>
        @endif

        @if(@session('error')) 
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <span> Unknown error occured. Try again. </span>
            </div>
        @endif
        
        <div class="row">
            @forelse($courses as $course)
                <div class="col-lg-3 col-sm-3 mb-5">
                    <div class="card p-0 hover-shadow">
                        <img class="card-img-top rounded-0" src="storage/courses/{{$course->image}}" alt="course thumb" style="height:200px"/>
                        <div class="card-body">
                            <h4 class="card-title">
                                {{ $course->course}}
                            </h4>
                            <form action="{{ route('website-main-page-couses.destroy',encrypt($course->id)) }}" method="post">
                                @method("DELETE")
                                @csrf
                                <input type="submit" class="btn btn-primary btn-sm" value="Remove">
                            </form>
                        </div>
                    </div>
                </div>
            @empty 

            @endforelse
            
        </div>
    </div>
</div>

@endsection
