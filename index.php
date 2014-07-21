<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" media="screen" href="css/reset.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/slider.css">
    <link href='http://fonts.googleapis.com/css?family=Great+Vibes' rel='stylesheet' type='text/css'>
    <script src="js/jquery-1.7.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/tms-0.4.1.js"></script>
	
    <script>
		$(document).ready(function(){				   	
			$('.slider')._TMS({
				show:0,
				pauseOnHover:true,
				prevBu:false,
				nextBu:false,
				playBu:false,
				duration:700,
				preset:'fade',
				pagination:true,
				pagNums:false,
				slideshow:8000,
				numStatus:false,
				banners:false,
				waitBannerAnimation:false,
				progressBar:false
			})		
		});
	</script>
	
</head>
<body onLoad="$('.main').load('mostrar_mesas_soloread.php');">
<div class="bg-top">
<div class="bgr">
    <header>
        <?php
		include 'menu.php';
		?>
        <div id="slide">		
            <div class="slider">
                <ul class="items">
                    <li><img src="images/slider-1.jpg" alt="" /></li>
                    <li><img src="images/slider-2.jpg" alt="" /></li>
                    <li><img src="images/slider-3.jpg" alt="" /></li>
                </ul>
          </div>
          <div class="phone-number">Llamanos para servicio delivery:<strong>235-33-82</strong></div>	
      </div> 
    </header>  
	
    <section id="content"><div class="ic"></div>
       
       <div class="block-2 pad-1">
	   
       	<div class="col-1">
        	<h2 class="h2-line">Estamos felices de invitarte!<strong>Sucursales en Barranca y Paramonga</strong></h2>
            <div class="box-1">
            	<div class="img-border img-indent"><img src="images/page1-img1.jpg" alt=""></div>
                <div class="extra-wrap">
                	<p class="it-bold p2">Pizzeria Nostra Pizza cuenta con dos sucursales, una en Barranca y otra en Paramonga </p>
                     
                </div>
            </div>
        </div>
        <!--div class="col-2 left-2">
        	<h3 class="h3-line top-1">Testimonials:</h3>
            <div class="box-2 top-2">
                <div class="comment border-1">
                    <p><img src="images/comment-top.png" alt="" ><span class="clr-1">Vivamus hendrerit mauris ut dui</span> gravida ut viverra lectus incidunt. Cras mattis tempor eros nec tristique. Sed sed felis arcu, vel vehicula.<img src="images/comment-bottom.png" alt="" class="second"></p>
                    <span class="clr-1"><strong>Tina Smith</strong> <i>(top manager)</i></span>
                </div>
                <div class="comment border-1 top-3">
                    <p><img src="images/comment-top.png" alt="" ><span class="clr-1">Vivamus hendrerit mauris ut dui</span> gravida ut viverra lectus incidunt. Cras mattis tempor eros nec tristique. Sed sed felis arcu, vel vehicula.<img src="images/comment-bottom.png" alt="" class="second"></p>
                    <span class="clr-1"><strong>John Green</strong> <i>(director)</i></span>
                </div>
                <a href="#" class="link-1">read more</a>
             </div> 
        </div-->
        <div class="clear"></div>
        <div class="block-3">
        		<div class="main_sr">
		
	</div>
            
<script src="js/send_message.js" type="text/javascript"></script>
<script src="js/refresh_message_log.js" type="text/javascript"></script> 
            </div>
        </div>
       </div>
    </section> 

<!--==============================footer=================================-->
  <footer>
      <p>© 2012  Valencia<br>Plantillas web profesionales gratuitas <a href="http://www.mejoresplantillasgratis.es" target="_blank">en www.mejoresplantillasgratis.es</a>.<br>
      <a rel="nofollow" href="http://www.templatemonster.com/" target="_blank" class="link">Website Template</a> by TemplateMonster.com</p> 
  </footer>	 
</div> 
</div>      
</body>
</html>