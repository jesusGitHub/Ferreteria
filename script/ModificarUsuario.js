$(document).ready(function(){
	
	//debugger;
	//Asignando mascara a los campos necesarios
							

	
	$("#txtCedula").numeric();
	$("#txtCedula").mask('99999999999'); 
	$("#txtCelular").numeric(); 
	$("#txtCelular").mask('(999)-999-9999'); 
	$("#txtCantidadOrtodoncia").numeric();
	$("#txtPrecioCantidad").numeric();
	$("#txtCantidadCarie").numeric();
	$("#txtPrecioOrtodoncia").numeric();
	$("#txtCantidadEmpate").numeric();
	$("#txtPrecioEmpate").numeric();
	$("#txtPago").numeric();
	$("#txtCantidadProfilaxis").numeric();
	$("#txtPrecioProfilaxis").numeric();
	$("#txtCantidadDestaltraje").numeric();
	$("#txtPrecioDestaltraje").numeric();
	$("#txtCantidadExodonciaSimple").numeric();
	$("#txtPrecioExodonciaSimple").numeric();	
	$("#txtCantidadCirujiaPeriodonal").numeric();
	$("#txtPrecioCirujiaPeriodonal").numeric();
	$("#txtCantidadEndonciasXconductos").numeric();
	$("#txtPrecioEndonciasXconductos").numeric();
	$("#txtCantidadCementacionesXPiezas").numeric();
	$("#txtPrecioCementacionesXPiezas").numeric();
	$("#txtCantidadPiezasPorcelana").numeric();
	$("#txtPrecioPiezasPorcelana").numeric();
	$("#txtCantidadProtesisCompleta").numeric();
	$("#txtPrecioProtesisCompleta").numeric();
	$("#txtCedulaCita").numeric();
	$("#txtCedulaCita").mask('99999999999');
	

	
/*function imprimir(){
  var objeto=document.getElementById('imprimeme');  //obtenemos el objeto a imprimir
  var ventana=window.open('','_blank');  //abrimos una ventana vacía nueva
  ventana.document.write(objeto.innerHTML);  //imprimimos el HTML del objeto en la nueva ventana
  ventana.document.close();  //cerramos el documento
  ventana.print();  //imprimimos la ventana
  ventana.close();  //cerramos la ventana
}*/



	//validando los tex para ocultar los errores

	$("#txtNombre").keyup(function(){
		$("#ErrorNombre").hide();
		
	});
	
	
	$("#txtApellido").keyup(function(){
		
		$("#ErrorAPellido").hide();
	});
	
	
	$("#txtCedula").keyup(function(){
		
		$("#ErrorCedula").hide();
	});
	
	//fin de la validacion para ocultar lo errorer k existn al escrivir en los tex
	
	
	
	//validando los tex
	$("#btnEnviar").click(function(){
		//alert('hoala mundo Que DIOS los vendiga a todod');
		var nombrevacio = 0;
		var apellidopvacio=0;
		var cedulavacia=0;

		var pago = $("#txtPago").val();
		var total = $("#TotalResultHidden").val();
		
		//debugger;
		
		//validano el campo del texto nombre nombre
		var nombre = $("#txtNombre").val();

		if(nombre == "" || nombre == null)	
		{
			$("#ErrorNombre").show();
			//$("#txtNombre").addClass(errortexto);
			nombrevacio = 1;	
		}
		else if(nombre !="" || nombre !=NULL ){
			$("#errorNombre").hide();
			nombrevacio = 0;
				
		}
		
		
		 
		 //validacion del apellido
		 var apellido = $("#txtApellido").val();
		 
		 if (apellido =="" || apellido == null)
		 {
		 	$("#ErrorAPellido").show();
		 	apellidopvacio =1;
		 	
		}
		 else if(apellido !="" || apellido != Null ){
		 	
		 	$("#ErrorAPellido").hide();
		 	apellidopvacio =0;
		 }
		 
		 
		 var cedula = $("#txtCedula").val();
		 
		 if (cedula =="" || cedula == null){
		 	
		 	$("#ErrorCedula").show();
		 	 cedulavacia =1;
	
		 }
		 
		 else if(cedula !="" || cedula != NULL){
		 
		 $("#ErrorCedula").hide();
		 cedulavacia =0;
		 
		  	
		  }
		  if(nombrevacio ==1 || apellidopvacio ==1 || cedulavacia==1){
		  	
		  	return false;
		  	
		  }else{
		  	
		  	return true;
		  	
		  }
		  
	});
	
	//validando campo de texto para los errore
	

	var NumColumna = 3;
	var valor = "";
	//alert('Saludo que DIOS NOS BENDIGA MUCHO.');
				  	  
	 //Eventos ChecBox *-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-******
	 
	 $("#chkCarie").change(function(){
			  	  
	   if($(this).is(':checked')){
	   	
	   	    $("#txtCantidadCarie").removeAttr('readonly');
	   	    $("#txtPrecioCantidad").removeAttr('readonly');
	   	     $("#txtPrecioCantidad").keyup();
	   	    
	   }else{
	    $("#txtCantidadCarie").prop('readonly','readonly');
	    $("#txtPrecioCantidad").prop('readonly','readonly');
	  
	     $(this).parent()
	                 .parent()
	                 .children('td')
	                 .eq(NumColumna).find('span')
	                 .html('0'); 
	                 
	                 calculaTotal();	    
	    
	   } 
	   
	   if($(this).not(':checked')){
	   	
	   		$("#txtPrecioCantidad").val(valor);
	   		$("#txtCantidadCarie").val(valor);
	   	
	   }
	   	
	});
	
	
	//chk ortodoncia ***********************
	$("#chkOrtodoncia").change(function(){
		
		 if($(this).is(':checked')){
	   	
	   	    $("#txtCantidadOrtodoncia").removeAttr('readonly');
	   	    $("#txtPrecioOrtodoncia").removeAttr('readonly');
	   	    $("#txtPrecioOrtodoncia").keyup();
	   	    
	   }else{
	   	  
	    $("#txtCantidadOrtodoncia").prop('readonly','readonly');
	    $("#txtPrecioOrtodoncia").prop('readonly','readonly');
	    
	        $(this).parent()
	                 .parent()
	                 .children('td')
	                 .eq(NumColumna).find('span')
	                 .html('0'); 
	                 
	                 calculaTotal();	   
	   } 	
		
		if($(this).not(':checked')){
			
			$("#txtCantidadOrtodoncia").val(valor);
			$("#txtPrecioOrtodoncia").val(valor);
			
		}
	});
	
	
	$("#chkEmpate").click(function(){
		
		 if($(this).is(':checked')){
	   	
	   	    $("#txtCantidadEmpate").removeAttr('readonly');
	   	    $("#txtPrecioEmpate").removeAttr('readonly');
	   	   
	        $("#txtPrecioEmpate").keyup();
	   	       	    
	   }else{
	   	  
	    $("#txtCantidadEmpate").prop('readonly','readonly');
	    $("#txtPrecioEmpate").prop('readonly','readonly');
	    $(this).parent()
	                 .parent()
	                 .children('td')
	                 .eq(NumColumna).find('span')
	                 .html('0'); 
	                 
	                 calculaTotal();	    
	   } 
	   
	   
	   if ($(this).not(':checked')){
	   	
	   	
	   	$("#txtCantidadEmpate").val(valor);
	   	$("#txtPrecioEmpate").val(valor);
	   		
	   }	
		
	});
	
	
	
	$("#chkProfilaxis").click(function(){
		
		if($(this).is(':checked')){
			
			$("#txtCantidadProfilaxis").removeAttr('readonly');
			$("#txtPrecioProfilaxis").removeAttr('readonly');
			$("#txtprecioProfilaxis").keyup();
		
		}else{
			
			$("#txtCantidadProfilaxis").prop('readonly','readonly');
			$("#txtPrecioProfilaxis").prop('readonly','readonly');
			$(this).parent()
			
						.parent()
						.children()
						.eq(NumColumna).find('span')
						.html('0');
						
						calculaTotal();
			
		}
		
		if($(this).not(':checked')){
			
			$("#txtCantidadProfilaxis").val(valor);
			$("#txtPrecioProfilaxis").val(valor);
			
		}

		
	});
	
	//cck destaltraje*------
		$("#chkDestaltraje").click(function(){
		
		if($(this).is(':checked')){
			
			$("#txtCantidadDestaltraje").removeAttr('readonly');
			$("#txtPrecioDestaltraje").removeAttr('readonly');
			$("#txtPrecioDestaltraje").keyup();
		
		}else{
			
			$("#txtCantidadDestaltraje").prop('readonly','readonly');
			$("#txtPrecioDestaltraje").prop('readonly','readonly');
			$(this).parent()
			
						.parent()
						.children()
						.eq(NumColumna).find('span')
						.html('0');
						
						calculaTotal();
			
		}
		
		if($(this).not(':checked')){
			
			$("#txtCantidadDestaltraje").val(valor);
			$("#txtPrecioDestaltraje").val(valor);
			
		}

		
	});
	
	//chk Exodoncia Simple
		$("#chkExodonciaSimple").click(function(){
		
		if($(this).is(':checked')){
			
			$("#txtCantidadExodonciaSimple").removeAttr('readonly');
			$("#txtPrecioExodonciaSimple").removeAttr('readonly');
			$("#txtPrecioExodonciaSimple").keyup();
		
		}else{
			
			$("#txtCantidadExodonciaSimple").prop('readonly','readonly');
			$("#txtPrecioExodonciaSimple").prop('readonly','readonly');
			$(this).parent()
			
						.parent()
						.children()
						.eq(NumColumna).find('span')
						.html('0');
						
						calculaTotal();
			
		}
		
		if($(this).not(':checked')){
			
			$("#txtCantidadExodonciaSimple").val(valor);
			$("#txtPrecioExodonciaSimple").val(valor);
			
		}

		
	});
	
	//chk Cirujia Periodonal
		
		$("#chkCirujiaPeriodonal").click(function(){
		
		if($(this).is(':checked')){
			
			$("#txtCantidadCirujiaPeriodonal").removeAttr('readonly');
			$("#txtPrecioCirujiaPeriodonal").removeAttr('readonly');
			$("#txtPrecioCirujiaPeriodonal").keyup();
		
		}else{
			
			$("#txtCantidadCirujiaPeriodonal").prop('readonly','readonly');
			$("#txtPrecioCirujiaPeriodonal").prop('readonly','readonly');
			$(this).parent()
			
						.parent()
						.children()
						.eq(NumColumna).find('span')
						.html('0');
						
						calculaTotal();
			
		}
		
		if($(this).not(':checked')){
			
			$("#txtCantidadCirujiaPeriodonal").val(valor);
			$("#txtPrecioCirujiaPeriodonal").val(valor);
			
		}

		
	});
	
	//chk Endoncias X conductos
		
		$("#chkEndonciasXconductos").click(function(){
		
		if($(this).is(':checked')){
			
			$("#txtCantidadEndonciasXconductos").removeAttr('readonly');
			$("#txtPrecioEndonciasXconductos").removeAttr('readonly');
			$("#txtPrecioEndonciasXconductos").keyup();
		
		}else{
			
			$("#txtCantidadEndonciasXconductos").prop('readonly','readonly');
			$("#txtPrecioEndonciasXconductos").prop('readonly','readonly');
			$(this).parent()
			
						.parent()
						.children()
						.eq(NumColumna).find('span')
						.html('0');
						
						calculaTotal();
			
		}
		
		if($(this).not(':checked')){
			
			$("#txtCantidadEndonciasXconductos").val(valor);
			$("#txtPrecioEndonciasXconductos").val(valor);
			
		}

		
	});
	//chk Cementaciones X Piezas
		$("#chkCementacionesXPiezas").click(function(){
		
		if($(this).is(':checked')){
			
			$("#txtCantidadCementacionesXPiezas").removeAttr('readonly');
			$("#txtPrecioCementacionesXPiezas").removeAttr('readonly');
			$("#txtPrecioCementacionesXPiezas").keyup();
		
		}else{
			
			$("#txtCantidadCementacionesXPiezas").prop('readonly','readonly');
			$("#txtPrecioCementacionesXPiezas").prop('readonly','readonly');
			$(this).parent()
			
						.parent()
						.children()
						.eq(NumColumna).find('span')
						.html('0');
						
						calculaTotal();
			
		}
		
		if($(this).not(':checked')){
			
			$("#txtCantidadCementacionesXPiezas").val(valor);
			$("#txtPrecioCementacionesXPiezas").val(valor);
			
		}

		
	});
	
	//chk Piezas de Porcelana
	
		$("#chkPiezasPorcelana").click(function(){
		
		if($(this).is(':checked')){
			
			$("#txtCantidadPiezasPorcelana").removeAttr('readonly');
			$("#txtPrecioPiezasPorcelana").removeAttr('readonly');
			$("#txtPrecioPiezasPorcelana").keyup();
		
		}else{
			
			$("#txtCantidadPiezasPorcelana").prop('readonly','readonly');
			$("#txtPrecioPiezasPorcelana").prop('readonly','readonly');
			$(this).parent()
			
						.parent()
						.children()
						.eq(NumColumna).find('span')
						.html('0');
						
						calculaTotal();
			
		}
		
		if($(this).not(':checked')){
			
			$("#txtCantidadPiezasPorcelana").val(valor);
			$("#txtPrecioPiezasPorcelana").val(valor);
			
		}

		
	});
	
	//chk Protesis Completa
	
		$("#chkProtesisCompleta").click(function(){
		
		if($(this).is(':checked')){
			
			$("#txtCantidadProtesisCompleta").removeAttr('readonly');
			$("#txtPrecioProtesisCompleta").removeAttr('readonly');
			$("#txtPrecioProtesisCompleta").keyup();
		
		}else{
			
			$("#txtCantidadProtesisCompleta").prop('readonly','readonly');
			$("#txtPrecioProtesisCompleta").prop('readonly','readonly');
			$(this).parent()
			
						.parent()
						.children()
						.eq(NumColumna).find('span')
						.html('0');
						
						calculaTotal();
			
		}
		
		if($(this).not(':checked')){
			
			$("#txtCantidadProtesisCompleta").val(valor);
			$("#txtPrecioProtesisCompleta").val(valor);
			
		}

		
	});
	
	
	
	//Implementación de eventos

	var eventoTxtCaries = function(){
		 
		// debugger;
    		var SubTotalCarie=0;
    		
    		var ValueTxtcarie = $("#txtCantidadCarie").val();
    		var ValueTxtPrecioCantidad = $("#txtPrecioCantidad").val();
    		
    		if (ValueTxtcarie == "" || ValueTxtcarie == null) 
    		{
    			$("#txtPrecioCantidad").val('');
    			
    		}else{
    			
    			if (ValueTxtPrecioCantidad != "" & ValueTxtPrecioCantidad != null) {
    			
    			 if (!isNaN(ValueTxtPrecioCantidad)) {
    			 	
		    		var costoCarie = parseInt(ValueTxtPrecioCantidad);
		    		var cantidadCarie = parseInt(ValueTxtcarie);
		    		SubTotalCarie = costoCarie * cantidadCarie;
		    		
		    		} 		    
    		    }
    		
    		 }		 
	          $(this).parent()
	                 .parent()
	                 .children('td')
	                 .eq(NumColumna).find('span')
	                 .html(SubTotalCarie);
	                 $("#SubTotalCarieHidden").val(SubTotalCarie);      
	                 
	                    calculaTotal();     
	};

	//Ortodoncia envento
	var eventoTxtOrtondocia = function(){
		
		var subTotalOrtodoncia = 0;
		
		var ValueTxtOrtodoncia = $("#txtCantidadOrtodoncia").val();
		var ValueTxtPrecioOrtodoncia = $("#txtPrecioOrtodoncia").val();
		
		if (ValueTxtOrtodoncia == "" || ValueTxtOrtodoncia == null) 
    		{
    			$("#txtPrecioOrtodoncia").val('');
    			
    		}else{
    			
    	  if (ValueTxtPrecioOrtodoncia != "" & ValueTxtPrecioOrtodoncia != null) {
    			
    			if (!isNaN(ValueTxtPrecioOrtodoncia)) {
    			
		    		var costoOrtodoncia = parseInt(ValueTxtPrecioOrtodoncia);
		    		var cantidadOrtodoncia = parseInt(ValueTxtOrtodoncia);
		    		subTotalOrtodoncia = costoOrtodoncia * cantidadOrtodoncia;	
    			}
    		}
    		
    		 }
    		   $(this).parent()
	                 .parent()
	                 .children('td')
	                 .eq(NumColumna).find('span')
	                 .html(subTotalOrtodoncia);   
	                 
	                 $("#SubTotalOrtodonciaHidden").val(subTotalOrtodoncia);
	                  calculaTotal();         	
	};
	
	
	var eventoTxtEmpate = function()
	{
	   var subTotalEmpate = 0;
		
		var ValueTxtEmpate = $("#txtCantidadEmpate").val();
		var valueTxtPrecioEmpate = $("#txtPrecioEmpate").val();
		
		if(ValueTxtEmpate == "" || ValueTxtEmpate == null)
		{
			$("#txtPrecioEmpate").val('');
		}else{
    			
    		if (valueTxtPrecioEmpate != "" & valueTxtPrecioEmpate != null) {
    			
    			if (!isNaN(valueTxtPrecioEmpate)) {
    			
	    		var costoEmpate = parseInt($("#txtPrecioEmpate").val());
	    		var cantidadEmpate = parseInt(ValueTxtEmpate);
	    		subTotalEmpate = costoEmpate * cantidadEmpate;
    		    
    		    }
    		  }	
    		
    		 }
    		 
    		
    		 
    		   $(this).parent()
	                 .parent()
	                 .children('td')
	                 .eq(NumColumna).find('span')
	                 .html(subTotalEmpate); 
	                 $("#SubTotaEmpateHidden").val(subTotalEmpate); 
	                 
	                 calculaTotal();     	
	};
	
	
	
	var eventotxtProfilaxis =function(){
		
		var subTotalProfilaxis = 0;
		
		var ValueTxtProfilaxis = $("#txtCantidadProfilaxis").val();
		var valueTxtPrecioProfilaxis = $("#txtPrecioProfilaxis").val();
		
		if(ValueTxtProfilaxis == "" || ValueTxtProfilaxis == null)
		{
			$("#txtPrecioProfilaxis").val('');
		}else{
    			
    		if (valueTxtPrecioProfilaxis != "" & valueTxtPrecioProfilaxis != null) {
    			
    			if (!isNaN(valueTxtPrecioProfilaxis)) {
    			
	    		var costoProfilaxis = parseInt($("#txtPrecioProfilaxis").val());
	    		var cantidadProfilaxis= parseInt(ValueTxtProfilaxis);
	    		subTotalProfilaxis = costoProfilaxis * cantidadProfilaxis;
    		    
    		    }
    		  }	
    		
    		 }
    		 
    		
    		 
    		   $(this).parent()
	                 .parent()
	                 .children('td')
	                 .eq(NumColumna).find('span')
	                 .html(subTotalProfilaxis); 
	                 $("#SubtotalProfilasisHidden").val(subTotalProfilaxis); 
	                 
	                 calculaTotal();     	
	};
	
	
		
	var eventotxtDestaltraje = function()
	{
	   var subTotalDestaltraje = 0;
		
		var ValueTxtDestaltraje = $("#txtCantidadDestaltraje").val();
		var valueTxtPrecioDestaltraje = $("#txtPrecioDestaltraje").val();
		
		if(ValueTxtDestaltraje == "" || ValueTxtDestaltraje == null)
		{
			$("#txtPrecioDestaltraje").val('');
		}else{
    			
    		if (valueTxtPrecioDestaltraje != "" & valueTxtPrecioDestaltraje != null) {
    			
    			if (!isNaN(valueTxtPrecioDestaltraje)) {
    			
	    		var costoDestaltraje = parseInt($("#txtPrecioDestaltraje").val());
	    		var cantidadDestaltraje = parseInt(ValueTxtDestaltraje);
	    		subTotalDestaltraje = costoDestaltraje * cantidadDestaltraje;
    		    
    		    }
    		  }	
    		
    		 }
    		 
    		
    		 
    		   $(this).parent()
	                 .parent()
	                 .children('td')
	                 .eq(NumColumna).find('span')
	                 .html(subTotalDestaltraje); 
	                 $("#SubtotalDestaltrajeHidden").val(subTotalDestaltraje); 
	                 
	                 calculaTotal();     	
	};
	
	
	var eventoTxtExodonciaSimple = function()
	{
	   var subTotalExodonciaSimple = 0;
		
		var ValueTxtExodonciaSimple = $("#txtCantidadExodonciaSimple").val();
		var valueTxtPrecioExodonciaSimple = $("#txtPrecioExodonciaSimple").val();
		
		if(ValueTxtExodonciaSimple == "" || ValueTxtExodonciaSimple == null)
		{
			$("#txtPrecioExodonciaSimple").val('');
		}else{
    			
    		if (valueTxtPrecioExodonciaSimple != "" & valueTxtPrecioExodonciaSimple != null) {
    			
    			if (!isNaN(valueTxtPrecioExodonciaSimple)) {
    			
	    		var costoExodonciaSimple = parseInt($("#txtPrecioExodonciaSimple").val());
	    		var cantidadExodonciaSimple = parseInt(ValueTxtExodonciaSimple);
	    		subTotalExodonciaSimple = costoExodonciaSimple * cantidadExodonciaSimple;
    		    
    		    }
    		  }	
    		
    		 }
    		 
    		
    		 
    		   $(this).parent()
	                 .parent()
	                 .children('td')
	                 .eq(NumColumna).find('span')
	                 .html(subTotalExodonciaSimple); 
	                 $("#SubtotalExodonciaSimpleHidden").val(subTotalExodonciaSimple); 
	                 
	                 calculaTotal();     	
	};
	
	var eventoTxtCirujiaPeriodonal = function()
	{
	   var subTotalCirujiaPeriodonal = 0;
		
		var ValueTxtCirujiaPeriodonal = $("#txtCantidadCirujiaPeriodonal").val();
		var valueTxtPrecioCirujiaPeriodonal = $("#txtPrecioCirujiaPeriodonal").val();
		
		if(ValueTxtCirujiaPeriodonal == "" || ValueTxtCirujiaPeriodonal == null)
		{
			$("#txtPrecioCirujiaPeriodonal").val('');
		}else{
    			
    		if (valueTxtPrecioCirujiaPeriodonal != "" & valueTxtPrecioCirujiaPeriodonal != null) {
    			
    			if (!isNaN(valueTxtPrecioCirujiaPeriodonal)) {
    			
	    		var costoCirujiaPeriodonal = parseInt($("#txtPrecioCirujiaPeriodonal").val());
	    		var cantidadCirujiaPeriodonal = parseInt(ValueTxtCirujiaPeriodonal);
	    		subTotalCirujiaPeriodonal = costoCirujiaPeriodonal * cantidadCirujiaPeriodonal;
    		    
    		    }
    		  }	
    		
    		 }
    		 
    		
    		 
    		   $(this).parent()
	                 .parent()
	                 .children('td')
	                 .eq(NumColumna).find('span')
	                 .html(subTotalCirujiaPeriodonal); 
	                 $("#SubtotalCirujiaPeriodonalHidden").val(subTotalCirujiaPeriodonal); 
	                 
	                 calculaTotal();     	
	};



	var eventoTxtEndonciasXconductos = function()
	{
	   var subTotalEndonciasXconductos = 0;
		
		var ValueTxtEndonciasXconductos = $("#txtCantidadEndonciasXconductos").val();
		var valueTxtPrecioEndonciasXconductos = $("#txtPrecioEndonciasXconductos").val();
		
		if(ValueTxtEndonciasXconductos == "" || ValueTxtEndonciasXconductos == null)
		{
			$("#txtPrecioEndonciasXconductos").val('');
		}else{
    			
    		if (valueTxtPrecioEndonciasXconductos != "" & valueTxtPrecioEndonciasXconductos != null) {
    			
    			if (!isNaN(valueTxtPrecioEndonciasXconductos)) {
    			
	    		var costoEndonciasXconductos = parseInt($("#txtPrecioEndonciasXconductos").val());
	    		var cantidadEndonciasXconductos = parseInt(ValueTxtEndonciasXconductos);
	    		subTotalEndonciasXconductos = costoEndonciasXconductos * cantidadEndonciasXconductos;
    		    
    		    }
    		  }	
    		
    		 }
    		 
    		
    		 
    		   $(this).parent()
	                 .parent()
	                 .children('td')
	                 .eq(NumColumna).find('span')
	                 .html(subTotalEndonciasXconductos); 
	                 $("#SubtotalEndonciasXconductosHidden").val(subTotalEndonciasXconductos); 
	                 
	                 calculaTotal();     	
	};
	
	
	var eventoTxtCementacionesXPiezas = function()
	{
	   var subTotalCementacionesXPiezas = 0;
		
		var ValueTxtCementacionesXPiezas = $("#txtCantidadCementacionesXPiezas").val();
		var valueTxtPrecioCementacionesXPiezas = $("#txtPrecioCementacionesXPiezas").val();
		
		if(ValueTxtCementacionesXPiezas == "" || ValueTxtCementacionesXPiezas == null)
		{
			$("#txtPrecioCementacionesXPiezas").val('');
		}else{
    			
    		if (valueTxtPrecioCementacionesXPiezas != "" & valueTxtPrecioCementacionesXPiezas != null) {
    			
    			if (!isNaN(valueTxtPrecioCementacionesXPiezas)) {
    			
	    		var costoCementacionesXPiezas = parseInt($("#txtPrecioCementacionesXPiezas").val());
	    		var cantidadCementacionesXPiezas = parseInt(ValueTxtCementacionesXPiezas);
	    		subTotalCementacionesXPiezas = costoCementacionesXPiezas * cantidadCementacionesXPiezas;
    		    
    		    }
    		  }	
    		
    		 }
    		 
    		
    		 
    		   $(this).parent()
	                 .parent()
	                 .children('td')
	                 .eq(NumColumna).find('span')
	                 .html(subTotalCementacionesXPiezas); 
	                 $("#SubtotalCementacionesXPiezasHidden").val(subTotalCementacionesXPiezas); 
	                 
	                 calculaTotal();     	
	};
	
	
	var eventoTxtPiezasPorcelana = function()
	{
	   var subTotalPiezasPorcelana = 0;
		
		var ValueTxtPiezasPorcelana = $("#txtCantidadPiezasPorcelana").val();
		var valueTxtPrecioPiezasPorcelana = $("#txtPrecioPiezasPorcelana").val();
		
		if(ValueTxtPiezasPorcelana == "" || ValueTxtPiezasPorcelana == null)
		{
			$("#txtPrecioPiezasPorcelana").val('');
		}else{
    			
    		if (valueTxtPrecioPiezasPorcelana != "" & valueTxtPrecioPiezasPorcelana != null) {
    			
    			if (!isNaN(valueTxtPrecioPiezasPorcelana)) {
    			
	    		var costoPiezasPorcelana = parseInt($("#txtPrecioPiezasPorcelana").val());
	    		var cantidadPiezasPorcelana = parseInt(ValueTxtPiezasPorcelana);
	    		subTotalPiezasPorcelana = costoPiezasPorcelana * cantidadPiezasPorcelana;
    		    
    		    }
    		  }	
    		
    		 }
    		 
    		
    		 
    		   $(this).parent()
	                 .parent()
	                 .children('td')
	                 .eq(NumColumna).find('span')
	                 .html(subTotalPiezasPorcelana); 
	                 $("#SubtotalPiezasPorcelanaHidden").val(subTotalPiezasPorcelana); 
	                 
	                 calculaTotal();     	
	};
	
	
	var eventoTxtProtesisCompleta = function()
	{
	   var subTotalProtesisCompleta = 0;
		
		var ValueTxtProtesisCompleta = $("#txtCantidadProtesisCompleta").val();
		var valueTxtPrecioProtesisCompleta = $("#txtPrecioProtesisCompleta").val();
		
		if(ValueTxtProtesisCompleta == "" || ValueTxtProtesisCompleta == null)
		{
			$("#txtPrecioProtesisCompleta").val('');
		}else{
    			
    		if (valueTxtPrecioProtesisCompleta != "" & valueTxtPrecioProtesisCompleta != null) {
    			
    			if (!isNaN(valueTxtPrecioProtesisCompleta)) {
    			
	    		var costoProtesisCompleta  = parseInt($("#txtPrecioProtesisCompleta").val());
	    		var cantidadProtesisCompleta  = parseInt(ValueTxtProtesisCompleta);
	    		subTotalProtesisCompleta = costoProtesisCompleta * cantidadProtesisCompleta;
    		    
    		    }
    		  }	
    		
    		 }
    		 
    		
    		 
    		   $(this).parent()
	                 .parent()
	                 .children('td')
	                 .eq(NumColumna).find('span')
	                 .html(subTotalProtesisCompleta); 
	                 $("#SubtotalPiezasPorcelanaHidden").val(subTotalProtesisCompleta); 
	                 
	                 calculaTotal();     	
	};
	
	
	
	
	
	



	
	
    function calculaTotal () {
	//debugger;
	  var resultadoTotal =0;
		
	  $("#tblTrabajoPaciente").find('tr').each(function(){
		 
	   // debugger;
	    
		var total = 0;
		
		 var subTotal = $(this).children('td').eq(3).find('.subTotal').text();
		 
		 if (subTotal != "" & subTotal != null) {
		    
		    if(!isNaN(subTotal))
		    {
		 	 resultadoTotal += parseInt(subTotal);	     
		    }
		 }
		 
		});
	   
	   $("#TotalResult").text(resultadoTotal);
	   $("#TotalResultHidden").val(resultadoTotal);
	  // resultadoTotal=0;
     delete resultadoTotal;
     delete subTotal;
  
}
	
	
	$("#txtPrecioCantidad").on("keyup",eventoTxtCaries );
	$("#txtCantidadCarie").on("keyup",eventoTxtCaries);
	
	$("#txtCantidadOrtodoncia").on("keyup",eventoTxtOrtondocia);
	$("#txtPrecioOrtodoncia").on("keyup",eventoTxtOrtondocia);
	
	$("#txtCantidadEmpate").on("keyup",eventoTxtEmpate);
	$("#txtPrecioEmpate").on("keyup", eventoTxtEmpate);
	
	//*********************desde aki falta por rabajar
	
	$("#txtCantidadProfilaxis").on("keyup",eventotxtProfilaxis );//listo
	$("#txtPrecioProfilaxis").on("keyup",eventotxtProfilaxis);
	
	$("#txtCantidadDestaltraje").on("keyup",eventotxtDestaltraje);//listo
	$("#txtPrecioDestaltraje").on("keyup",eventotxtDestaltraje);
	
	$("#txtCantidadExodonciaSimple").on("keyup",eventoTxtExodonciaSimple);//listo
	$("#txtPrecioExodonciaSimple").on("keyup",eventoTxtExodonciaSimple);
	
	$("#txtCantidadCirujiaPeriodonal").on("keyup",eventoTxtCirujiaPeriodonal);//listo
	$("#txtPrecioCirujiaPeriodonal").on("keyup", eventoTxtCirujiaPeriodonal);
	
	$("#txtCantidadEndonciasXconductos").on("keyup",eventoTxtEndonciasXconductos);//listo
	$("#txtPrecioEndonciasXconductos").on("keyup", eventoTxtEndonciasXconductos);
	
	$("#txtCantidadCementacionesXPiezas").on("keyup",eventoTxtCementacionesXPiezas);//listo
	$("#txtPrecioCementacionesXPiezas").on("keyup", eventoTxtCementacionesXPiezas);
	
	$("#txtCantidadPiezasPorcelana").on("keyup",eventoTxtPiezasPorcelana);//listo
	$("#txtPrecioPiezasPorcelana").on("keyup", eventoTxtPiezasPorcelana);
	
	$("#txtCantidadProtesisCompleta").on("keyup",eventoTxtProtesisCompleta);//listo
	$("#txtPrecioProtesisCompleta").on("keyup", eventoTxtProtesisCompleta);
	eventoTxtProtesisCompleta
	
	
});
