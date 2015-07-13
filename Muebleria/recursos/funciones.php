<?php


	//echo "<script>alert('si existedes la funcion')</script>";
	//fucncion que verifica los usuarios los privilegios
	function verifica_usuario(){
				
		if(isset($_SESSION['tipoid'])){
			
			require_once 'recursos/conexion.php';
			$idconexion=ConectarServidor();
			
			$tipoid=$_SESSION['tipoid'];
			$sql="SELECT * FROM tbl_tipousuario WHERE TipoID='$tipoid'";
			$query_tipo_select=mysqli_query($idconexion,$sql) or die ("Error al seleccionar"
			."tipo de usuario".mysqli_error($idconexion));
			
			$dato_tipo=mysqli_fetch_array($query_tipo_select);
			$tipo_usuario=$dato_tipo['Nombre'];
			
				if($tipo_usuario=="Administraccion"){
							
					$privilegio=2;
				
				}else{
					
					$privilegio=1;
				}
				return $privilegio;	
		}
		
		mysqli_close($idconexion);
		
	}
	

	//fucnion que elimina la mercancia..
	function elimina_producto($code){
		
		require_once 'recursos/conexion.php';
		$idconexion=ConectarServidor();
				
		$productoid=$code;
		$sql="DELETE FROM tbl_producto WHERE ProductoID='$productoid'";
		$query_dele_producto=mysqli_query($idconexion,$sql) or die ("Error al eliminar"
		."produto".mysqli_error($idconexion));
		
		$sql="DELETE FROM tbl_imagen WHERE ProductoID='$productoid'";
		$query_dele_imagen=mysqli_query($idconexion,$sql) or die ("Error al eliminar"
		."imagen".mysqli_error($idconexion));
		
		if($query_dele_producto==TRUE && $query_dele_imagen==TRUE){
			
			$producto_eliminado=TRUE;
		}else{
			
			$producto_eliminado=FALSE;
			
			}
		return $producto_eliminado;	
		
		mysqli_close($idconexion);
	}
	
	
	function busqueda_producto($parametro){
		
		require_once 'recursos/conexion.php';
		$idconexion=ConectarServidor();
		
		$parametro_busqueda=$parametro;
			
			//verificando si el parametro de busca solisitado es numero o caracter
			if(is_numeric($parametro_busqueda)){
				$precio_inicial=0;
				$precio_final=0;
				$precio_inicial=$parametro_busqueda - 1500;
				$precio_final = $parametro_busqueda +1500;
				
				$sql="SELECT * FROM tbl_producto WHERE Precio BETWEEN $precio_inicial AND $precio_final";
				$queri_result_producto=mysqli_query($idconexion,$sql) or die ("Error al seleccionar por"
				." el precio".mysqli_error($idconexion));
				if(mysqli_num_rows($queri_result_producto)==0){
					$cadenavacia=TRUE;
				}	
				
			}else{
				
				$sql="SELECT * FROM tbl_producto WHERE Nombre LIKE '%$parametro_busqueda%'";
				$queri_result_producto=mysqli_query($idconexion,$sql) or die ("Error al selecciona"
				."los productos por el nombre".mysqli_error($idconexion));
				if(mysqli_num_rows($queri_result_producto)==0){
					$cadenavacia=TRUE;
				}
				
			}
		
		return $queri_result_producto;
		
		
		mysqli_close($idconexion);
		
	}

	
	function ModificaUsuario($idusuario="",$nombre="",$apellido="",$cedula="",$usuario="",$pass="",$direccion="",$telefono="829360")
		{
			
			require_once 'recursos/conexion.php';
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
		
		mysqli_close($idconexion);
		
	}

?>