@extends('layouts.staff-account-layout2')
@push('css')
    
@endpush
@section('content')
<div class="page-header">
        <div class="row">
            <div class="col-sm-12 mt-3">
                <a href="{{ route('admins.index') }}" class="btn text-white float-right" style="background:#006400; margin-top:-25px; border-radius:20px">
                    <i class="fa fa-reply"></i> Back
                </a>
            </div>
        </div>
    </div>
    <!-- /Page Header -->

      
    @if(@session('success'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <span> You have successfully de-activated this account. </span>
        </div>
    @endif

    @if(@session('error')) 
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <span> Unknown error occured. Try again. </span>
        </div>
    @endif

    @if($admin)
        <div class="container-fluid p-0">
            <div class="card-body">
                <h3> {{ $admin->name }}</h3>
                <div class="row">
                    <div class="col-lg-4 align-self-center">
                        <img src="../storage/staff-images/{{ $admin->image }}" height="200">
                    </div>
                                    
                    <div class="col-lg-5">
                        <div class="single-pro-detail">
                            <table class="table table-striped">
                                <tr>
                                    <td>Staff ID</td>
                                    <td>{{ $admin->staff_id }}</td>
                                </tr>  
                                <tr>
                                    <td>Staff Password</td>
                                    <td>{{ $admin->user_password->password }}</td>
                                </tr>    
                                <tr>
                                    <td>Email</td>
                                    <td>{{ $admin->email }}</td>
                                </tr> 
                                <tr>
                                    <td>Account Status</td>
                                    <td class="text-success">{{ $admin->status }}</td>
                                </tr> 
                                <tr>
                                    <td>
                                        <a href="{{ route('admins.edit',encrypt($admin->id)) }}" class="btn text-white"
                                         style="background:#006400; border-radius:20px"> Edit Details </a>
                                    </td>
                                    @if($admin->status == "active")
                                        <form action="{{ route('block-admin-account',encrypt($admin->id)) }}" method="post">
                                            @csrf
                                            <td>
                                                <input type="submit" class="btn btn-danger" style="border-radius:20px" value="De-activate"> 
                                            </td>
                                        </form>
                                    @elseif($admin->status == "blocked")
                                        <form action="{{ route('unblock-admin-account',encrypt($admin->id)) }}" method="post">
                                            @csrf
                                            <td>
                                                <input type="submit" class="btn btn-warning" style="border-radius:20px" value="Activate"> 
                                            </td>
                                        </form>
                                    @endif
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <?php 

                $can_view_admin = \App\models\UserAccessControl::where('module','admin')->where('access','read')->where('user_id',$admin->id)
                ->get()->first();
                $can_add_admin = \App\models\UserAccessControl::where('module','admin')->where('access','create')->where('user_id',$admin->id)
                ->get()->first();
                $can_edit_admin = \App\models\UserAccessControl::where('module','admin')->where('access','edit')->where('user_id',$admin->id)
                ->get()->first();
                $can_delete_admin = \App\models\UserAccessControl::where('module','admin')->where('access','delete')->where('user_id',$admin->id)
                ->get()->first();

                $can_view_programs = \App\models\UserAccessControl::where('module','programs')->where('access','read')->where('user_id',$admin->id)
                ->get()->first();
                $can_add_programs = \App\models\UserAccessControl::where('module','programs')->where('access','create')->where('user_id',$admin->id)
                ->get()->first();
                $can_edit_programs = \App\models\UserAccessControl::where('module','programs')->where('access','edit')->where('user_id',$admin->id)
                ->get()->first();
                $can_delete_programs = \App\models\UserAccessControl::where('module','programs')->where('access','delete')->where('user_id',$admin->id)
                ->get()->first();

                $can_view_news = \App\models\UserAccessControl::where('module','news')->where('access','read')->where('user_id',$admin->id)
                ->get()->first();
                $can_add_news = \App\models\UserAccessControl::where('module','news')->where('access','create')->where('user_id',$admin->id)
                ->get()->first();
                $can_edit_news = \App\models\UserAccessControl::where('module','news')->where('access','edit')->where('user_id',$admin->id)
                ->get()->first();
                $can_delete_news = \App\models\UserAccessControl::where('module','news')->where('access','delete')->where('user_id',$admin->id)
                ->get()->first();

                $can_view_schools = \App\models\UserAccessControl::where('module','schools')->where('access','read')->where('user_id',$admin->id)
                ->get()->first();
                $can_add_schools = \App\models\UserAccessControl::where('module','schools')->where('access','create')->where('user_id',$admin->id)
                ->get()->first();
                $can_edit_schools = \App\models\UserAccessControl::where('module','schools')->where('access','edit')->where('user_id',$admin->id)
                ->get()->first();
                $can_delete_schools = \App\models\UserAccessControl::where('module','schools')->where('access','delete')->where('user_id',$admin->id)
                ->get()->first();

                $can_view_applicants = \App\models\UserAccessControl::where('module','applicants')->where('access','read')->where('user_id',$admin->id)
                ->get()->first();
                $can_manage_pending_applicants = \App\models\UserAccessControl::where('module','applicants')->where('access','pending')->where('user_id',$admin->id)
                ->get()->first();
                $can_admit_applicant = \App\models\UserAccessControl::where('module','applicants')->where('access','admit')->where('user_id',$admin->id)
                ->get()->first();
            ?>
           
            <input type="hidden" class="form-control user" value="{{ $admin->id }}">
		    <div class="table-responsive permissions-table">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Module Permission</th>
							<th class="text-center">View</th>
							<th class="text-center">Add</th>
                            <th class="text-center">Edit</th>
							<th class="text-center">Delete</th>
						</tr>
					</thead>
					<tbody>
                        <tr>
							<td>Admins</td>
							<td class="text-center">
                                @if($can_view_admin)
								    <input type="checkbox" class="deny-access" value="admin,read" checked>
                                @else
                                    <input type="checkbox" class="grant-access" value="admin,read">
                                @endif
							</td>
                            <td class="text-center">
								@if($can_add_admin)
								    <input type="checkbox" class="deny-access" value="admin,create" checked>
                                @else
                                    <input type="checkbox" class="grant-access" value="admin,create">
                                @endif
							</td>
                            <td class="text-center">
								@if($can_edit_admin)
								    <input type="checkbox" class="deny-access" value="admin,edit" checked>
                                @else
                                    <input type="checkbox" class="grant-access" value="admin,edit">
                                @endif
							</td>
                            <td class="text-center">
								@if($can_delete_admin)
								    <input type="checkbox" class="deny-access" value="admin,delete" checked>
                                @else
                                    <input type="checkbox" class="grant-access" value="admin,delete">
                                @endif
							</td>
                        </tr>
                        <tr>
							<td>Programs</td>
							<td class="text-center">
                                @if($can_view_programs)
								    <input type="checkbox" class="deny-access" value="programs,read" checked>
                                @else
                                    <input type="checkbox" class="grant-access" value="programs,read">
                                @endif
							</td>
                            <td class="text-center">
								@if($can_add_programs)
								    <input type="checkbox" class="deny-access" value="programs,create" checked>
                                @else
                                    <input type="checkbox" class="grant-access" value="programs,create">
                                @endif
							</td>
                            <td class="text-center">
								@if($can_edit_programs)
								    <input type="checkbox" class="deny-access" value="programs,edit" checked>
                                @else
                                    <input type="checkbox" class="grant-access" value="programs,edit">
                                @endif
							</td>
                            <td class="text-center">
								@if($can_delete_programs)
								    <input type="checkbox" class="deny-access" value="programs,delete" checked>
                                @else
                                    <input type="checkbox" class="grant-access" value="programs,delete">
                                @endif
							</td>
                        </tr>

                        <tr>
							<td>News</td>
							<td class="text-center">
                                @if($can_view_news)
								    <input type="checkbox" class="deny-access" value="news,read" checked>
                                @else
                                    <input type="checkbox" class="grant-access" value="news,read">
                                @endif
							</td>
                            <td class="text-center">
								@if($can_add_news)
								    <input type="checkbox" class="deny-access" value="news,create" checked>
                                @else
                                    <input type="checkbox" class="grant-access" value="news,create">
                                @endif
							</td>
                            <td class="text-center">
								@if($can_edit_news)
								    <input type="checkbox" class="deny-access" value="admin,edit" checked>
                                @else
                                    <input type="checkbox" class="grant-access" value="news,edit">
                                @endif
							</td>
                            <td class="text-center">
								@if($can_delete_news)
								    <input type="checkbox" class="deny-access" value="news,delete" checked>
                                @else
                                    <input type="checkbox" class="grant-access" value="news,delete">
                                @endif
							</td>
                        </tr>
                        <tr>
							<td>Schools</td>
							<td class="text-center">
                                @if($can_view_schools)
								    <input type="checkbox" class="deny-access" value="schools,read" checked>
                                @else
                                    <input type="checkbox" class="grant-access" value="schools,read">
                                @endif
							</td>
                            <td class="text-center">
								@if($can_add_schools)
								    <input type="checkbox" class="deny-access" value="schools,create" checked>
                                @else
                                    <input type="checkbox" class="grant-access" value="schools,create">
                                @endif
							</td>
                            <td class="text-center">
								@if($can_edit_schools)
								    <input type="checkbox" class="deny-access" value="schools,edit" checked>
                                @else
                                    <input type="checkbox" class="grant-access" value="schools,edit">
                                @endif
							</td>
                            <td class="text-center">
								@if($can_delete_schools)
								    <input type="checkbox" class="deny-access" value="schools,delete" checked>
                                @else
                                    <input type="checkbox" class="grant-access" value="schools,delete">
                                @endif
							</td>
                        </tr>
                    </tbody>

                    <thead>
						<tr>
							<th>Module Permission</th>
							<th class="text-center">View</th>
							<th class="text-center">Pending</th>
                            <th class="text-center" colspan="2">Admit</th>
						</tr>
					</thead>
                    <tbody>
                        <tr>
							<td>Applicants</td>
							<td class="text-center">
                                @if($can_view_applicants)
								    <input type="checkbox" class="deny-access" value="applicants,read" checked>
                                @else
                                    <input type="checkbox" class="grant-access" value="applicants,read">
                                @endif
							</td>
                            <td class="text-center">
								@if($can_manage_pending_applicants)
								    <input type="checkbox" class="deny-access" value="applicants,pending" checked>
                                @else
                                    <input type="checkbox" class="grant-access" value="applicants,pending">
                                @endif
							</td>
                            <td class="text-center" colspan="2">
								@if($can_admit_applicant)
								    <input type="checkbox" class="deny-access" value="applicants,admit" checked>
                                @else
                                    <input type="checkbox" class="grant-access" value="applicants,admit">
                                @endif
							</td>
                        </tr>
                       
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <h3 class="text-danger">This information no longer exist</h3>
    @endif
@endsection

@push('js')
	<script>
        //grant access
        $(document).on('change','.grant-access',function(){
            let user = $(".user").val();
            let access = $(this).val();
            $.ajax({
                url:"{{route('grant-access')}}",
                method:"GET",
                data:{
                    _token:"{{csrf_token()}}",
                    user:user,
                    access:access,
                },success:function(response){
                    if(response.status == 400){
                        $('.error-messages').html("");
                        $("#permission_error_modal").modal("show");
                        $('.error-messages').append(response.error);
                    }
                }
            });
        });

        //deny access
        $(document).on('change','.deny-access',function(){
            let user = $(".user").val();
            let access = $(this).val();
            $.ajax({
                url:"{{route('deny-access')}}",
                method:"GET",
                data:{
                    _token:"{{csrf_token()}}",
                    user:user,
                    access:access,
                },success:function(response){
                    if(response.status == 400){
                        $('.error-messages').html("");
                        $("#permission_error_modal").modal("show");
                        $('.error-messages').append(response.error);
                    }
                }
            });
        });

        setInterval(() => {
            $(".permissions-table").load(' .permissions-table');
        }, 3000);        
	</script>
@endpush