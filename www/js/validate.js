jQuery(document).ready(function($) {
"use strict";
	//Contact
	$('#form_clie').submit(function(){
		var str = $(this).serialize();		
			$.ajax({
			type: "POST",
			url: "./processa/proc_cad_clientes.php",
			data: str,
			success: function(msg){
				$("#sendmessage").addClass("show");
				$("#errormessage").ajaxComplete(function(event, request, settings){
					if(msg == 'OK'){
						$("#sendmessage").addClass("show");				
					} else {
						$("#sendmessage").removeClass("show");
						result = msg;
					}
					$(this).html(result);
				});
			}
		});			
		return false;
	});
});