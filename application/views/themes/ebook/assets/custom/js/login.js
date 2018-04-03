	function showpass(){
		var password_field=document.getElementById('password');
		if(password_field.getAttribute('type')=='password'){
			password_field.setAttribute("type", "text");
		}else{
			password_field.setAttribute("type", "password");
		}
	}
	
	function validateLogin(){
		user_name=document.getElementById('username').value;
		user_pass=document.getElementById('password').value;
		alert(user_name);
	}