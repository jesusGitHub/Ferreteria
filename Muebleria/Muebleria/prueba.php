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

<h3><i class="fa fa-angle-right"></i> Creando producto.</h3>
      <div class="row mt">
      	<div class="col-lg-2">
      		
      		<div class="row">
      			<div class="col-lg-3">
      		 <input type="text" name="txtNombre"    id="txtNombre"   class="form-control">
      		   </div>
         	</div>
      		
      	</div>
      	
      	</div>
    </div>



<?php

require_once 'plan_footer.php';;
?>