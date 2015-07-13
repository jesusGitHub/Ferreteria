<?php
//session_start();
require_once 'plan_header.php';
?>

    <link rel='stylesheet' id='camera-css'  href='css/camera.css' type='text/css' media='all'> 
    <style>
		body {
			margin: 0;
			padding: 0;
		}
		a {
			color: #09f;
		}
		a:hover {
			text-decoration: none;
		}
		#back_to_camera {
			clear: both;
			display: block;
			height: 80px;
			line-height: 40px;
			padding: 20px;
		}
		.fluid_container {
			margin: 0 auto;
			max-width: 1000px;
			width: 90%;
		}
	</style>
   
   

<?php
require_once 'plan_sidebar.php';





	
	if(isset($_SESSION['nombre'])){
		echo "hola mundo session arriba";
		echo $_SESSION["nombre"];
		
	}else{
		echo "no hay session activa";
	}

		
?>

<div class="fluid_container">
	
    	<p>Pagination circles with the height relative to the width</p>
        <div class="camera_wrap camera_azure_skin" id="camera_wrap_1">
            <div data-thumb="mages/slides/thumbs/bridge.jpg" data-src="images/slides/producto1.jpg">
                <div class="camera_caption fadeFromBottom">
                    Camera is a responsive/adaptive slideshow. <em>Try to resize the browser window</em>
                </div>
            </div>
            <div data-thumb="images/slides/thumbs/leaf.jpg" data-src="images/slides/producto2.jpg">
                <div class="camera_caption fadeFromBottom">
                    It uses a light version of jQuery mobile, <em>navigate the slides by swiping with your fingers</em>
                </div>
            </div>
            <div data-thumb="images/slides/thumbs/road.jpg" data-src="images/slides/producto3.jpg">
                <div class="camera_caption fadeFromBottom">
                    <em>It's completely free</em> (even if a donation is appreciated)
                </div>
            </div>
            <div data-thumb="images/slides/thumbs/sea.jpg" data-src="images/slides/producto4.jpg">
                <div class="camera_caption fadeFromBottom">
                    Camera slideshow provides many options <em>to customize your project</em> as more as possible
                </div>
            </div>
            <div data-thumb="images/slides/thumbs/shelter.jpg" data-src="images/slides/producto5.jpg">
                <div class="camera_caption fadeFromBottom">
                    It supports captions, HTML elements and videos and <em>it's validated in HTML5</em> (<a href="http://validator.w3.org/check?uri=http%3A%2F%2Fwww.pixedelic.com%2Fplugins%2Fcamera%2F&amp;charset=%28detect+automatically%29&amp;doctype=Inline&amp;group=0&amp;user-agent=W3C_Validator%2F1.2" target="_blank">have a look</a>)
                </div>
            </div>
            <div data-thumb="images/slides/thumbs/tree.jpg" data-src="images/slides/tree.jpg">
                <div class="camera_caption fadeFromBottom">
                    Different color skins and layouts available, <em>fullscreen ready too</em>
                </div>
            </div>
        </div><!-- #camera_wrap_1 -->
        <!--
            	<p>Thumbnails with fixed height</p>
        <div class="camera_wrap camera_magenta_skin" id="camera_wrap_2">
            <div data-thumb="images/slides/thumbs/bridge.jpg" data-src="images/slides/bridge.jpg">
                <div class="camera_caption fadeFromBottom">
                    Camera is a responsive/adaptive slideshow. <em>Try to resize the browser window</em>
                </div>
            </div>
            <div data-thumb="images/slides/thumbs/leaf.jpg" data-src="images/slides/leaf.jpg">
                <div class="camera_caption fadeFromBottom">
                    It uses a light version of jQuery mobile, <em>navigate the slides by swiping with your fingers</em>
                </div>
            </div>
            <div data-thumb="images/slides/thumbs/road.jpg" data-src="images/slides/road.jpg">
                <div class="camera_caption fadeFromBottom">
                    <em>It's completely free</em> (even if a donation is appreciated)
                </div>
            </div>
            <div data-thumb="images/slides/thumbs/sea.jpg" data-src="images/slides/sea.jpg">
                <div class="camera_caption fadeFromBottom">
                    Camera slideshow provides many options <em>to customize your project</em> as more as possible
                </div>
            </div>
            <div data-thumb="images/slides/thumbs/shelter.jpg" data-src="images/slides/shelter.jpg">
                <div class="camera_caption fadeFromBottom">
                    It supports captions, HTML elements and videos and <em>it's validated in HTML5</em> (<a href="http://validator.w3.org/check?uri=http%3A%2F%2Fwww.pixedelic.com%2Fplugins%2Fcamera%2F&amp;charset=%28detect+automatically%29&amp;doctype=Inline&amp;group=0&amp;user-agent=W3C_Validator%2F1.2" target="_blank">have a look</a>)
                </div>
            </div>
            <div data-thumb="images/slides/thumbs/tree.jpg" data-src="images/slides/tree.jpg">
                <div class="camera_caption fadeFromBottom">
                    Different color skins and layouts available, <em>fullscreen ready too</em>
                </div>
            </div>
        </div><!-- #camera_wrap_2 -->
</div>






<?php

require_once 'plan_footer.php';;
?>


<script type='text/javascript' src='scripts/jquery.min.js'></script>
    <script type='text/javascript' src='scripts/jquery.easing.1.3.js'></script> 
    <script type='text/javascript' src='scripts/jquery.mobile.customized.min.js'></script>
    <script type='text/javascript' src='scripts/camera.min.js'></script> 
    
    <script>
		jQuery(function(){
			
			jQuery('#camera_wrap_1').camera({
				thumbnails: true,
				time:2000
			});
			/*
			jQuery('#camera_wrap_2').camera({
				height: '400px',
				loader: 'bar',
				pagination: false,
				thumbnails: true
			});*/

		});
	</script>