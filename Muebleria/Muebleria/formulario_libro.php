<?php

include_once'conexion.php';
//realizando consulta para mostrar en el lisbox 
$conectar=conectar();
$recurso=seleccionaBD("dblibreria",$conectar);

$sql="SELECT id_pub,nombre_pub,estado FROM publicadores ORDER BY nombre_pub";

$resultado=mysql_query($sql) or die("Error en la consulta".mysql_error());

?>

<form class="edicion" action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" enctype="multipart/form-data">
	
             <label for="id_titulo">C&oacute;digo</label>
             <input type="text" name="id_titulo" id="id_titulo" value"" />
            
             <label for="titulo">Titulo</label>
             <input type="text" name="titulo" id="titulo" value"" ></imput>
             
             
             <label for="imagen">Agregar imagen</label>
             <input type="file"  name="imagen"/>           
             
             <label for="tipo">tipo</label>
             <input type="text" name="tipo" id="tipo" value"" ></imput>   
             
             <?php
             if (mysql_num_rows($resultado) > 0) {
                 
            
             ?>
             
             
             <label for="id_publicador">Publicador</label>
             <select name="id_publicador" id="id_publicador">
             	
             	<?php 
             	
             	while ($campo = mysql_fetch_assoc($resultado)) {
	
	               printf('<option value="%s">%s</option>'
	                  ,$campo['id_pub']
					  ,$campo['nombre_pub']
					  );
				   
	             				 
				 }//fin del while
             	
                    ?>
             	
             	<option value=""></option>
             </select>
             
             
             <?php
              }//fin del if
              ?>
             
             <label for="precio">Precio</label>
             <input type="text" name="precio" id="precio" value"" ></imput>
             
             <label for="notas">Notas</label>
             <input type="text" name="notas" id="notas" value"" ></imput>
             
             <label for="fecha_pub">Fecha</label>
             <input type="text" name="fecha_pub" id="fecha_pub" value"" ></imput> 
             
             <input name="guardar" type="submit" value="Guardar">
            
             <input name="limpiar" type="reset" value="Limpiar">
            

</form>