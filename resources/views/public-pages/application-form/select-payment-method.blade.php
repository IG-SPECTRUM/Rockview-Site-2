@extends("layouts/website-layout3")
@section("title")
Choose Payment Method
@endsection
@section("content")
<!-- page title -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<section class="page-title-section overlay" data-background="images/backgrounds/back.gif">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <ul class="list-inline custom-breadcrumb">
                    <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="@@page-link">Enroll
                            With Us</a></li>
                    <li class="list-inline-item text-white h3 font-secondary @@nasted"></li>
                </ul>
                <p class="text-light text-lg">Do you have any questions? Just fill out the form below and we'll get back
                    to you as soon as possible.</p>
            </div>
        </div>
    </div>
</section>
<!-- /page title -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
<style>
.autocomplete-suggestions {
    border: 1px solid #ccc;
    max-height: 150px;
    overflow-y: auto;
    background-color: #fff;
    position: absolute;
    z-index: 1000;
    width: calc(100% - 10px);
    margin-top: 5px;
}

.autocomplete-suggestion {
    padding: 10px;
    cursor: pointer;
}

.autocomplete-suggestion:hover {
    background-color: #f0f0f0;
}
</style>


    <div class="modal fade" id="student-number-modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<h3 class="text-center text-capitalize mt-3">{{ $applicant_name }}</h3>
				<div class="modal-body">
					<h4 class="text-center">Your student number is {{ $applicant_id }}</h4>
                    <p>
                        <label>Choose payment method to complete your application.</label>
                    </p>
                    <p>
                        <center>
                            <a href="">
                                <input type="radio" value="DPO"> DPO
                            </a>
                            |
                            <a href="">
                                <input type="radio" value="Tingg"> TINGG
                            </a>
                        </center>
                    </p>
				</div>
			</div>
		</div>
    </div>
	<script src="../../assets/admin/js/jquery-3.5.1.min.js"></script>
	<script src="../../assets/admin/js/popper.min.js"></script>
	<script src="../../assets/admin/js/bootstrap.min.js"></script>
	<script>
		$("#student-number-modal").modal("show");			
	</script>
@endsection