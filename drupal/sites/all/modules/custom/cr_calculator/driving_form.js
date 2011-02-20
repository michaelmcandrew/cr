

//When you load the page, hide the form elements

$(document).ready(function(){

	if( $("#edit-fuel").val() == 'petrol') {
		$("#edit-diesel-size-wrapper").hide();
	}
	if( $("#edit-fuel").val() == 'diesel') {
		$("#edit-petrol-size-wrapper").hide();
	}
	if( $("#edit-fuel").val() == 'hybrid' ||  $("#edit-fuel").val() == '') {
		$("#edit-petrol-size-wrapper").hide();
		$("#edit-diesel-size-wrapper").hide();
	}

	$("#edit-fuel").change(function(){
		if( $("#edit-fuel").val() == 'petrol') {
			if( $("#edit-diesel-size-wrapper").is(':visible') ) {
				$("#edit-diesel-size-wrapper").hide();
			}
			if( $("#edit-petrol-size-wrapper").is(':hidden') ) {
				$("#edit-petrol-size-wrapper").show();
			}
		}
		if( $("#edit-fuel").val() == 'diesel') {
			if( $("#edit-petrol-size-wrapper").is(':visible') ) {
				$("#edit-petrol-size-wrapper").hide();
			}
			if( $("#edit-diesel-size-wrapper").is(':hidden') ) {
				$("#edit-diesel-size-wrapper").show();
			}
		}
		if( $("#edit-fuel").val() == 'hybrid' ||  $("#edit-fuel").val() == '') {
			if( $("#edit-petrol-size-wrapper").is(':visible') ) {
				$("#edit-petrol-size-wrapper").hide();
			}
			if( $("#edit-diesel-size-wrapper").is(':visible') ) {
				$("#edit-diesel-size-wrapper").hide();
			}
		}
	})
});

//When you select petrol, show petrol and hide diesel
//Todo, add if statements to check if the element is already if the state that you want to change it to
/*
$(document).ready(function(){
	$("#edit-petrol-size-wrapper").slideDown();	
	$("#edit-diesel-size-wrapper").slideUp();	
});

//When you select petrol, show diesel and hide petrol
//Todo, add if statements to check if the element is already if the state that you want to change it to

$(document).ready(function(){
	$("#edit-petrol-size-wrapper").slideUp();	
	$("#edit-diesel-size-wrapper").slideDown();	
});

*/