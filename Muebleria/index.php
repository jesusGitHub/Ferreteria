<?php
//session_start();
require_once 'plan_header.php';
require_once 'plan_sidebar.php';
?>

<?php


	
	if(isset($_SESSION['nombre'])){
		echo "hola mundo session arriba";
		echo $_SESSION["nombre"];
		
	}else{
		echo "no hay session activa";
	}

		
?>

<p>hola mundo......</p>



<?php

require_once 'plan_footer.php';;
?>