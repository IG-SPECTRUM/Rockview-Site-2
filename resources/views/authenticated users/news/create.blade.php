@extends('layouts.staff-account-layout2')
@push('css')
    
@endpush
@section('content')
 <!-- Page Header -->
 <div class="page-header">
        <div class="row">
        <div class="col-sm-12">
            <h3 class="page-title">
                New Update
                <a href="{{ route('news.index') }}" class="btn add-btn border-0" style="background:#006400">
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
            <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if(@session('success'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <span> Successfully posted. </span>
                    </div>
                @endif

                @if(@session('error')) 
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <span> Unknown error occured. Try again. </span>
                    </div>
                @endif

                @if(@session('image-extension-error')) 
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <span> Wrong image extension </span>
                    </div>
                @endif
    
                <div class="form-group">
                    <label>Title <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                    @error("title")
                        <label class="text-danger"> {{ $message }} </label>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Date <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" name="date" value="{{ old('date') }}">
                    @error("date")
                        <label class="text-danger"> {{ $message }} </label>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Image <span class="text-danger">*</span></label>
                    <input type="file" class="form-control" name="image">
                    @error("image")
                        <label class="text-danger"> {{ $message }} </label>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Content <span class="text-danger">*</span></label>
                    <textarea class="form-control" name="content">{{ old('content') }}</textarea>
                    @error("content")
                        <label class="text-danger"> {{ $message }} </label>
                    @enderror
                </div>
				<div class="submit-section">
					<button class="btn text-white submit-btn border-0" style="background:#006400; height:45px">SUBMIT</button>
				</div>
			</form>
        </div>
    </div>
@endsection
