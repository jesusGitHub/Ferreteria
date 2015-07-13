<?php
require_once 'plan_header.php';
require_once 'plan_sidebar.php';


require_once 'recursos/conexion.php';
$idconexion=ConectarServidor();

require_once 'ActualizarUsuario.php';
?>



 <?php
 if(isset($_GET['code'])){
 	
		$code=$_GET['code'];
 
 
 		if(isset($_POST['btnRealizarCambio'])){
 		
			$nuevo_nombre=$_POST['txtNuevoNombre'];
		if($nuevo_nombre=="" || $nuevo_nombre==NULL){	
			$nuevo_nombre=$_POST['txtNombre'];
			}
		
			$nuevo_apellido=$_POST['txtNuevoApellido'];
		if($nuevo_apellido=="" || $nuevo_apellido==NULL){
			$nuevo_apellido=$_POST['txtApellido'];
			}
		
			$nueva_cedula=$_POST['txtNuevaCedula'];
		if($nueva_cedula=="" ||$nueva_cedula==NULL){
			$nueva_cedula=$_POST['txtCedula'];
			}
		
			$nuevo_usuario=$_POST['txtNuevoUsuario'];
		if($nuevo_usuario=="" || $nuevo_usuario==NULL){
			$nuevo_usuario=$_POST['txtUsuario'];
			}
		
			$nuevo_password=$_POST['txtNuevoPassword'];
		if($nuevo_password!=""){
			$nuevo_password=md5($nuevo_password);
			}else{
				$nuevo_password=$_POST['txtPassword'];
			}
			
			$nueva_direccion=$_POST['txtNuevaDireccion'];
		if($nueva_direccion=="" || $nueva_direccion==NULL){
			$nueva_direccion=$_POST['txtDireccion'];
			}
		
			$nuevo_telefono=$_POST['txtNuevoTelefono'];
		if($nuevo_telefono=="" || $nuevo_telefono==NULL){
				
				$nuevo_telefono=$_POST['txtTelefono'];
			}
		
		echo $nuevo_telefono;
		$respuesta_update=ModificaUsuario($code,$nuevo_nombre,$nuevo_apellido,$nueva_cedula,$nuevo_usuario,$nuevo_password,$nueva_direccion,$nuevo_telefono);		
	
	
		if($respuesta_update==TRUE){
			
			echo "los datos se insertaron correcatamente";
		}
	}
	
 
 	
			
		if($code!="" && $code!= NULL){
			
			$sql="SELECT * FROM tbl_usuario WHERE UsuarioID='$code'";
			$usuario_select_result=mysqli_query($idconexion,$sql) or die ("error al seleccionar los"
			."los datos".mysqli_error($idconexion));
			
			$datos_usuario=mysqli_fetch_array($usuario_select_result);
			
			$idcategoria=$datos_usuario['TipoUsuID'];
			
			if($idcategoria!=""){
				
				$sql="SELECT * FROM categoria WHERE Categoriaid='$idcategoria'";
				$categoria_result=mysqli_query($idconexion,$sql) or die ("error al selecionar"
				."la categoria del paciente".mysqli_error($idconexion));
				
				$datos_categoria=mysqli_fetch_array($categoria_result);	
				
			}
			
						
		}

	}
	


 ?>
			

					<h3><i class="fa fa-angle-right style="padding-left: 10%; padding-top: 10%"">
					
							</i> Modificando Usuario </h3>
							
					<div id="operacion-exitosa">		
						<div class="alert alert-success">La Operacion Se realizo Con exito...</div>
          			</div>
     
     				<div style="color: red;">hola mundo dede mi clase </div>
      <div class="row mt" style="padding-left: 5%;" align="center">
         <div class="col-lg-12">
          	<div class="col-lg-10">
          		<form method="post" id="frmActualizar">	
          			<div class="form-panel">
          				
          				
                  	  <h4 class="mb"><i class="fa"></i> Datos Usuario <?php echo "<b>$datos_usuario[Nombre]</b>"; ?> </h4>
                  	  
                          <div class="row mt" align="center">                            
                              <div class="col-sm-5 form-group" align="center">
                                  <input readonly="readonly" value="<?php echo $datos_usuario['Nombre'] ?>"  type="text"
                                   name="txtNombre"   class="form-control" style="width:75%"/>
                                 
                              </div>
                              <div class="col-sm-2 text-center" style="padding: 1%">
                                  <p><b>Nuevo Nommbre</b></p>
                              </div>
                              <div class="col-sm-5 form-group" align="center">
                                  <input type="text" name="txtNuevoNombre" class="form-control"  style="width:75%"  />
                              </div>
                          </div>
                          
                          <div class="row mt" align="center">                            
                              <div class="col-sm-5 form-group" align="center">
                                  <input readonly="readonly" type="text"  value="<?php echo $datos_usuario['Apellido'];?>"
                                   name="txtApellido" class="form-control"  style="width:75%"  />
                              </div>
                              <div class="col-sm-2 text-center" style="padding: 1%">
                                  <p><b>Nuevo Apellido</b></p>
                              </div>
                              <div class="col-sm-5 form-group" align="center">
                                  <input type="text" name="txtNuevoApellido" class="form-control"  style="width:75%"  />
                              </div>
                          </div>
                          
                          <div class="row mt" align="center">                            
                              <div class="col-sm-5 form-group" align="center">
                                  <input readonly="readonly" type="text"  value="<?php echo $datos_usuario['Cedula']; ?>"
                                   name="txtCedula" class="form-control"  style="width:75%"  />
                              </div>
                              <div class="col-sm-2 text-center" style="padding: 1%">
                                  <p><b>Nueva Cedula</b></p>
                              </div>
                              <div class="col-sm-5 form-group" align="center">
                                  <input type="text" name="txtNuevaCedula" class="form-control"  style="width:75%"  />
                              </div>
                          </div>
                          <div class="row mt" align="center">                            
                              <div class="col-sm-5 form-group" align="center">
                                  <input readonly="readonly"  value="<?php echo $datos_usuario['Usuario']; ?>" 
                                  type="text" name="txtUsuario" class="form-control"  style="width:75%"  />
                              </div>
                              <div class="col-sm-2 text-center" style="padding: 1%">
                                  <p><b>Nuevo Usuario</b></p>
                              </div>
                              <div class="col-sm-5 form-group" align="center">
                                  <input type="text" name="txtNuevoUsuario" class="form-control"
                                   style="width:75%"  />
                              </div>
                          </div>
                          <div class="row mt" align="center">                            
                              <div class="col-sm-5 form-group" align="center">
                                  <input readonly="readonly"  value="<?php echo $datos_usuario['Password']; ?>" 
                                  type="text" name="txtPassword" class="form-control"  style="width:75%"  />
                              </div>
                              <div class="col-sm-2 text-center" style="padding: 1%">
                                  <p><b>Nueva contrase&#241;a</b></p>
                              </div>
                              <div class="col-sm-5 form-group" align="center">
                                  <input type="text" name="txtNuevoPassword" class="form-control"  style="width:75%"  />
                              </div>
                          </div>
                          <div class="row mt" align="center">                            
                              <div class="col-sm-5 form-group" align="center">
                                  <input readonly="readonly"  value="<?php echo $datos_usuario['Direccion']; ?>" 
                                  type="text" name="txtDireccion" class="form-control"  style="width:75%"  />
                              </div>
                              <div class="col-sm-2 text-center" style="padding: 1%">
                                  <p><b>Nueva Direccion</b></p>
                              </div>
                              <div class="col-sm-5 form-group" align="center">
                                  <input type="text" name="txtNuevaDireccion" class="form-control"  style="width:75%"  />
                              </div>
                          </div>
                          <div class="row mt" align="center">                            
                              <div class="col-sm-5 form-group" align="center">
                                  <input readonly="readonly" value="<?php echo $datos_usuario['Telefono']; ?>" 
                                  type="text" name="txtTelefono" class="form-control"  style="width:75%"  />
                              </div>
                              <div class="col-sm-2 text-center" style="padding: 1%">
                                  <p><b>Nuevo Telefono</b></p>
                              </div>
                              <div class="col-sm-5 form-group" align="center">
                                  <input type="text" name="txtNuevoTelefono" id="txtNuevoTelefono" class="form-control"  style="width:75%"  />
                              </div>
                          </div>
                          <div class="row mt" align="center">                            
                              <div class="col-sm-5 form-group" align="center">
                                  <input readonly="readonly" id="txtCategoria" value="<?php echo $datos_categoria['Categoria']; ?>" 
                                  type="text" name="txtCategoria"  class="form-control"  style="width:75%"  />
                              </div>
                              <div class="col-sm-2 text-center" style="padding: 1%">
                                  <p><b>Nuevo Cargo</b></p>
                              </div>
                              <div class="col-sm-5 form-group" align="center">
                                  <input type="text" name="txtNuevaCategoria" class="form-control"  style="width:75%"  />
                              </div>
                          </div>
                          
                          <hr />
                          <div class="row mt">
                          	<div class="col-lg-12" align="right">
                          		<input type="submit" name="btnCancelar" id="btnCancelar" value="Cancelar"
                          		class="btn btn-danger" />
                          		
                          		<input type="submit" name="btnRealizarCambio" id="btnRealizarCambio" value="Realizar"
                          		class="btn btn-theme" />                    		          		
                          	</div>
                          </div>
                         
                         
                         
                       </div>
                      </form>
                    </div>
                 </div>
             </div>
                          
      

<?php
require_once 'plan_footer.php';

?>