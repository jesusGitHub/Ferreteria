 <?php
require_once 'recursos/conexion.php';
$idconexion = ConectarServidor(); 
 ?>   
  
   <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <?php
     /*
	  if(isset($_SESSION['usuarioid'])){
	  	
		 $idtipo=$_SESSION['tipoid'];
		
		$query="SELECT * FROM tbl_tipousuario WHERE TipoID='$idtipo'";
		$query_result_tipo=mysqli_query($idconexion,$sql) or die ("error al seleccionar el tipo_usu"
		.mysqli_error($idconexion));
		
		$datos=mysqli_fetch_array($query_result_tipo);
		$nombre_tipo=$datos['Nombre'];
		
		
	  }
      
      */
      
      ?>
      
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a href="profile.html"><img src="assets/img/logoEmpresa.jpg" class="img-circle" width="60"></a></p>
              	  <h5 class="centered">Señor Carderon CxA</h5>
              	  	
                  <li class="mt">
                      <a href="index.html">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
                     <!-- copia del elemento Dashboard -->           	  	
                  <li class="mt">
                      <a href="GaleriaProductos.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Galeria de Productos</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-desktop"></i>
                          <span>Nuestra Misión</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="general.html">General</a></li>
                          <li><a  href="buttons.html">Buttons</a></li>
                          <li><a  href="panels.html">Panels</a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-cogs"></i>
                          <span>Nuestra Visión</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="calendar.html">Calendar</a></li>
                          <li><a  href="gallery.html">Gallery</a></li>
                          <li><a  href="todo_list.html">Todo List</a></li>
                      </ul>
                  </li>
                  
                  <li class="sub-menu">
                      <a class="active" href="javascript:;" >
                          <i class="fa fa-book"></i>
                          <span>Mejores productos</span>
                      </a>
                      <ul class="sub">
                          <li class="active"><a  href="blank.html">Blank Page</a></li>
                          <li><a  href="login.php">Login</a></li>
                          <li><a  href="lock_screen.html">Lock Screen</a></li>
                      </ul>
                  </li>
                  <!-- sub menu que contiene funciones de administrados -->
                 	<?php 
                 	/*
                 			if(isset($_SESSION['nombre'])){
								
								if($nombre_tipo=="Administraccion"){	*/
                 	?>
                 
                  <li class="sub-menu">
                      <a>
                          <i class="fa fa-book"></i>
                          <span>Administraccion</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="crear_cuenta.php">Crear Cuenta</a></li>
                          <li><a  href="Usuarios.php">Usuarios</a></li>
                          <li><a  href="NuevoProducto.php">Subir Producto</a></li>
                          <li><a  href="login.php">Login</a></li>
                          <li><a  href="lock_screen.html">Lock Screen</a></li>
                      </ul>
                  </li>
                  	<?php
							/*
							}
						}
                  	*/
                  	?>
                  
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-tasks"></i>
                          <span>Forms</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="form_component.html">Form Components</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-th"></i>
                          <span>Data Tables</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="basic_table.html">Basic Table</a></li>
                          <li><a  href="responsive_table.html">Responsive Table</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class=" fa fa-bar-chart-o"></i>
                          <span>Charts</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="morris.html">Morris</a></li>
                          <li><a  href="chartjs.html">Chartjs</a></li>
                      </ul>
                  </li>

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
          	
      