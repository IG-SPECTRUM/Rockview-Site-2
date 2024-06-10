@extends('layouts.staff-account-layout')
@push('css')
    
@endpush
@section('content')
<h4>
    <div class="float-right">
        <a href="{{ route('main-slider.create') }}" class="btn btn-sm text-white" style="background:#006400"> 
            <label class="fa fa-plus"></label> New image
        </a>
    </div>
</h4><br><br>
<div class="card">
    <div class="card-body">
        @if(@session('success'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <span> Successfully removed. </span>
            </div>
        @endif

        @if(@session('error')) 
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <span> Unknown error occured. Try again. </span>
            </div>
        @endif
        
        <div class="row">
            @forelse($images as $image)
                <div class="col-lg-3 col-sm-3 mb-5">
                    <div class="card p-0 hover-shadow">
                        <img class="card-img-top rounded-0" src="storage/website/images/{{$image->image}}" alt="course thumb" />
                        <div class="card-body">
                            <h4 class="card-title">
                                {{ $image->heading}}
                            </h4>
                            <p> {{ $image->description }} </p>
                            <form action="{{ route('main-slider.destroy',encrypt($image->id)) }}" method="post">
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
