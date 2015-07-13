<?php

require_once'recursos/conexion.php';
//if (!isset($_SESSION['activa'])) {
	
	
//}




//si no hay  salida previa al navegador no debe haber espacio antes de php, mi print 
//ni echo antes de esta funcion de redireccionar

include_once'recursos/conexion.php';
$conectar=ConectarServidor();
$recurso=seleccionaBD("dblibreria",$conectar);


//session_start();

//$_SESSION['activa']="TRUE";



//validando formulario

if (isset($_POST["guardar"])) {

//Obtencion de datos
$id_titulo = $_POST['id_titulo'];
$titulo = $_POST['titulo'];
$tipo   = $_POST['tipo'];
$id_pub = $_POST['id_publicador'];
$precio = $_POST['precio'];
$notas  = $_POST['notas'];
$fecha  = $_POST['fecha_pub'];

//uso de la funcion mode_uploade_file y la funcion is_uploade_file


/* procesando archivo de imagen */
//print_r($_FILES);

//obtengo la imagen subida
$archivo=$_FILES['imagen']['tmp_name'];

if (is_uploaded_file($archivo)) {
		
	$tipa= $_FILES['imagen']['type'];
	
	if($tipa == 'image/jpeg' || $tipa == 'image/jpg' || $tipa == 'image/png' || $tipa == 'image/gif' || $tipa == 'image/x-icon'){
	    //declarando variable vandera para controlar la ejecucion de consultas
		$bandera=TRUE;
		//generando un nuevo nombre
		
		$nuevo_nombre="libro_".time();
		
		$nombre_original = $_FILES['imagen']['name'];
		
		$info= pathinfo($nombre_original);
		
		$extencion= $info['extension'];
		
		$nuevo_nombre.=".$extencion";//contateno la estencion con el nuevo nombre
		
		//echo "archivo subido con exito nuevo nombre $nuevo_nombre<br>";
		
		//si no existe la carpeta la creamos
		
		$ruta="imagenes/libros";

		if (!is_dir($ruta)) {
			
			mkdir($ruta,0777);
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
	


//BUSCAR LO FQUE ES ARRAY INTERSET
$sql = "INSERT INTO titulos
        (id_titulo,titulo,tipo,id_pub,precio,notas,fecha_pub,imagen)
        VALUES('$id_titulo','$titulo','$tipo','$id_pub','$precio','$notas','$fecha','$nuevo_nombre')";
		
mysql_query($sql)or die("Error en la consulta".mysql_error());

//si llego hasta aqui se inserto un nuevo libro mysql_insert_id


//header("location:verlibro.php?token=$id_titulo"); 
         
}
//  La funcion border:radios = 7xp en css logra que el formulario tome estilo redondo
	
}//FIN DEL IF QUE EVALUA LA BARIABLE BANDERA



include_once 'admin/privada.php';





require 'plan_header.php';
include 'recursos/formulario_libro.php';





$_SESSION['entrar']="activado";


?>	
	
<h1>Creando nuevo libro</h1>			
			

<?php

 
include'plan_sidebar.php';
include 'plan_footer.php';
?>