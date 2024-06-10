<!DOCTYPE html>
<html lang="zxx">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>@yield('title')</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../../assets/admin/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="../../assets/admin/css/font-awesome.min.css">
		
		<!-- Lineawesome CSS -->
        <link rel="stylesheet" href="../../assets/admin/css/line-awesome.min.css">
		
		<!-- Select2 CSS -->
		<link rel="stylesheet" href="../../assets/admin/css/select2.min.css">
		
		<!-- Datetimepicker CSS -->
		<link rel="stylesheet" href="../../assets/admin/css/bootstrap-datetimepicker.min.css">
		
		<!-- Tagsinput CSS -->
		<link rel="stylesheet" href="../../assets/admin/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="../../assets/admin/css/style.css">
        @stack('css')
    </head>
    <body class="hold-transition sidebar-mini layout-fixed">
         <div class="main-wrapper">
            @include('includes.admin-navbar3')
           	<!-- Page Wrapper -->
            <div class="page-wrapper">
				<!-- Page Content -->
                <div class="content container-fluid">
                    @yield('content')
					@if(auth()->user()->status == "blocked")
						<div class="modal fade" id="account-deaction-modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<h3 class="text-center text-capitalize mt-3">Account De-activated</h3>
									<div class="modal-body">
										<h4 class="text-center">Your account has been blocked. You will soon be signed out.
											<div class="d-flex justify-content-center align-items-center">
												<h1 class="text-danger">
													<label class="timer">10</label>
													<small>seconds</small>
												</h1>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<script src="assets/admin/js/jquery-3.5.1.min.js"></script>
						<script src="assets/admin/js/popper.min.js"></script>
						<script src="assets/admin/js/bootstrap.min.js"></script>
						<script>
							$("#account-deaction-modal").modal("show");
							let seconds = 10;
							let interval_id = setInterval(() => {
								$(".timer").text(seconds);
								if(seconds == 0){
									clearInterval(interval_id);
									window.location = "{{ route('logout') }}";
								}
								seconds--;
							}, 1000);
						</script>
					@endif
                </div>
            </div>
        </div>
        

      

        	<!-- jQuery -->
        <script src="../../assets/admin/js/jquery-3.5.1.min.js"></script>

		<!-- Bootstrap Core JS -->
        <script src="../../assets/admin/js/popper.min.js"></script>
        <script src="../../assets/admin/js/bootstrap.min.js"></script>

		<!-- Slimscroll JS -->
		<script src="../../assets/admin/js/jquery.slimscroll.min.js"></script>
		
		<!-- Select2 JS -->
		<script src="../../assets/admin/js/select2.min.js"></script>
		
		<!-- Datetimepicker JS -->
		<script src="../../assets/admin/js/moment.min.js"></script>
		<script src="../../assets/admin/js/bootstrap-datetimepicker.min.js"></script>
		
		<!-- Tagsinput JS -->
		<script src="../../assets/admin/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>

		<!-- Custom JS -->
		<script src="../../assets/admin/js/app.js"></script>

        @stack('js')
</body>
</html>