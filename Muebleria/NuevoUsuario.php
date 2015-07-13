<?php
require_once 'plan_header.php';
//require_once 'plan_sidebar.php';
require_once 'recursos/conexion.php';


$idconexion =ConectarServidor();

?>


	<?php
			
		if(isset($_POST['btnAceptar'])){
		
			if(isset($_SESSION['usuarioid'])){
				
				$tipoid=$_SESSION['tipoid'];
				
				$sql="SELECT * FROM tbl_tipousuario WHERE TipoID='$tipoid'";
				$query_tipo_result=mysqli_query($idconexion,$sql) or die("error al seleccionar"
				."el tipo de usuario".mysqli_error($idconexion));
				
				$datos_tipo_result=mysqli_fetch_array($query_tipo_result);
				$tipo_usuario=$datos_tipo_result['Nombre'];
				
				
				if($tipo_usuario=="Administraccion"){
						
			//prueva de la etiqueta select con 
			$cargo =$_POST['DDlTipo'];	 
			$usuario=$_POST['txtUsuario'];
			$pass1=$_POST['txtPassword'];
			$pass2=$_POST['txtPassword2'];
			$nombre=$_POST['txtNombre'];
			$apellido=$_POST['txtApellido'];
			$cedula=$_POST['txtCedula'];
			$direccion=$_POST['txtDireccion'];
			$telefono=$_POST['txtTelefono'];
			$tipousuario=$_POST['DDlTipo'];
			
			$tipousuario=limpiar_variable($tipousuario); 
			$usuario=limpiar_variable($usuario);
			$pass1=limpiar_variable($pass1);
			$pass2=limpiar_variable($pass2);
			$nombre=limpiar_variable($nombre);
			$apellido=limpiar_variable($apellido);
			$cedula=limpiar_variable($cedula);
			$direccion=limpiar_variable($direccion);
			$telefono=limpiar_variable($telefono);
			
			$pass1=md5($pass1);
			$pass2=md5($pass2);
			

			 if($usuario !="" && $pass1 !="" && $pass2!=""){
					
				if($pass1 == $pass2){
					$error_password=0;
					
					$sql="SELECT * FROM tbl_usuario WHERE Usuario='$usuario'";				
					$queryresult=mysqli_query($idconexion,$sql) or die ("error al seleccionar"
					."el usuario que se registrando");
					
					$sql ="SELECT * FROM tbl_tipousuario WHERE Nombre='$tipousuario'";
					$querytiporesult=mysqli_query($idconexion,$sql) or die ("error al seleccionar"
					."el tipo de usuario".mysqli_error($idconexion));
					$tiporesult=mysqli_fetch_array($querytiporesult);
					$tipousuario=$tiporesult['TipoID'];
				
					if(mysqli_num_rows($queryresult)>0){
						
						$error_usuario_existe=1;
							
												
					}else{

						$sql="INSERT INTO tbl_usuario (`Nombre`, `Apellido`, `Cedula`, `Usuario`,"
						."`Password`, `Direccion`, `Telefono`, `TipoUsuID`) VALUES ('$nombre', "
						."'$apellido', '$cedula', '$usuario', '$pass1', '$direccion', '$telefono',"
						." '$tipousuario')";
						
						$queryinsert=mysqli_query($idconexion,$sql) or die("error al insertar el usuario"
						.mysqli_error($idconexion));
						
						
						if($queryinsert == TRUE){
							
							$exito_insertar_usuario=1;

						}else{
								
							$exito_insertar_usuario=0;	
							
						}
					}
					
						
				}//verificando que los dos password consistan
				else{
					$error_password=1;
				}
				
			 }//operrador verificador de los detos usuarios
			else{

				$error_datos_vacio=1;
			
			}

		}else{
		
			echo "<script>alert('usted no esta autorizado para acer esta operacion')</script>";		
			
		}
		
		}//fin del if para verificar si hay session iniciada
	}//final del if del boton
		
	
	?>

	<!-- epieza el codigo html -->
	
	<br />
	<br />
	<br />
	
	
	<div class="row" align="center">
		<div class="col-lg-12">
			<h3 class="fa fa-angle-right"> Crear cuenta de usuario  </h3>
		</div><!-- coo-lg-12 -->
	</div><!-- clas-row-->
	
	<!-- trabajando con los mensajes de alertas-->
	<?php
		if(isset($exito_insertar_usuario)){
			if($exito_insertar_usuario==1){
				
			echo "<div id='OperacionExitosa' class='col-lg-12' 
				 style='padding-left:10%;padding-right:10%' align='center'>";
			echo "<div class='alert alert-success alert-dismissable'>";
			echo "<button type='button' class='close' 
				 data-dismiss='alert' aria-hidden='true'>&times;</button>";
			echo "<b>La Operacion Se Realizo Con Exito....</b>";
			echo "</div>";				
      		echo "</div>";
			}	
		}
		
		if(isset($error_password)){
			if($error_password==1){
				
			echo "<div id='error' class='col-lg-12' 
				 style='padding-left:10%;padding-right:10%' align='center'>";
			echo "<div class='alert alert-warning alert-dismissable'>";
			echo "<button type='button' class='close' 
				 data-dismiss='alert' aria-hidden='true'>&times;</button>";
			echo "<b>Las contrase&#241; no coinciden....</b>";
			echo "</div>";				
      		echo "</div>";
			}	
		}
		
		
		if(isset($error_usuario_existe)){
			if($error_usuario_existe==1){
				
			echo "<div id='error_usuario_existe' class='col-lg-12' style='padding-left:10%;padding-right:10%' align='center'>";
			echo "<div class='alert alert-danger alert-dismissable'>";
			echo "<button type='button' class='close' 
				 data-dismiss='alert' aria-hidden='true'>&times;</button>";
			echo "<b>Ocurrio un preblema, este usuario ya existe....</b>";
			echo "</div>";				
      		echo "</div>";
			}	
		}
	
	?>
	<!--fin trabajando con los mensajes de alertas-->
	<div class="content-body">
		<div class="row mt">
          	<div class="col-lg-12">
                 <div class="form-panel">
                  	 <form class="form-horizontal style-form" method="post" action="">           
                  
                  		<h4 class="mb"><i class="fa fa-angle-right">
                  			</i><b> Datos de la cuenta </b></h4>
                  	 
                  	 
                  	 	<div class="col-lg-6">		
                  	      <div class="col-sm-12 form-group">
                              <label style="text-align: right"  class="col-sm-4 control-label">Usuario</label>
                              <div class="col-sm-8" align="left">
                                  <input type="text" name="txtUsuario" id="txtUsuario"  class="form-control" placeholder="" style="width: 100%">
                              	  <div id="ErrorUsuario" style="display:none; color: red"><span> Campo requerido </span></div>	
                              </div>
                          </div> 
                          
                          <div class="col-sm-12 form-group">
                              <label style="text-align: right"  class="col-sm-4 control-label">Puesto</label>
                              <div class="col-sm-8" align="left">
                                 <select align="left" name="DDlTipo" id="DDlTipo" title="Area" class="btn btn-default" style="width: 100%">
                              		<option value="" disabled="disabled" selected="selected">- Seleccine -</option>	
                              		<!--<option value="Administraccion">Administraccion</option>
                              		<option value="gerencia">Gerencia</option>-->
                              	</select>
                              	<div id="ErrorCategoria" style="display:none; color: red"><span> Campo requerido </span></div>
                              </div>
                          </div> 
                         </div><!--col-lg-6-->
                         
                         <div class="col-lg-6"> 
                          <div class="col-sm-12 form-group">
                              <label style="text-align: right" class="col-sm-4 col-sm-4 control-label">Clave</label>
                              <div class="col-sm-8">
                                  <input type="password" name="txtPassword" id="txtpassword"  class="form-control" placeholder="" style="width: 100%">
                              	  <div id="ErrorPass" style="display:none; color: red"><span> Campo requerido </span></div>	
                              </div>
                          </div> 
                          
                          <div class="col-sm-12 form-group">
                              <label style="text-align: left" class="col-sm-4 col-sm-4 control-label">Repita la clave</label>
                              <div class="col-sm-8">
                                  <input align="right" type="password" name="txtPassword2" id="txtPassword2"  class="form-control" placeholder="" style="width: 100%">
                              	  <div id="ErrorPass2" style="display:none; color: red"><span> Campo requerido </span></div>	
                              </div>
                          </div> 
                  	  </div>
                  	 	
                  	  <h4 class="mb" style="padding-top: 20%"><i class="fa fa-angle-right"></i><b> Datos de la personales</b> </h4>
                     
                     <div class="col-lg-6">
                      	  <div class="col-sm-12 form-group">
                              <label style="text-align: right" class="col-sm-4 control-label">Nombre</label>
                              <div class="col-sm-8">
                                  <input type="text" name="txtNombre" id="txtNombre" class="form-control" placeholder="" style="width: 100%">
                              	  <div id="ErrorNombre" style="display:none; color: red"><span> Campo requerido </span></div>
                              </div>
                          </div>   	  
                      	  <div class="col-sm-12 form-group">
                              <label style="text-align: right" class="col-sm-4 col-sm-4 control-label">Apellido</label>
                              <div class="col-sm-8">
                                  <input type="text" name="txtApellido" id="txtApellido"  class="form-control" placeholder="" style="width: 100%">
                              	  <div id="ErrorApellido" style="display:none; color: red"><span> Campo requerido </span></div>
                              </div>
                          </div> 
                          <div class="col-sm-12 form-group">
                              <label style="text-align: right" class="col-sm-4 col-sm-4 control-label">Cedula</label>
                              <div class="col-sm-8">
                                  <input type="text" name="txtCedula" id="txtCedula"  class="form-control" placeholder="" style="width: 100%">
                              	  <div id="ErrorCedula" style="display:none; color: red"><span> Campo requerido </span></div>	
                              </div>
                          </div>   
                          </div>
                            <div class="col-lg-6">  	                        	                                                    	  
                      	  <div class="col-sm-12 form-group">
                              <label style="text-align: right" class="col-sm-4 col-sm-4 control-label">Direccion</label>
                              <div class="col-sm-8">
                                  <input type="text" name="txtDireccion" id="txtDireccion" class="form-control" placeholder="" style="width: 100%">
                              </div>
                          </div>
                          <div class="col-sm-12 form-group">
                              <label style="text-align: right" class="col-sm-4 col-sm-4 control-label">Telefono</label>
                              <div class="col-sm-8">
                                  <input type="text" name="txtTelefono" id="txtTelefono"  class="form-control" placeholder="" style="width: 100%">
                              </div>
                          </div>  
                          </div>

                         <div class="form-group">

                              <div class="col-sm-10" align="right">
                              	<p>pulse aceptar al terminar de llenar el formulario para crear la cuenta</p>
                                  <input type="submit" id="btnAceptar" value="aceptar" name="btnAceptar"  class="btn btn-theme">
                              </div>
                          </div>  
				
                		</div>
                    </form>
          		</div><!-- col-lg-12-->      	
          	</div><!-- /row -->
        </div><!--div estylo -->

<?php
/*

<div class="row mt" style="padding-left: 10%; padding-right: 10%">
 		<form class="form-horizontal style-form" method="get">
 	
                  <div class="form-panel">
                  	  <h4 class="mb"><i class="fa fa-angle-right"></i> Datos personales</h4>
                      
                      
                      
                      	<div class="col-sm-6">
        				 <div class="form-group">
                              <label class="col-sm-1 control-label">Nombre</label>
                              <div class="col-sm-4" align="left">
                                  <input type="text" class="form-control">
                              </div>
                          </div>
                           <div class="form-group">
                              <label class="col-sm-1 control-label">Apellido</label>
                              <div class="col-sm-4" align="left">
                                  <input type="text" class="form-control">
                              </div>
                          </div>
                          </div>
                          
                      	<div class="col-sm-6">
        				 <div class="form-group">
                              <label class="col-sm-1 control-label">Nombre</label>
                              <div class="col-sm-4" align="left">
                                  <input type="text" class="form-control">
                              </div>
                          </div>
                           <div class="form-group">
                              <label class="col-sm-1 control-label">Apellido</label>
                              <div class="col-sm-4" align="left">
                                  <input type="text" class="form-control">
                              </div>
                          </div>
                          </div>
                          
                        

                    </div><!--classs panel -->*/

?>









<?php
	require_once 'plan_footer.php';

?>
<script src="assets/js/bootstrap-switch.js"></script>

<script src="AppScript/NuevoUsuario.js" type="text/javascript"></script>
