$(document).ready(function(){
	
	
	//eventos de validacion del boton enviar
	$("#btnAceptar").click(function(){
					
	var usuario_vacio=0;
	var categoria_vacia=0;
	var pass_vacia=0;
	var pass2_vacia=0;
	var nombre_vacio=0;
	var apellido_vacio;
	var cedula_vacia;
	
	var imagen_vacia=0;
	
	  
	   	var usuario = $("#txtUsuario").val();
		if(usuario =="" || usuario== null ){
			
			$("#ErrorUsuario").show();
			usuario_vacio = 1;			
		}
		else if(usuario !="" || usuario !=NULL ){
			$("#ErrorUsuario").hide();
			usuario_vacio = 0;
				
		}
		
		
	   	var categoria = $("#DDlTipo").val();
		if(usuario =="" || usuario== null ){
			
			$("#ErrorCategoria").show();
			categoria_vacia = 1;			
		}
		else if(categoria !="" || usuario !=NULL ){
			$("#ErrorCategoria").hide();
			categoria_vacia = 0;
				
		}
		
	   	
	   	var pass1 = $("#txtpassword").val();
		if(pass1 =="" || pass1== null ){
			
			$("#ErrorPass").show();
			pass_vacia = 1;			
		}
		else if(pass1 !="" || pass1 !=NULL ){
			$("#ErrorPass").hide();
			pass_vacia = 0
		
		}
		
	   	var pass2 = $("#txtPassword2").val();
		if(pass2 =="" || pass2== null ){
			
			$("#ErrorPass2").show();
			pass2_vacia = 1;			
		}
		else if(pass2 !="" || pass2 !=NULL ){
			$("#ErrorPass2").hide();
			pass2_vacia = 0;
		
		}
		
	   	
	   	var nombre = $("#txtNombre").val();
		if(nombre =="" || nombre== null ){
			
			$("#ErrorNombre").show();
			nombre_vacio = 1;			
		}
		else if(nombre !="" || nombre !=NULL ){
			$("#ErrorNombre").hide();
			nombre_vacio = 0;
		
		}	
		
	   	var apellido = $("#txtApellido").val();
		if(apellido =="" || apellido== null ){
			
			$("#ErrorApellido").show();
			apellido_vacio = 1;			
		}
		else if(apellido !="" || apellido !=NULL ){
			$("#ErrorApellido").hide();
			apellido_vacio = 0;
		
		}
		
	   	var cedula = $("#txtCedula").val();
		if(cedula =="" || cedula== null ){
			
			$("#ErrorCedula").show();
			cedula_vacia = 1;			
		}
		else if(cedula !="" || cedula !=NULL ){
			$("#ErrorCedula").hide();
			cedula_vacia = 0;
		
		}
		
		
							

		
		if(usuario_vacio==1 || categoria_vacia==1 || pass_vacia==1 || pass2_vacia==1 || nombre_vacio==1 || apellido_vacio==1 || cedula_vacia==1){
			
			return false;
			
			
		}else{
			return true;
		}

		
		
		
		
		
	});

	
	
	
	//eventos click de los text---------------------------------------------------
	$("#txtUsuario").click(function(){
		$("#ErrorUsuario").hide();
		
	});
	
	$("#DDlTipo").click(function(){
		$("#ErrorCategoria").hide();
		
	});
	
	$("#txtpassword").click(function(){
		$("#ErrorPass").hide();
		
	});
	
	$("#txtPassword2").click(function(){
		$("#ErrorPass2").hide();
		
	});
	
	
	$("#txtApellido").click(function(){
		$("#ErrorApellido").hide();
		
	});
	
	$("#txtCedula").click(function(){
		$("#ErrorCedula").hide();
		
	});
	
	
	
		//eventos keyup de los text-------------------------------------------
	
});
