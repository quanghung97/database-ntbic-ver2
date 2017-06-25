$(document).ready(function() {
	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
	    }
	});

	$("#re_login_captcha").click(function(){
		$.ajax({
			url: '/app/get_captcha',
			type: 'POST',
			dataType: 'JSON',
			data: {name: 'default'},
		})
		.done(function(response) {
			$('#login_captcha').attr('src', response);
		})
		.fail(function() {
			
		})
		.always(function() {
			console.log("complete");
		});
	});
});