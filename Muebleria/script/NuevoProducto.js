$(document).ready(function(){
	//alert('holllllllllllllllll');
	
	
	
		/*function muestraexito(){
			alert('hola mundo desde el mismo java script');
			$("#OperacionExitosa").show();
					
		}*/
		

	debugger;
	//validacion del button guardar
	$("#btnGuardar").click(function(){

		
			
		
	var nombre_vacio=0;
	var categoria_vacia=0;
	var imagen_vacia=0;
	
	  
	   	var nombreproducto = $("#txtNombre").val();
		if(nombreproducto =="" || nombreproducto== null ){
			
			$("#ErrorNombre").show();
			nombre_vacio = 1;			
		}
		else if(nombreproducto !="" || nombreproducto !=NULL ){
			$("#ErrorNombre").hide();
			nombre_vacio = 0;
				
		}
		
		
		
		var cat = $("#DDlCategoria").val();
		if(cat =="" || cat== null ){
			$("#ErrorCategoria").show();
			imagen_vacia =1;
		
		}
		else if(cat=!"" || cat!=null){
			$("#ErrorCategoria").hide();
			nombre_vacio=0;			
			
		}
		
		
	   	var imagensuvir = $("#imagen").val();
		if(imagensuvir =="" || imagensuvir== null ){
			
			$("#ErrorImagen").show();
			
			categoria_vacia =1;
		}
		else if(imagensuvir=!"" || imagensuvir!=null){
			$("#ErrorImagen").hide();
			nombre_vacio=0;			
			
		}
		
		

			
			if(nombre_vacio==1 || categoria_vacia==1 || imagen_vacia==1){
				
				return false;
			}else{
				
				return true;
			}
	
	});
	//fin del la funcion del evento cleck  del boton aceptar	



	//evento del check oferta	 
	 $("#chkOferta").change(function(){
	 	
			  	  
	   if($(this).is(':checked')){
	   
	   	
	   	    $("#txtPrecioOferta").removeAttr('readonly');
	   	     	    
	   }else{
	   		

	   	$("#txtPrecioOferta").prop('readonly','readonly');
	   	$("#txtPrecioOferta").val("");
	   	
	   }
	   

	   	
	});
	//fin del evento chkoferta
	
	
	
	//funcio click de los text para remover los errores
		$("#txtNombre").click(function(){
		
		$("#ErrorNombre").hide();
		
	});
	
		$("#DDlCategoria").click(function(){
			//alert('hola dede mi error categoria');
		
		$("#ErrorCategoria").hide();
		
	});
	
		$("#imagen").click(function(){
		
		$("#ErrorImagen").hide();
		
	});
	
	

		//function para los key up del text
		$("#txtNombre").keyup(function(){
		$("#ErrorNombre").hide();
		
	});
	
	
		$("#DDlCategoria").keyup(function(){
		
		$("#ErrorCategoria").hide();
	});
	
	
		$("#imagen").keyup(function(){
		
		$("#ErrorImagen").hide();
	});


});