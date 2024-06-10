<div class="header" style="background:#006400">
    <a id="toggle_btn" href="javascript:void(0);">
        <span class="bar-icon">
            <span></span>
            <span></span>
            <span></span>
        </span>
    </a>

    <!-- Header Title -->
    <div class="page-title-box">
        <a href="" class="nav-link">
            <h3> <span class="text-warning">ROCKVIEW</h3>
        </a>
    </div>
    <a id="mobile_btn" class="mobile_btn" href="#sidebar"><i class="fa fa-bars"></i></a>
<!--     
		<ul class="nav user-menu">
			<li class="nav-item dropdown">
				<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
					<i class="fa fa-bell-o"></i> <span class="badge badge-pill">3</span>
				</a>
				<div class="dropdown-menu notifications">
					<div class="topnav-dropdown-header">
						<span class="notification-title">Notifications</span>
						<a href="javascript:void(0)" class="clear-noti"> Clear All </a>
					</div>
					<div class="noti-content">
						<ul class="notification-list">
							<li class="notification-message">
								<a href="activities.html">
									<div class="media">
										<span class="avatar">
											<img alt="" src="assets/img/profiles/avatar-02.jpg">
										</span>
										<div class="media-body">
											<p class="noti-details"><span class="noti-title">John Doe</span> added new task <span class="noti-title">Patient appointment booking</span></p>
											<p class="noti-time"><span class="notification-time">4 mins ago</span></p>
										</div>
									</div>
								</a>
							</li>
						</ul>
					</div>
					<div class="topnav-dropdown-footer">
						<a href="activities.html">View all Notifications</a>
					</div>
				</div>
			</li>
			
			<li class="nav-item dropdown">
				<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
					<i class="fa fa-comment-o"></i> <span class="badge badge-pill">8</span>
				</a>
				<div class="dropdown-menu notifications">
					<div class="topnav-dropdown-header">
						<span class="notification-title">Messages</span>
						<a href="javascript:void(0)" class="clear-noti"> Clear All </a>
					</div>
					<div class="noti-content">
						<ul class="notification-list">
							<li class="notification-message">
								<a href="chat.html">
									<div class="list-item">
										<div class="list-left">
											<span class="avatar">
												<img alt="" src="assets/img/profiles/avatar-09.jpg">
											</span>
										</div>
										<div class="list-body">
											<span class="message-author">Richard Katoka </span>
											<span class="message-time">12:28 AM</span>
											<div class="clearfix"></div>
											<span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
										</div>
									</div>
								</a>
							</li>
						</ul>
					</div>
					<div class="topnav-dropdown-footer">
						<a href="chat.html">View all Messages</a>
					</div>
				</div>
			</li> -->
	 
    <a id="mobile_btn" class="mobile_btn" href="#sidebar"><i class="fa fa-bars"></i></a>
    <!-- Header Menu -->
    <ul class="nav user-menu">
        <li class="nav-item dropdown has-arrow main-drop">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                <span class="user-img">
                    <img src="../storage/staff-images/{{ auth()->user()->image }}" style="width:40px; height:40px; border-radius:50px; margin-left:-20px">
                    <span class="status online"></span>
                </span>
                <span> {{ auth()->user()->name }} </span>
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="">Change password</a>
                <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
            </div>
        </li>
    </ul>
    <!-- /Header Menu -->

    <!-- Mobile Menu -->
    <div class="dropdown mobile-user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <img src="../storage/staff-images/{{ auth()->user()->image }}" style="width:40px; height:40px; border-radius:50px; margin-left:-20px">
        </a>
        <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="">Change password</a>
          <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
        </div>
    </div>
    <!-- /Mobile Menu -->
</div>
<!-- /Header -->

<!-- Sidebar -->

<?php 

$can_view_admin = \App\models\UserAccessControl::where('module','admin')->where('access','read')->where('user_id',auth()->id())
->get()->first();
$can_add_admin = \App\models\UserAccessControl::where('module','admin')->where('access','create')->where('user_id',auth()->id())
->get()->first();
$can_edit_admin = \App\models\UserAccessControl::where('module','admin')->where('access','edit')->where('user_id',auth()->id())
->get()->first();
$can_delete_admin = \App\models\UserAccessControl::where('module','admin')->where('access','delete')->where('user_id',auth()->id())
->get()->first();

$can_view_programs = \App\models\UserAccessControl::where('module','programs')->where('access','read')->where('user_id',auth()->id())
->get()->first();
$can_add_programs = \App\models\UserAccessControl::where('module','programs')->where('access','create')->where('user_id',auth()->id())
->get()->first();
$can_edit_programs = \App\models\UserAccessControl::where('module','programs')->where('access','edit')->where('user_id',auth()->id())
->get()->first();
$can_delete_programs = \App\models\UserAccessControl::where('module','programs')->where('access','delete')->where('user_id',auth()->id())
->get()->first();

$can_view_news = \App\models\UserAccessControl::where('module','news')->where('access','read')->where('user_id',auth()->id())
->get()->first();
$can_add_news = \App\models\UserAccessControl::where('module','news')->where('access','create')->where('user_id',auth()->id())
->get()->first();
$can_edit_news = \App\models\UserAccessControl::where('module','news')->where('access','edit')->where('user_id',auth()->id())
->get()->first();
$can_delete_news = \App\models\UserAccessControl::where('module','news')->where('access','delete')->where('user_id',auth()->id())
->get()->first();

$can_view_schools = \App\models\UserAccessControl::where('module','schools')->where('access','read')->where('user_id',auth()->id())
->get()->first();
$can_add_schools = \App\models\UserAccessControl::where('module','schools')->where('access','create')->where('user_id',auth()->id())
->get()->first();
$can_edit_schools = \App\models\UserAccessControl::where('module','schools')->where('access','edit')->where('user_id',auth()->id())
->get()->first();
$can_delete_schools = \App\models\UserAccessControl::where('module','schools')->where('access','delete')->where('user_id',auth()->id())
->get()->first();

$can_view_applicants = \App\models\UserAccessControl::where('module','applicants')->where('access','read')->where('user_id',auth()->id())
->get()->first();
$can_manage_pending_applicants = \App\models\UserAccessControl::where('module','applicants')->where('access','pending')->where('user_id',auth()->id())
->get()->first();
$can_admit_applicant = \App\models\UserAccessControl::where('module','applicants')->where('access','admit')->where('user_id',auth()->id())
->get()->first();
?>
<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul class="mt-3">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link text-success">
                        <i class="la la-home"></i><span>Home</span>
                    </a>
                </li>

				<li class="nav-item">
                    <a href="{{ route('website-main-page-couses.index') }}" class="nav-link text-success">
                        <i class="la la-home"></i><span>Home Page Couses</span>
                    </a>
                </li>
				@if($can_view_admin || auth()->user()->user_type == "super admin")
					<li class="nav-item">
						<a href="{{ route('admins.index') }}" class="nav-link text-success">
							<i class="la la-users"></i><span>Admins</span>
						</a>
					</li>
				@endif
				@if($can_view_applicants || auth()->user()->user_type == "super admin")
					<li class="nav-item">
						<a href="" class="nav-link text-success">
							<i class="la la-users"></i><span>Applicants
							<i class="fa fa-bell-o ml-5"></i> 
								<span style="position:relative">
									<span style="position:absolute; top:-20px; left:-25px" class="badge bg-danger text-white badge-pill">3</span>
								</span>
							</span>
						</a>
					</li>
				@endif
				<li class="nav-item">
                    <a href="{{ route('main-slider.index') }}" class="nav-link text-success">
                        <i class="la la-home"></i><span>Main Slider</span>
                    </a>
                </li>
				@if($can_view_schools || auth()->user()->user_type == "super admin")
					<li class="nav-item">
						<a href="{{ route('schools.index') }}" class="nav-link text-success">
							<i class="la la-book"></i><span>Schools</span>
						</a>
					</li>
				@endif
				@if($can_view_programs || auth()->user()->user_type == "super admin")
					<li class="nav-item">
						<a href="{{ route('manage-programs.index') }}" class="nav-link text-success">
							<i class="la la-book"></i><span>Programs</span>
						</a>
					</li>
				@endif
				<li class="nav-item">
					<a href="{{ route('provinces.index') }}" class="nav-link text-success">
						<i class="la la-home"></i><span>Provinces</span>
					</a>
				</li>

				<li class="nav-item">
					<a href="{{ route('applicants-message.index') }}" class="nav-link text-success">
						<i class="la la-sms"></i><span>Applicants Messages</span>
						<?php 
							$total_messages = \App\Models\global_models\Contact::get()->count();
							$total_read_messages = \App\Models\ApplicantMessageStatus::where("user_id",auth()->id())
							->get()->count();

							$total_unread_messages = str_replace("-", "", $total_messages-$total_read_messages);
						?>
						@if($total_unread_messages > 0)
							<i class="fa fa-comment-o ml-1"></i> 	
							<span style="position:relative">
								<span style="position:absolute; top:-18px; left:-24px" 
								class="badge bg-danger text-white badge-pill">{{$total_unread_messages}}</span>
							</span>
						@endif
					</a>
				</li>
				@if($can_view_news || auth()->user()->user_type == "super admin")
					<li class="nav-item">
						<a href="{{ route('news.index') }}" class="nav-link text-success">
							<i class="la la-sms"></i><span>News</span>
						</a>
					</li>
				@endif
            </ul>
        </div>
    </div>
</div>
<!-- /Sidebar -->