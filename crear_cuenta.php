<?php
require_once 'plan_header.php';
//require_once 'plan_sidebar.php';
require_once 'recursos/conexion.php';
$idconexion =ConectarServidor();

?>


	<?php
			
		if(isset($_POST['btnAceptar'])){
			
			//prueva de la etiqueta select con 
			/*$cargo =$_POST['sltCargo'];
			 if ($cargo== "Adinistraccion" ){
			echo "<script>alert('hola mundo')</script>";
			 }*/
			 
			$usuario=$_POST['txtUsuario'];
			$pass1=$_POST['txtPassword'];
			$pass2=$_POST['Password2'];
			$nombre=$_POST['txtNombre'];
			$apellido=$_POST['txtApellido'];
			$cedula=$_POST['txtCedula'];
			$direccion=$_POST['txtDireccion'];
			$telefono=$_POST['txtTelefono'];
			$tipousuario=$_POST['sltCargo'];
			
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
			 	echo "<script>alert('tienen valor');</script>";
				if($pass1 == $pass2){
					
					$sql="SELECT * FROM tbl_usuario WHERE Usuario='$usuario'";				
					$queryresult=mysqli_query($idconexion,$sql) or die ("error al seleccionar"
					."el usuario que se registrando");
					
					$sql ="SELECT * FROM tbl_tipousuario WHERE Nombre='$tipousuario'";
					$querytiporesult=mysqli_query($idconexion,$sql) or die ("error al seleccionar"
					."el tipo de usuario".mysqli_error($idconexion));
					$tiporesult=mysqli_fetch_array($querytiporesult);
					$tipousuario=$tiporesult['TipoID'];
				
					if(mysqli_num_rows($queryresult)>0){
						echo "este usuario ya existe";
						echo "<script>alert('es mayor k cero');</script>";
						
					}else{

						$sql="INSERT INTO tbl_usuario (`Nombre`, `Apellido`, `Cedula`, `Usuario`,"
						."`Password`, `Direccion`, `Telefono`, `TipoUsuID`) VALUES ('$nombre', "
						."'$apellido', '$cedula', '$usuario', '$pass1', '$direccion', '$telefono',"
						." '$tipousuario')";
						
						$queryinsert=mysqli_query($idconexion,$sql) or die("error al insertar el usuario".mysqli_error($idconexion));
						
						if($queryinsert == TRUE){
							echo "datos insertados correctamente";
							echo "<script>alert('insetados');</script>";
						}else{
							echo "<script>alert('problema ocurrido');</script>";
							echo "ocurrio un error al insertar los datos";
						}
					}
					
						
				}//verificando que los dos password consistan
				else{
					echo "los password no coinciden";
				}
				
			 }//operrador verificador de los detos usuarios
			else{

				echo "<script>alert('no pueden aver datos vacios');</script>";
			
			}
			 
			 /*echo $usuario."<br>";
			echo $pass1."<br>";
			echo $pass2."<br>";
			echo $nombre."<br>";
			echo $apellido."<br>";
			echo $cedula."<br>";
			echo $direccion."<br>";
			echo $telefono."<br>";
			*/
		}
		
		
	
	
	
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
	
	
	
	
	<div class="row mt" style="text-align:center; padding-left: 20%; padding-right: 20%;"
	."padding-top: 0%;padding-bottom: 5%">
	
	   
		
          		<div class="col-lg-12">
          			
                  <div class="form-panel">
                  	 <form class="form-horizontal style-form" method="post" action="">
                  	  	<h4 class="mb"><i class="fa fa-angle-right"></i> Datos de la cuenta </h4>
                  	 		
                  	 			
                  	      <div class="form-group">
                              <label style="text-align: right"  class="col-sm-2 control-label">Usuario</label>
                              <div class="col-sm-10" align="left">
                                  <input type="text" name="txtUsuario" id="txtUsuario"  class="form-control" placeholder="Usuario" style="width: 30%">
                              </div>
                          </div> 
                          
                          <div class="form-group">
                              <label style="text-align: right"  class="col-sm-2 control-label">Puesto</label>
                              <div class="col-sm-10" align="left">
                                 <select align="left" name="sltCargo" title="Area" class="btn btn-default" style="width: 30%">
                              		<option value="Administraccion">Administraccion</option>
                              		<option value="gerencia">Gerencia</option>
                              	</select>
                              </div>
                          </div> 
                          
                          <div class="form-group">
                              <label style="text-align: right" class="col-sm-2 col-sm-2 control-label">Clave</label>
                              <div class="col-sm-10">
                                  <input type="password" name="txtPassword" id="txtpassword"  class="form-control" placeholder="password" style="width: 30%">
                              </div>
                          </div> 
                          
                          <div class="form-group">
                              <label style="text-align: right" class="col-sm-2 col-sm-2 control-label">Repita la clave</label>
                              <div class="col-sm-10">
                                  <input type="password" name="Password2" id="Password2"  class="form-control" placeholder="placeholder" style="width: 30%">
                              </div>
                          </div> 
                  	  
                  	  <h4 class="mb"><i class="fa fa-angle-right"></i> Datos de la personales </h4>
                     
                      	  <div class="form-group">
                              <label style="text-align: right" class="col-sm-2 col-sm-2 control-label">Nombre</label>
                              <div class="col-sm-10">
                                  <input type="text" name="txtNombre" id="txtNombre" class="form-control" placeholder="Nombre" style="width: 30%">
                              </div>
                          </div> 
                          
                             	  
                      	  <div class="form-group">
                              <label style="text-align: right" class="col-sm-2 col-sm-2 control-label">Apellido</label>
                              <div class="col-sm-10">
                                  <input type="text" name="txtApellido" id="txtApellido"  class="form-control" placeholder="Apellido" style="width: 30%">
                              </div>
                          </div>  
                          
                             	  
                      	  <div class="form-group">
                              <label style="text-align: right" class="col-sm-2 col-sm-2 control-label">Cedula</label>
                              <div class="col-sm-10">
                                  <input type="text" name="txtCedula" id="txtCedula"  class="form-control" placeholder="Cedula" style="width: 30%">
                              </div>
                          </div>  
                          
                             	  
                      	  <div class="form-group">
                              <label style="text-align: right" class="col-sm-2 col-sm-2 control-label">Direccion</label>
                              <div class="col-sm-10">
                                  <input type="text" name="txtDireccion" id="txtDireccion" class="form-control" placeholder="Direccion" style="width: 30%">
                              </div>
                          </div>  
                          
                             	  
                      	  <div class="form-group">
                              <label style="text-align: right" class="col-sm-2 col-sm-2 control-label">Telefono</label>
                              <div class="col-sm-10">
                                  <input type="text" name="txtTelefono" id="txtTelefono"  class="form-control" placeholder="Telefono" style="width: 30%">
                              </div>
                          </div> 
                          
                         <div class="form-group">

                              <div class="col-sm-10" align="right">
                              	<p>pulse aceptar al terminar de llenar el formulario para crear la cuenta</p>
                                  <input value="aceptar" name="btnAceptar" type="submit" class="btn btn-theme" style=" width: 20%">
                              </div>
                          </div>  
				
               
                      </form>
                  </div>
          		</div><!-- col-lg-12-->      	
          	</div><!-- /row -->
	
	
	
	
	

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