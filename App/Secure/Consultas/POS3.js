$('document').ready(function() { 

	/* handling form validation */
	$("#login-form").validate({
		
		rules: {
		
			password: {
				required: true,
			},
			nivel: {
				required: true,
			},
			user_email: {
				required: true,
				email: true
			},
		},
		messages: {
			password:{
			  required: "<i class='fas fa-times'></i> Se requiere tu contraseña " 
			 },
			 
			user_email: "<i class='fas fa-times'></i> ingresa tu correo por favor ",
		},
		submitHandler: submitForm	
	});	   
	/* Handling login functionality */
	function submitForm() {		
		var data = $("#login-form").serialize();				
		$.ajax({				
			type : 'POST',
			url  : 'Scripts/POS3.php',
			data : data,
            beforeSend: function(){	
				$("#error").fadeOut();
				
				$("#login_button").html();
				$('#Validacion').modal('toggle');
				setTimeout(function(){ 
					$('#Validacion').modal('hide') 
				}, 3000); 
                  
			},
				
			success : function(response){						
				if(response=="1"){									
                    $("#login_button").html("Iniciando...")
					$('#Ingreso').modal('toggle');
					setTimeout(' window.location.href = "https://saluda.com.mx/App/AdminPOS/"; ',3000);
				}
				else if (response == "2"){
					$("#login_button").html("Iniciando...")
					$('#Ingreso').modal('toggle');
					setTimeout(' window.location.href = "https://saluda.com.mx/App/AdminPOS/"; ',3000);
				  } else {									
					$("#error").fadeIn(1000, function(){						
                        $("#error").html();
                        setTimeout(function(){ 
                            $('#Fallo').modal('toggle');
                        }, 2000); 
						
                        $("#login_button").html('<span ></span> &nbsp;   Ingresar   ');
					});
						 
				}
			}
		});
		return false;
	}   
});