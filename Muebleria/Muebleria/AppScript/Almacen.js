
var ProductoId=0;

$(document).ready(function(){
	
	
	$(document).on("click",".AddVenta",function(){
		
		//alert('Hola que DIOS te bendiga mucho, mucho, mucho.');
		debugger;
	
		ProductoId = $(this).attr('data-Id');
		
		$("#mVenta").modal('show');		
	});//Luz
		
	//Guarda la venta realizada
$("#btnGuardar").click(function(){
		
			var Cantidad= $("#TxtCantidad").val();
	        var Precio= $("#txtPrecio").val();
	
		$.ajax({		
	    data: {"Cantidad" : ""+ Cantidad +"", "ProductoId" : ""+ ProductoId +"", "Precio" : ""+ Precio +""},
	    type: "POST",
	    dataType: "json",
	    url: "AjaxAlmacen.php",
	    beforeSend: function( xhr ) {
    
                 //  MuestraMensajeEspera($("#MesajeEspera"));
             }
		})
		 .done(function( data, textStatus, jqXHR ) {
		 	
		 	debugger;
		 	
		 		$("#mVenta").modal('hide');
		 	
		 	var datos = data;
		 	
		 	 if ( datos.Success) {
		        
		        MostrarMensajeSuccess($("#AlertMessage"),datos.Message);
		        
		    }else{	
		    	
		    	 $("#mVenta").modal('hide');
		    	// MostrarMensajeInfo($("#AlertMessage"),datos.Message);	    	
		         MostrarMensajeError($("#AlertMessage"),datos.Message);	 

              }
		 		
		     if ( console && console.log ) {
		         console.log( "La solicitud se ha completado correctamente." );
		     }
		 }).fail(function( jqXHR, textStatus, errorThrown ) {
		 	
		 	debugger;
		 		
		     $("#mVenta").modal('hide');
		      MostrarMensajeError($("#AlertMessage"),errorThrown.message);		     
	});//Fin de la funcion del ajaxError
	
		
	});//Fin del evento del boton que guarda la la venta.
	
});//Fin del document ready
