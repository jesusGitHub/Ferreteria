

$(document).ready(function(){	
	
	
	//alert('que DIOS nos bendiga mucho');
	
CargaDropDownList();



});//Luz


function CargaDropDownList()
{
	
	debugger;
	
		$.ajax({		
	    data: {"DDlCategoria" : "DDlCategoria"},
	    type: "POST",
	    dataType: "json",
	    url: "AjaxNuevoProducto.php",
	    beforeSend: function( xhr ) {
    
                 //  MuestraMensajeEspera($("#MesajeEspera"));
             }
		})
		 .done(function( data, textStatus, jqXHR ) {
		 	
		 	debugger;
		 			 	
		 	var datos = data;
		 	
		 	 if ( datos.resultadoSucces) {
		            
		        $("#DDlCategoria").empty();
		        
		          var optionDefaults = $(document.createElement('option'));
		       	  optionDefaults.text("- Seleccione -");
		       	  optionDefaults.val('');
		       	  
		       	   $("#DDlCategoria").append(optionDefaults);
		        
		          $(datos.data).each(function () {
		          	
                      var option = $(document.createElement('option'));

                      option.text(this.Nombre);

                      option.val(this.id);

                      $("#DDlCategoria").append(option);
                  });
		        
		    }else{	
		    	
		    	  //MostrarMensajeError($("#AlertMessage"),datos.Message);	    	
		         //$("#mProducto").modal('hide');

              }
		 		
		     if ( console && console.log ) {
		         console.log( "La solicitud se ha completado correctamente." );
		     }
		 }).fail(function( jqXHR, textStatus, errorThrown ) {
		 	
		 	debugger;
		 	
		 	var error = jqXHR;
		 	
		 	
		   /*  $("#mProducto").modal('hide');
		      MostrarMensajeError($("#AlertMessage"),datos.Message);		*/     
	});
	
}