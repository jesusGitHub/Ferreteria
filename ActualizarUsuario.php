<?php
require_once 'recursos/conexion.php';
$idconexion=ConectarServidor();	

?>

<?php	


	function ModificaUsuario($idusuario="",$nombre="",$apellido="",$cedula="",$usuario="",$pass="",$direccion="",$telefono="829360")
	{
		
		$idconexion=ConectarServidor();		
		//$respuesta="";
		
		if($idusuario !="" || $idusuario!= NULL){
			
			
			$sql="UPDATE tbl_usuario SET Nombre='$nombre', Apellido='$apellido', Cedula='$cedula', "
			."Usuario='$usuario', Password='$pass', Direccion='$direccion',Telefono='$telefono'"
			." WHERE UsuarioID='$idusuario'";
			$result_update_usu=mysqli_query($idconexion,$sql) or die ("Error al intentar actualizar"
			."el usuario".mysqli_error($idconexion));
			
			
			if($result_update_usu==TRUE){
				
				return TRUE;
			}else{
				
				return FALSE;
			}
			
	
		}
		
	}

	
	


?>