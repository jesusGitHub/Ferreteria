<?php
require_once 'recursos/conexion.php';
require_once 'plan_header.php';
require_once 'plan_sidebar.php';
?>

<?php

    $sql ="SELECT * FROM tbl_usuario ORDER BY Imagen DESC ";
	$queriresult=mysqli_query($idconexion,$sql);
	$cant_imagen=mysqli_num_rows($queriresult);
	
	if(isset($_SESSION['nombre'])){
		//echo "hola mundo session arriba";
		//echo $_SESSION["nombre"];
		
	}else{
		//echo "no hay session activa";
	}

		
?>

	
	<h3><i class="fa fa-angle-right"></i> Listado de usuario </h3>
	<hr />








<?php

require_once 'plan_footer.php';;
?>