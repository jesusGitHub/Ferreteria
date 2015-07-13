<?php
require_once 'recursos/conexion.php';
require_once 'plan_header.php';
require_once 'plan_sidebar.php';
require_once 'recursos/funciones.php';

$idconexion =ConectarServidor();
$privilegio=0;

?>

<?php
		//llamando la funcion que verifica el privilegio del usuario..
		$privilegio=verifica_usuario();
		
	
		//llamando funcion que elimina las mercancias..
		if(isset($_POST['btnEli'])){
			$idproducto=$_POST['btnEli'];
			
			$producto_eliminado=elimina_producto($idproducto);
		
		}
		
	
		$cadenavacia=FALSE;
		$sql ="SELECT * FROM tbl_producto ORDER BY ProductoID DESC";
		$queri_result_producto=mysqli_query($idconexion,$sql);
	
	
		//llamando funcion en que busca los productos por parametro de busqueda
		if(isset($_POST['btnBuscar'])){
			if($_POST['txtBuscar']!="" && $_POST['txtBuscar']!=NULL ){
		
			$busqueda=$_POST['txtBuscar'];
			$queri_result_producto=busqueda_producto($busqueda);
		
			if(mysqli_num_rows($queri_result_producto)==0){
				$cadenavacia=TRUE;	
			}
		}
	}
		//fin if que pregunta si el botton buscar existe

?>

	<div class="">	
	<h3><i class="fa fa-angle-right"></i><b> Galeria De Productos</b> </h3>
	</div>
	
	<form method="post">
		<div align="right" style="padding-right: 10%" class="cabecera form-group">
			<span class="color-white">buscar:</span>
			<input type="text" name="txtBuscar" id="txtBuscar" align="right" class="tex-person" />
			<input type="image" src="imagenes/busqueda.png" name="btnBuscar" value="Buscar" />
			<!--<input class="btn btn-danger btn-xs" type="submit" name="btnBuscar" id="btnBuscar" value="Buscar" />-->
		</div>
	
	<hr />
	
		<?php	
			if(isset($producto_eliminado)){
				if($producto_eliminado==TRUE){
				
					echo "<div id='OperacionExitosa' class='col-lg-12' 
				 		 style='padding-left:10%;padding-right:10%' align='center'>";
					echo "<div class='alert alert-success alert-dismissable'>";
					echo "<button type='button' class='close' 
						 data-dismiss='alert' aria-hidden='true'>&times;</button>";
					echo "<b>La Operacion Se Realizo Con Exito....</b>";
					echo "</div>";				
      				echo "</div>";
			}else{
					echo "<div id='error_usuario_existe' class='col-lg-12' style='padding-left:10%;padding-right:10%' align='center'>";
					echo "<div class='alert alert-danger alert-dismissable'>";
					echo "<button type='button' class='close' 
				 		 data-dismiss='alert' aria-hidden='true'>&times;</button>";
					echo "<b>Ocurrio un preblema durante la operacion....</b>";
					echo "</div>";				
      				echo "</div>";
				
			}	
		}
			
			
	
					if($cadenavacia==TRUE){
					echo "<script>alert('no se encontro nada')</script>";			
			?>
				
				<div style="text-align: center">
					<div class="alert alert-warning alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<strong>No se encontro ningun  producto!..</strong>
					</div>      				
      			</div>
				
			<?php
			
					}//cierre del if en case de encontrar la cadena vacia 
				if(mysqli_num_rows($queri_result_producto)>0){
					//echo $r;
					$cant_imagen=mysqli_num_rows($queri_result_producto);
					$contador=1;
					$cantidad_mostrar=1;
					$ruta="Imagenes/Producto/";
	
			?>

				
					
					<!--php bucle mientras existan imagenes -->
					<?php
						
						while($dato_producto=mysqli_fetch_array($queri_result_producto)){
							//seleccionando e inicializando las variables con los campo de la bd
							//que boy a utilizar con los atributos de la imagen
							$productoid=$dato_producto['ProductoID'];
							$sql="SELECT * FROM tbl_imagen WHERE ProductoID='$productoid'";
							$result_imagen=mysqli_query($idconexion,$sql)or die ("eror al seleccionar"
							."las imagenes".mysqli_error($idconexion));
							
							$imagen=mysqli_fetch_array($result_imagen);
							$usuarioid=$dato_producto['UsuarioID'];
							$categoriaid=$dato_producto['CategoriaID'];
							$nombre_producto=$dato_producto['Nombre'];
							$descripcion=$dato_producto['Descripcion'];
							$precio=$dato_producto['Precio'];
							$precio_oferta=$dato_producto['PrecioOferta'];
							$oferta=$dato_producto['Oferta'];
							
							$sql="SELECT * FROM categoria WHERE CategoriaID='$categoriaid'";
							$result_categoria=mysqli_query($idconexion,$sql) or die("error al "
							."seleccionar la categoria".mysqli_error($idconexion));
							
							$datos_categoria=mysqli_fetch_array($result_categoria);
							$categoria_nombre=$datos_categoria['Categoria'];
							
							
							
							
							if($contador==1){
								echo "<div class='row mt'>";
								//echo $contador;
							}
					
					?>
					
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 desc">
						<div class="project-wrapper">
							<?php if($privilegio==2){ ?>
		                   <button type="submit" name="btnEli" value="<?php echo $productoid ;?>" id="btnEli" class="close" aria-hidden="true">&times;
		                   	</button>
		                   	<?php } ?>
		                    <div class="project">
		                        <div class="photo-wrapper">
		                            <div class="photo" style="width: 100%">
		                            	<a class="fancybox" href="<?php echo $ruta.$imagen['Imagen']; ?>"><img class="img-responsive" src="<?php echo $ruta.$imagen['Imagen']; ?>" alt="mundo" ></a>	
		                            </div>
		                            <div class="overlay"></div>
		                        </div>
		                        
		                         <p><b>Nombre:</b><?php echo $nombre_producto;?>
		                         Tipo:<?php echo $categoria_nombre;?>
		                         Descripcion:<?php echo $descripcion;?>
		                         Precio:<?php echo $precio?>
		                         <?php if($oferta >0)echo "PrecioOferta:".$precio_oferta; ?>
		                         </p>
		                    </div>
		                   
		                </div>
					</div><!-- col-lg-4 -->
				</form>
				<!-- php para saver si el contador tiene tres columnas -->	
				
				<?php
				//echo $cantidad_mostrar;
				
					//echo $contador;
					if($contador==3 || $cantidad_mostrar==$cant_imagen){
						//echo $cantidad_mostrar;
						//echo $cant_imagen;
							echo "</div>"; //<!-- /row -->
							$contador=0;
						
						}
						
						$cantidad_mostrar++;
						$contador++;
				
					}//bucle que se ejecuta mientras existan  imagenes
				}//if resultado mayor a cero(0)

 				
			?>
			<div class="cabecera">
				&nbsp;
			</div>

<?php

require_once 'plan_footer.php';
?>