$(document).ready(function($) {
	$(".form-container").hide();
	$(".login-container").hide();
	$(".register-container").hide();

	$(".login-button").click(function(event) {
		if ($(".login-container").is(":hidden")){
			$(".login-container").slideDown();
			$(".register-container").slideUp();
		}else{
			$(".login-container").slideUp();
		}
	});

	$(".register-button").click(function(event) {
		if ($(".register-container").is(":hidden")){
			$(".register-container").slideDown();
			$(".login-container").slideUp();
		}else{
			$(".register-container").slideUp();
		}
	});

	$("#verifyBtn").click(function(){
		$.get("../operations/verificationNumber.php", function(data) {
			$('#verifyText').val(data);
    	});
	});

	

});