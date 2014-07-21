<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" media="screen" href="../css/reset.css">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/style.css">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/slider.css">
    <link href='http://fonts.googleapis.com/css?family=Great+Vibes' rel='stylesheet' type='text/css'>
    <script src="../js/jquery-1.7.min.js"></script>
    <script src="../js/jquery.easing.1.3.js"></script>
    <script src="../js/tms-0.4.1.js"></script>
	
  
	
	
</head>
<body onLoad="$('.main').load('../mostrar_mesas.php');">
<div class="bg-top">
<div class="bgr">
    <header>
	<h1><a href="index.php"><img src="images/logo.jpg" alt=""></a></h1>
        <?php
		session_Start();
		require_once  '../Controlador/app/Config.php';
		require_once  '../Controlador/app/Modelo.php';
		if(isset($_SESSION['usuario']['dni']))
		include '../menu-admin.php';
		?>
        
    </header>  
	
    <section id="content"><div class="ic"></div>
       
       <div class="block-2 pad-1">
	   <center>
        <h2>REGISTRO NUEVO USUARIO</h2>
                                <form action="reg_user.php" method="post" class="form_user">
                        <table width="50%" border="0" cellspacing="2" cellpadding="0">
						
							<tr style="height: 30px;">
                                <td align="right"><label for="dni">DNI : </label></td>
                                <td><input name="dni" type="number" id="dni" value="" size="25" required /></td>
                            </tr>
							
                            <tr style="height: 30px;">
                                <td align="right"><label for="nombre">Nombre : </label></td>
                                <td><input name="nombre" type="text" id="nombre" value="" size="25" required /></td>
                            </tr>
                            <tr style="height: 30px;">
                                <td align="right"><label for="apellidos">Apellidos : </label></td>
                                <td><input name="apellidos" type="text" id="apellidos" size="25" required /></td>
                            </tr><tr style="height: 30px;">
                                <td align="right"><label for="password">Password : </label></td>
                                <td><input name="password" type="password" id="password" size="25" required /></td>
                            </tr>
                            <tr style="height: 30px;">
                                <td align="right"><label for="puesto">Puesto : </label></td>
                                <td><input name="puesto" type="text" id="puesto" size="35" required/></td>
                            </tr>
							<tr style="height: 30px;">
                                <td align="right"><label for="tipoDeUsuario">Privilegios : </label></td>
                                <td><select name="priv" id="priv" required/>
                                <option value="0" selected="selected">Mesero</option>
                                <option value="1">Cajero</option>
								<option value="2">Cocinero</option>
								</select>
								</td>
								</tr>
								
                            <tr style="height: 30px;">
                                <td align="right"><label for="hab">Sucursal : </label></td>
                                <td><select name="id_sucursal" id="id_sucursal" required/>
                                <option value="0" selected="selected">Barranca</option>
                                <option value="1">Paramonga</option>
								</select>
								</td>
								</tr>
								
								<tr style="height: 30px;">
								<td align="right">
									<input name="submit" type="submit" value="Registrarme"/></td> 
									</div>
			
								</tr>
                                
					<!--tr>
					<input type="range" min="1" max="5" value="1" id="contact_priority">
					</tr-->

			</table>
            
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
