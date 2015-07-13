<?php

require_once 'recursos/conexion.php';
require_once 'ModificarUsuario.php';
require_once 'plan_header.php';

$idconexion =ConectarServidor();
//require_once 'plan_sidebar.php';


echo "<br />";
echo "<br />";
echo "<br />";
	if(isset($_POST['btnEliminar'])){
		$estatus=0;
		
		$usuarioid=$_POST['btnEliminar'];
		$sql="UPDATE tbl_usuario SET Estatus=0 WHERE UsuarioID='$usuarioid'";
		$usu_reslult_update=mysqli_query($idconexion,$sql) or die ("Error al eliminar usuario"
		.mysqli_error($idconexion));
		
		if($usu_reslult_update==TRUE){
			
			echo "paciente eliminado con exito";
		}
			
	}
	if(isset($_POST['btnModificar'])){
	
		
	}

	
	


?>

				<!-- my modal para actualizar los usuarios-->

		            <label class="checkbox">
		                <span class="pull-right">
		                    <a data-toggle="modal" href="TableUsuario.php#myModal"> Forgot Password?</a>
		
		                </span>
		            </label>

			<div>		
				<div>
		          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
		              <div class="modal-dialog">
		                  <div class="modal-content">
		                      <div class="modal-header">
		                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		                          <h4 class="modal-title">Forgot Password ?</h4>
		                      </div>
		                      <div class="modal-body">
		                          <p>Enter your e-mail address below to reset your password.</p>
		                          <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">
		
		                      </div>
		                      <div class="modal-footer">
		                          <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
		                          <button class="btn btn-theme" type="button">Submit</button>
		                      </div>
		                  </div>
		              </div>
		          </div>
		        </div>
		    </div>  

		<!-- /fin my modal-->
			
			<h3 style="padding-left: 10%; padding-top: 5%"><i class="fa fa-angle-right"></i> Listado Usuario </h3>
	<hr />
		
      <!--main content start-->
      		
      	<div class="row" style="padding-left:10px;padding-right: 10px; padding-bottom: 50px; padding-top: 50px ">
        	<div class="col-lg-12">
        		
            	<div class="content-panel">
                	<table class="table table-striped table-advance table-hover">
                      <form method="post">	
                    	<thead>
                    		<th>Cod</th>
                          	<th>Nombre</th>
                          	<th>Apellido</th>
                          	<th>Cedula</th>
                          	<th>Usuario</th>
                          	<th>Contrase&#241;a</th>
                          	<th>Direccion</th>
                          	<th>Telefono</th>
                          	<th>Cargo</th>
                          	<th>Operacion</th>
                        </thead>
                        <tbody>
                          		
                          	<?php
                          		
                          				
								$estatus=1;
								$sql= "SELECT * FROM tbl_usuario WHERE Estatus='$estatus'";
	
								$result_usuario=mysqli_query($idconexion,$sql) or die ("error al seleccionar"
								."los usuarios".mysqli_error($idconexion));
									
								if(mysqli_num_rows($result_usuario)){
										
									while ($datos_usuario=mysqli_fetch_array($result_usuario)){
										$tipoid=$datos_usuario['TipoUsuID'];
											
										$query="SELECT * FROM tbl_tipousuario WHERE TipoID='$tipoid'";
										$result_tipo=mysqli_query($idconexion,$query) or die("error al"
										."seleccionar el tipo_usu".mysqli_error($idconexion));
										$datos_tipo=mysqli_fetch_array($result_tipo);
										
										echo "<tr>";
										echo "<td> $datos_usuario[UsuarioID]</td>";
										echo "<td> $datos_usuario[Nombre]</td>";
										echo "<td> $datos_usuario[Apellido]</td>";
										echo "<td> $datos_usuario[Cedula]</td>";
										echo "<td> $datos_usuario[Usuario]</td>";
										echo "<td> $datos_usuario[Password]</td>";
										echo "<td> $datos_usuario[Direccion]</td>";
										echo "<td> $datos_usuario[Telefono]</td>";
										echo "<td> $datos_tipo[Nombre]]</td>";
										echo "<td>
										<a data-toggle='modal' href='ListadoUsuario.php#myModal'>
										<button class='btn btn-primary btn-xs' type='submit' 
										name='btnModificar' value='$datos_usuario[UsuarioID]'>
										<i class='fa fa-pencil'></i></button></a>
                                      	<button class='btn btn-danger btn-xs' type='submit' 
										name='btnEliminar' value='$datos_usuario[UsuarioID]'>
										<i class='fa fa-trash-o'></i></button>
										</td>";
										echo "</tr>";
										
										
											
											
											
									}		
								}

                          	?>
	
                          		
                        </form>   		
                       </tbody>
					</table>
				</div>	
		  	</div><!--col12-->
		  </div><!--row-->
		
		
		
		






<?php

require_once 'plan_footer.php';

?>