<?php
require_once 'recursos/conexion.php';

 $idconexion = ConectarServidor();
 
//session_start();
require_once 'plan_header.php';
require_once 'plan_sidebar.php';
?>

<?php


//echo "<script>alert('gtkgjjkg')</script>";

if (isset($_POST['btnGuardar'])) {
	if(isset($_SESSION['tipoid'])){
		
		
		
	$estatus=1;	
	  $tipo_usuario_id=$_SESSION['tipoid'];
	  $sql="SELECT * FROM tbl_tipousuario WHERE TipoID='$tipo_usuario_id'";
	  $queri_tipo_result=mysqli_query($idconexion,$sql) or die("error al seleccionar al tipo de"
	  ."de usuario".mysqli_error($idconexion));
	  
	  $dato_usuario=mysqli_fetch_array($queri_tipo_result);
	  $tipo_usuario_nombre=$dato_usuario['Nombre'];
	  
	  if($tipo_usuario_nombre!=""){
		

	//Obtencion de datos
	$usuarioid="";
	$nombreproducto=$_POST['txtNombrep'];
	$categoriaid = $_POST['DDlCategoria'];
	$descripcion = $_POST['txtDescripcion'];
	$precio=$_POST['txtPrecio'];
	$oferta="";
	$preciooferta=$_POST['txtPrecioOferta'];	
	$nuevo_nombre='';
	
		/*if(isset($_POST['DDlCategoria']) && $_POST['DDlCategoria']>0){
			$categoria   = $_POST['DDlCategoria'];	
		}*/	
		if(isset($_SESSION['usuarioid'])){
			$usuarioid=$_SESSION['usuarioid'];
			}
		
		if(isset($_POST['chkOferta'])){
			$oferta="1";
		}


	//uso de la funcion mode_uploade_file y la funcion is_uploade_file

	/* procesando archivo de imagen */
	//print_r($_FILES);

	//obtengo la imagen subida
	$archivo=$_FILES['imagen']['tmp_name'];

	if (is_uploaded_file($archivo)) {
		
		$tipo= $_FILES['imagen']['type'];
	
		if($tipo == 'image/jpeg' || $tipo == 'image/jpg' || $tipo == 'image/png' || $tipo == 'image/gif' || $tipo == 'image/x-icon'){
	    	//declarando variable vandera para controlar la ejecucion de consultas
			$bandera=TRUE;
			//generando un nuevo nombre
		
			$nuevo_nombre="producto_".time();
		
			$nombre_original = $_FILES['imagen']['name'];
		
			$info= pathinfo($nombre_original);
		
			$extencion= $info['extension'];
		
			$nuevo_nombre.=".$extencion";//contateno la estencion con el nuevo nombre
		
			//echo "archivo subido con exito nuevo nombre $nuevo_nombre<br>";
		
										//si no existe la carpeta la creamos
		
			$ruta="imagenes/producto";

			if (!is_dir($ruta)) {
			
				mkdir($ruta,0777,true);
				echo "CARPETA $ruta creada correctamente";
				$informacion=pathinfo($ruta);
			
				print_r($informacion);
			}
		
		
			//mover y renombrar el archivo a  destino usando la funcion move_uploaded_file se utiliza para mover archivo
			$ruta.="/$nuevo_nombre";
			move_uploaded_file($archivo,$ruta);
		
		
		}else{ //Si la extencion del archivo no conside se le especifica cuales extenciones son soportadas o aceptadas
	
		//se procede a cambiar el valor de la variable vandera para que no se ejecute la consulta
		$bandera=FALSE;
		echo "Archivo no permitido, solo jpg,jpeg,gif,icon";
	
		}
	}

   	//Si la variable bandera es verdadera se ejecutara la consulta
	if ($bandera==TRUE) {
	
		$dato_insert_result=TRUE;
	//Se genera un codigo para tener mas control, con la relacion entre el producto y la imagen
 	$codigo = time();
	//Se prepara el insert con los datos del producto.
	$sql = "INSERT INTO tbl_producto
        	(CategoriaID,UsuarioID,Nombre,Codigo,Descripcion,Precio,PrecioOferta,Oferta)
        	VALUES('$categoriaid','$usuarioid','$nombreproducto','$codigo','$descripcion','$precio','$preciooferta','$oferta')";
        
	//Insertando los datos el producto
	$insert_producto_result=mysqli_query($idconexion,$sql)or die("Error insetando los datos "
	."en la tabla producto".mysqli_error($idconexion));
	
	if($insert_producto_result!=TRUE){
		$dato_insert_result=FALSE;
	}

		//Se prepara el select para busca el producto insertado, para tomar su ID
		$sql = "SELECT * FROM tbl_producto WHERE codigo = '$codigo'";
		//Se busca el producto insertado
    	$resulQuery = mysqli_query($idconexion,$sql)or die("Error en realizando el select a la tala producto  ".mysqli_error($idconexion));
		
 		//Se toman los campos del producto insertado
   		$campos = mysqli_fetch_array($resulQuery);
   		//Se extrae el Id del producto insertado		
   		$productoId = $campos['ProductoID'];
		//Se prepara query para insertar la imagen con el ID del producto
		$sql = "INSERT INTO tbl_imagen(ProductoId, Imagen) " 
	       ." VALUES('$productoId','$nuevo_nombre' )";
		//Se inserta la imagen
		$resul_insert_imagen = mysqli_query($idconexion,$sql)or die("Error insetando la imagen".mysqli_error($idconexion));

		if($resul_insert_imagen!= TRUE){
				
			$dato_insert_result=FALSE;		
			
		}
			if($dato_insert_result==TRUE){
				
				
			}

		
		}//FIN DEL IF QUE EVALUA LA BARIABLE BANDERA
		
		
		
		

		
	  }else{
	  		
			echo"<script>alert('usted no cuenta con los permisos requeridos para realizar esta operacion')</script>";
	  	}//fin del if que verifica si el usuario es administrador 
 	}//fin del if que verifica si existe usuario logueado
 }// fin del if que verifia si existe el boton crears	

 
	
?>

	
		


	<h3><i class="fa fa-angle-right"></i> Creando producto.</h3>
			
			
			
			<!-- validando mensajes de resultados de los insert-->
			<?php
				if(isset($dato_insert_result)){
					if($dato_insert_result==TRUE){
			
			?>
			<div id="OperacionExitosa" class="col-lg-12" align="center">
				<div class="alert alert-success">
					 La Operacion Se Realizo Con Exito....
				</div>				
      		</div>
      		<?php
					}else{
						
						
			?>
			<div id="OperacionError" class="col-lg-12" align="center">
				<div class="alert alert-danger">
					 Error en la operacion....
				</div>				
      		</div>
			<?php			
						
					}
						
				}	
      		
      		?>		
      
      <!--fin validando mensajes-->
      
      
      
      
      <div class="row mt">

         <div class="col-lg-12">
			<form class="edicion" action="NuevoProducto.php" method="post" enctype="multipart/form-data">
      <div class="panel panel-body">
         		<!--<div class="row">-->
         			<div class="col-lg-6">
         	 			<label>
           	    			<b>Nombre</b>
           	    		</label>
           	    		<div class="form-group">
           	    			<input type="text" name="txtNombrep" id="txtNombrep" class="form-control" style="width: 75%;" />          	
              				<div id="ErrorNombre" style="display:none; color: red"><span> Campo requerido </span></div>	
              			</div>
              		
              
                	
						<label>
							<b>Categoria</b>
						</label>
						<div class="form-group">	           					
           	   				<select  class="form-control" id="DDlCategoria" name="DDlCategoria" style="width: 75%;">
				   		 		<option value="" disabled="disabled" selected="selected">- Seleccine -</option>	
							</select>
								<div id="ErrorCategoria" style="display:none; color: red"><span> Campo requerido </span></div>
						</div>	
               		
               <!--</div>-->
               
             
                		<label>
                			<b>Descripcion</b>
                		</label>
                		<div class="form-group">
           	        		<input type="text" name="txtDescripcion"  id="txtDescripcion"   class="form-control" style="width: 75%;">
						</div> 
					        	
                  	</div>
                  
                  	<!--<div class="col-6">-->          
                   
                 	<div class="col-lg-6">
                 		
                 		<label>
                 			<b>Precio</b>
                 		</label>
                 		<div class="form-group">
                 			<input type="text" name="txtPrecio" id="txtPrecio" class="form-control" style="width: 75%;" />
                 		</div>

                 		<div 
                 		<label>
                 			<b>Oferta</b>
                 			<input type="checkbox" class="list-child" id="chkOferta" name="chkOferta" /> <br /> 
                 		</label>
                 		<div class="form-group">
                 			
                 			<input  type="text" name="txtPrecioOferta" id="txtPrecioOferta" readonly="readonly" class="form-control" style="width: 75%; " />
                 		</div>
                 		</div>
                 		
                   		<label>
                   			<b>Selecione Imagen</b>
                   		</label>
                   		<div class="form-group">
                   			<input type="file" name="imagen" id="imagen" class="form-control" style="width: 75%;" />
                   			<div id="ErrorImagen" style="display:none; color: red"><span> Campo requerido </span></div>	
						</div>           	
         		
         			</div>
      
         			
         			<!-- div col-6 -->
         		<!--</div>-->
         	
          		<!--<div class="row">-->
          			
         			<div class="col-lg-12" align="right">
         				<hr />
         	 			<input type="submit" id="btnCancelar" name="btnCancelar" class="btn btn-warning" value="Cancelar" />
         	 			&nbsp;
         	 			&nbsp;

         	 			<input type="submit" id="btnGuardar" name="btnGuardar" class="btn btn-theme" value="Guardar" />
 					</div>        	 	
         	 	
        		<!--</div>-->
         	</div>
         	
        	</form>
        	
    	</div>
		
     </div>

	
<?php

require_once 'plan_footer.php';
?>
<script src="assets/js/bootstrap-switch.js"></script>

<script src="AppScript/NuevoPoducto.js" type="text/javascript"></script>