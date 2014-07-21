<!DOCTYPE html>
<html lang="en">
<head>
    <title>Gallery</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" media="screen" href="css/reset.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/skin-2.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/jquery.fancybox-1.3.4.css">
    <link href='http://fonts.googleapis.com/css?family=Great+Vibes' rel='stylesheet' type='text/css'>
    <script src="js/jquery-1.7.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/jquery.jcarousel.min.js"></script>
    <script src="js/jquery.fancybox-1.3.4.pack.js"></script>
    <script>
		$(document).ready(function(){
			jQuery('#mycarousel-1').jcarousel({
				horisontal: true,
				wrap:'circular',
				scroll:1,
				easing:'easeInOutBack',
				animation:1200
			});
			$("a.plus").fancybox({
				'transitionIn'	:	'elastic',
				'transitionOut'	:	'elastic',
				'speedIn'		:	600, 
				'speedOut'		:	200, 
				'overlayShow'	:	true
			})
		});
	</script>
	<!--[if lt IE 8]>
       <div style=' clear: both; text-align:center; position: relative;'>
         <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
           <img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
        </a>
      </div>
    <![endif]-->
    <!--[if lt IE 9]>
   		<script type="text/javascript" src="js/html5.js"></script>
    	<link rel="stylesheet" type="text/css" media="screen" href="css/ie.css">
	<![endif]-->
</head>
<body>
<div class="bg-top">
<div class="bgr">
  <!--==============================header=================================-->
    <header>
         <?php
		include "menu.php";
		?>
    </header>  
  <!--==============================content================================-->
    <section id="content"><div class="ic"></div>
       <div class="block-1">
       	<div class="border-right">
        	<div class="block-1-title">
            	<span>01.</span>
                <div class="text-1">Best<strong>cuisine</strong></div>
                <strong class="clear"></strong>
            </div>
            <p class="border-1">This website template has several pages:  Restaurant, Cuisine, Wine List, CookBook, Gallery, Contacts (note that contact us form - doesn't work).</p>
            <a href="#" class="link-1">read more</a>
        </div>
        <div class="border-right">
        	<div class="block-1-title">
            	<span>02.</span>
                <div class="text-2">Good<strong>rest</strong></div>
                <strong class="clear"></strong>
            </div>
            <p class="border-1">Cras mattis tempor eros nec tristique. Sed sed felis arcu, vel vehicula augue. Maecenas faucibus sagittis cursus. Fusce tincidunt, tellus eget tristique cursus.</p>
            <a href="#" class="link-1">read more</a>
        </div>
        <div class="border-right">
        	<div class="block-1-title">
            	<span>03.</span>
                <div class="text-3">Great<strong>service</strong></div>
                <strong class="clear"></strong>
            </div>
            <p class="border-1">Maecenas faucibus sagittis cursus. Fusce tincidunt, tellus eget tristique cursus, orci mi iaculis. sem, sit amet dictum velit velit eu magna. 
Nunc viverra nisi sed orci.</p>
            <a href="#" class="link-1">read more</a>
        </div>
        <div class="block-1-last">
        	<div class="block-1-title">
            	<span>04.</span>
                <div class="text-4">Best<strong>cooks</strong></div>
                <strong class="clear"></strong>
            </div>
            <p class="border-1">Fusce tincidunt, tellus eget tristique cursus, orci mi iaculis. sem, sit amet dictum velit velit eu magna. Nunc viverra nisi sed orci tincidunt at hendrerit orci.</p>
            <a href="#" class="link-1">read more</a>
        </div>
       </div>
       <div class="block-2 pad-2">
        <div class="block-4 col-3">
        	<div class="h2">
       			<h2 class="h2-line-2">Our gallery:</h2>
            </div>
            <ul id="mycarousel-1" class="jcarousel-skin-tango">
                <li><a class="plus" href="images/gallery-1-big.jpg"><img src="images/gallery-1.jpg" alt=""></a><a class="plus" href="images/gallery-2-big.jpg"><img src="images/gallery-2.jpg" alt=""></a><a class="plus" href="images/gallery-3-big.jpg"><img src="images/gallery-3.jpg" alt=""></a></li>
                <li><a class="plus" href="images/gallery-4-big.jpg"><img src="images/gallery-4.jpg" alt=""></a><a class="plus" href="images/gallery-5-big.jpg"><img src="images/gallery-5.jpg" alt=""></a><a class="plus" href="images/gallery-6-big.jpg"><img src="images/gallery-6.jpg" alt=""></a></li>
                <li><a class="plus" href="images/gallery-7-big.jpg"><img src="images/gallery-7.jpg" alt=""></a><a class="plus" href="images/gallery-8-big.jpg"><img src="images/gallery-8.jpg" alt=""></a><a class="plus" href="images/gallery-9-big.jpg"><img src="images/gallery-9.jpg" alt=""></a></li>
                <li><a class="plus" href="images/gallery-10-big.jpg"><img src="images/gallery-10.jpg" alt=""></a><a class="plus" href="images/gallery-11-big.jpg"><img src="images/gallery-11.jpg" alt=""></a><a class="plus" href="images/gallery-12-big.jpg"><img src="images/gallery-12.jpg" alt=""></a></li>
            </ul>
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