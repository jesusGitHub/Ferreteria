
  <!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>DASHGUM - Bootstrap Admin Template</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  
  </head>

  <body>
  	<?php
  		require_once 'recursos/conexion.php';
		$idconexion=ConectarServidor();
  	
  	?>
  	
  	<?php
  	
  		if(isset($_POST['btnRegistrar'])){
  			
			$usuario=$_POST['txtUsuario'];
			$pass=$_POST['txtPassword'];
			$pass=limpiar_variable($pass);
			$pass=md5($pass);
			
			/*$usuario=limpiar_variable($usuario);
			$pass=limpiar_variable($pass);
			*/
			
			
			if($usuario !="" && $pass!=""){
				$estatus=1;
				
				$sql = "SELECT * FROM tbl_usuario WHERE Usuario='$usuario' "
				."&& Password='$pass' && Estatus='$estatus'";
				$queriresult=mysqli_query($idconexion,$sql) or die ("error al intentar"
				." seleccionar los datod del usuario".mysqli_error($idconexion));
				
				if($datos=mysqli_fetch_array($queriresult)){
					session_start();
					$_SESSION['usuarioid']=$datos['UsuarioID'];
					$_SESSION['nombre']=$datos['Nombre'];
					$_SESSION['nombre1']=$datos['Cedula'];
					$_SESSION['usuario']=$datos['Usuario'];
					$_SESSION['tipoid']=$datos['TipoUsuID'];
					//$_SESSION['pass']=$datos['Password'];
					//echo $_SESSION['nombre'];
					//setcookie('usuarion',$datos["Nombre"]);
					//echo "<script>alert('hola mundo');</script>";
					header('Location:index.php');
					
				}else{
					
					
					
				}
				
				
			}//fin del operador if que verifica si los campos requeridos no son nulos
			
			
  		}//fin del operador if que verifica si existe el botton registrar
  	
  	
  	
  	
  	
  	?>


      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->

	  <div id="login-page">
	  	<div class="container">
	  	
		      <form class="form-login" action="" method="post">
		        <h2 class="form-login-heading">Registrarse Ahora</h2>
		        <div class="login-wrap">
		            <input type="text" name="txtUsuario" id="txtUsuario" class="form-control" placeholder="Usuario" autofocus>
		            <br>
		            <input type="password" name="txtPassword" id="txtPassword" class="form-control" placeholder="Clave">
		            <label class="checkbox">
		                <span class="pull-right">
		                   <p style="color: blue"> Solo ppersonal autorizado </p> 
		
		                </span>
		            </label>
		            <button name="btnRegistrar" id="btnRegistrar" class="btn btn-theme btn-block"  type="submit"><i class="fa fa-lock">&nbsp;</i>Registrarse</button>
		            <hr>
		            
		            <div class="login-social-link centered">
		            <p>registrate con tu cuenta de usuario</p>
		                <!--<button class="btn btn-facebook" type="submit"><i class="fa fa-facebook"></i> Facebook</button>
		                <button class="btn btn-twitter" type="submit"><i class="fa fa-twitter"></i> Twitter</button>
		           		-->
		            </div>
		
		        </div>
		
		          <!-- Modal -->
		          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
		              <div class="modal-dialog">
		                  <div class="modal-content">
		                      <div class="modal-header">
		                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		                          <h4 class="modal-title">Forgot Password ?</h4>
		                      </div>
		                      <div class="modal-body">
		                          <p>Enter your e-mail address below to reset your password.</p>
		                          <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">
		
		                      </div>
		                      <div class="modal-footer">
		                          <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
		                          <button class="btn btn-theme" type="button">Submit</button>
		                      </div>
		                  </div>
		              </div>
		          </div>
		          <!-- modal -->
		
		      </form>	  	
	  	
	  	</div>
	  </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("assets/img/login-bg.jpg", {speed: 500});
    </script>


  </body>
</html>
