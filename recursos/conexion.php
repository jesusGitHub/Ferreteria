
<?php

	function ConectarServidor($localhost="localhost",$usuario="root",$pass="",$dbname="bdmuebleria")
	{
		
		$idconexion=mysqli_connect($localhost,$usuario,$pass) or die("error al "
		."intentar conectar con el servidor".mysqli_error());
		
		mysqli_select_db($idconexion,$dbname) or die ("error al intentar conectar"
		."con la base de datos".mysqli_error($idconexion));	
	
		return $idconexion;
	}
	
	function limpiar_variable($valor){
		$conexion=ConectarServidor();
		
		$valor=mysqli_real_escape_string($conexion,$valor);
		$valor=trim($valor);
		
		
		return $valor;
		
		
		
	}

	
?>