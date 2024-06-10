$(function () {
	$.ajaxSetup({
		headers: {
			"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
		},
	});
	$(document).on("click", ".toggle-password", function (e) {
		e.preventDefault();
		var passwordElementId = $(this).attr("aria-controls");
		if ($(passwordElementId).attr("type") === "password") {
			$(passwordElementId).attr("type", "text");
		} else {
			$(passwordElementId).attr("type", "password");
		}
	});

	var timer = 60;
	var interval = setInterval(function () {
		var seconds = parseInt(timer);
		--seconds;
		if (seconds < 0) {
			clearInterval(interval);
			$("#resend_timer")
				.removeClass("txt-danger")
				.addClass("txt-success");
			$("#resend_timer").html("Now");
			$("#resend_verify_email_btn").removeAttr("disabled");
			$("#resend_forgot_password_btn").removeAttr("disabled");
		} else {
			seconds = seconds < 10 ? "0" + seconds : seconds;
			$("#resend_timer").html("in 0:" + seconds + " sec");
			timer = seconds;
			$("#resend_verify_email_btn").attr("disabled", true);
			$("#resend_forgot_password_btn").attr("disabled", true);
		}
	}, 1000);

	$(document).on("click", "#resend_forgot_password_btn", function () {
		var email = $(this).data("email");
		if (typeof email != "undefined" && email !== "") {
			$.ajax({
				url: "/resend-forgot-password",
				type: "post",
				data: { email: email },
				beforeSend: function () {
					$("#resend_forgot_password_btn").attr("disabled", true);
				},
				success: function (res) {
					if (res["status"] === "Success") {
						$("#response_message").removeClass("txt-danger");
						$("#response_message").addClass("txt-success");
						$("#response_message").html(res["message"]);
					} else {
						$("#response_message").removeClass("txt-success");
						$("#response_message").addClass("txt-danger");
						$("#response_message").html(res["message"]);
					}
				},
				error: function () {
					$("#response_message").removeClass("txt-success");
					$("#response_message").addClass("txt-danger");
					$("#response_message").html(
						"Something went wrong! Please try reload page."
					);
				},
			});
		} else {
			$("#response_message").removeClass("txt-success");
			$("#response_message").addClass("txt-danger");
			$("#response_message").html(
				"Failed to resend email! Please try reload page."
			);
		}
	});
});
