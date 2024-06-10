@extends('layouts.staff-account-layout')
@push('css')
    
@endpush

@section('content')
<div class="card">
    <div class="card-body">
        @if($all_admins->count())
            <h4>
                Total Admins<label class="badge text-white ml-2" style="background:#006400"> {{ $total_admins }} </label>
                <div class="float-right">
                   <a href="{{ route('admins.create') }}" class="btn btn-sm text-white" style="background:#006400"> 
                        <label class="fa fa-plus"></label> Add Admin
                    </a>
                </div>
            </h4>
        </div>
        <?php 
            $can_view_admin = \App\models\UserAccessControl::where('module','admin')->where('access','read')->where('user_id',auth()->id())
            ->get()->first();
        ?>

            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Account Status</th>
                        @if($can_view_admin || auth()->user()->user_type == "super admin")
                            <th>Action</th>
                        @endif
                    </tr>
                    
                   
                    <?php
                        $greet_me;
                    ?>
                    @foreach($all_admins as $admin)
                        <tr>
                            <td>
                                <img src="storage/staff-images/{{ $admin->image }}" style="height:50px">
                            </td>
                            <td> {{ $admin->name }} </td>
                            <td> 
                                @if($admin->status == "active")
                                    <label class="badge bg-success"> {{ $admin->status }}</label>
                                @else
                                    <label class="badge bg-danger"> {{ $admin->status }}</label>
                                @endif
                            </td>
                            @if($can_view_admin || auth()->user()->user_type == "super admin")
                                <td> 
                                    <a href="{{ route('admins.show',encrypt($admin->id)) }}" class="text-btn-sm btn btn-sm text-white"
                                    style="background:#006400"> More </a>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </table>
            </div>
        @else
            <h3 class="text-danger text-center">You currently do not have admins</h3>
        @endif
        <div class="float-right">
            {{ $all_admins->links() }}
        </div>
   </div>

@endsection
