@extends('layouts.staff-account-layout')
@push('css')
    
@endpush
@section('content')
  <!-- Page Header -->
  <div class="page-header">
    <div class="row">
      <div class="col-sm-12">
        <h3 class="page-title text-success">
          Welcome {{ auth()->user()->name }}!
        </h3>
        <ul class="breadcrumb">
          <li class="breadcrumb-item active">Dashboard</li>
        </ul>
      </div>
    </div>
  </div>
  <!-- /Page Header -->

<div class="row">
	<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
		<div class="card dash-widget">
			<div class="card-body">
                <span class="dash-widget-icon" style="background:none"><i class="la la-users text-success"></i></span>
				<div class="dash-widget-info">
					<h3></h3>
					<span>Applicants</span>
				</div>
				<a href="" class="stretched-link"></a>
			</div>
		</div>
	</div>
		
   <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
		<div class="card dash-widget">
			<div class="card-body">
                <span class="dash-widget-icon" style="background:none"><i class="la la-home text-success"></i></span>
				<div class="dash-widget-info">
					<h3></h3>
					<span>Schools</span>
				</div>
				<a href="" class="stretched-link"></a>
			</div>
		</div>
	</div>

			
    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
		<div class="card dash-widget">
			<div class="card-body">
                <span class="dash-widget-icon" style="background:none"><i class="la la-book text-success"></i></span>
				<div class="dash-widget-info">
					<h3></h3>
					<span>Programs</span>
				</div>
				<a href="" class="stretched-link"></a>
			</div>
		</div>
	</div>
	
     <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
		<div class="card dash-widget">
			<div class="card-body">
                <span class="dash-widget-icon" style="background:none"><i class="la la-calendar text-success"></i></span>
				<div class="dash-widget-info">
					<h3></h3>
					<span>Mode of study</span>
				</div>
				<a href="" class="stretched-link"></a>
			</div>
		</div>
	</div>

</div>
					
						
<div class="row">
	<div class="col-md-12">
		<div class="card-group m-b-30">
			<div class="card">
				<div class="card-body">
					<div class="d-flex justify-content-between mb-3">
						<div>
							<span class="d-block">Bursary</span>
							<span class="fa fa-money h3 text-success" style="margin-left:200px; margin-top:-30px"></span>
						</div>
					<div>
				</div>
			</div>
			<h3 class="mb-3" style="margin-top:-15px"></h3>
		</div>
		<a href="" class="stretched-link"></a>
	</div>
							
							
	<div class="card">
		<div class="card-body">
			<div class="d-flex justify-content-between mb-3">
				<div>
					<span class="d-block">Tuition Fee</span>
					<span class="fa fa-money h3 text-success" style="margin-left:200px; margin-top:-30px"></span>
				</div>
			<div>
		</div>
	</div>
		<h3 class="mb-3" style="margin-top:-15px"></h3>
		<a href="" class="stretched-link"></a>
	</div>
</div>
<div class="card">
		<div class="card-body">
			<div class="d-flex justify-content-between mb-3">
				<div>
					<span class="d-block">Contacts</span>
					<span class="la la-sms text-success h3" style="margin-left:200px; margin-top:-30px"></span>
				</div>
			<div>
		</div>
	</div>
		<h3 class="mb-3" style="margin-top:-15px"></h3>
		<a href="" class="stretched-link"></a>
	</div>
</div>
</div>
</div>		
</div>

@endsection
