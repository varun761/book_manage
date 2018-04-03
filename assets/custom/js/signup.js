$( function() 
	{ 
		var currentYear = (new Date).getFullYear(); 
		$( ".dob" ).datepicker({ 
					dateFormat:"dd-mm-yy", 
					changeYear:true, 
					changeMonth:true, 
					yearRange: "1920:"+currentYear, 
					}); 
		$.validator.setDefaults({ debug: true, success: "valid" }); 
		//signup form validation
		$( "#signup-here" ).validate({ 
								rules: { 
										firstname: { 
													required: true 
													}, 
										newemail:{ 
													required:true, 
													email:true 
												}, 
										newpass:{ 
												required:true, 
												minlength:8, 
												maxlength:25 
												}, 
										newdob:{ 
												required:true 
												}, 
										gender:{ 
												required:true, 
												},
										iagree:{ 
												required:true
												} 
										} 
									});
		//login form validation
		
	} ); 