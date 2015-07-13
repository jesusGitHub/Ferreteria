<?php
require_once 'recursos/conexion.php';
require_once 'plan_header.php';
require_once 'plan_sidebar.php';

$idconexion =ConectarServidor();

?>

<?php
	$sql ="SELECT * FROM tbl_imagen ORDER BY Imagen DESC ";
	$queriresult=mysqli_query($idconexion,$sql);
	$cant_imagen=mysqli_num_rows($queriresult);





?>
		
	<h3><i class="fa fa-angle-right"></i> Galeria De Productos </h3>
	<hr />
	<!--<section id="main-content">-->
		<!--<section class="wrapper site-min-height">-->

			<?php
			
				if(mysqli_num_rows($queriresult)>0){
					//echo $r;
					$contador=1;
					$cantidad_mostrar=1;
					$ruta="Imagenes/Producto/";
	
			?>

				
					
					<!--php bucle mientras existan imagenes -->
					<?php
						
						while($imagen=mysqli_fetch_array($queriresult)){
							//seleccionando e inicializando las variables con los campo de la bd
							//que boy a utilizar con los atributos de la imagen
							$productoid=$imagen['ProductoId'];
							$sql="SELECT * FROM tbl_producto WHERE ProductoID='$productoid'";
							$result_producto=mysqli_query($idconexion,$sql)or die ("eror al seleccionar"
							."los productos".mysqli_error($idconexion));
							
							$dato_producto=mysqli_fetch_array($result_producto);
							$usuarioid=$dato_producto['UsuarioID'];
							$categoriaid=$dato_producto['CategoriaId'];
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
		                    <div class="project">
		                        <div class="photo-wrapper">
		                            <div class="photo">
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
	<!--	</section>-->	
	<!--</section>-->

<?php

require_once 'plan_footer.php';
?>