<?php
require_once 'recursos/conexion.php';

 $idconexion = ConectarServidor();
 $resultado=true;
 $Message="";
 

if (isset($_POST['DDlCategoria']))
{
		
	$query = "SELECT * FROM  categoria";
	
	$resulQuery = mysqli_query($idconexion,$query);
	
	//$Message = "Error al seleccionar los datos ".mysqli_error($idconexion);
		
	 $jsonVectorCategoria = array();
		        
	 if (mysqli_num_rows($resulQuery)>0)
	 {
	 	  $resultado=true;
		  
			while ($campo = mysqli_fetch_array($resulQuery)) 
			{			
				$jsonVectorCategoria[] = array(
				    'id' => $campo['CategoriaID'],
				    'Nombre' => $campo['Categoria']
				);
			};			
	 }else { 
		 $resultado=false;
		 
	 }
	 
	 $results = array(
			      "resultadoSucces" => $resultado,
			      "Message" => $Message,
			      "data" =>  $jsonVectorCategoria
			);
	 
	 
 }

echo json_encode($results);

?>