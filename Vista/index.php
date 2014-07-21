<!DOCTYPE  html>
<html>
<head>
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400|Lobster' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="Vista/style.css">
  <script src="Vista/js/jQuery.js" type="text/javascript"></script>
  </head>
  
  <body onLoad="$('.main_sr').load('Vista/mostrar_mesas_soloread.php');">
  
                    <form action="Controlador/ingresar_sistema.php" class="form_usr" name="enviar" type="get">
                        <table width="20%" border="0" cellspacing="2" cellpadding="0" align="right">
                            <tbody align="right">
                                <tr>
                                    <td align="right"><b>DNI : </b></td>
                                    <td>
                                        <input name="dni" type="number" id="dni" value="" size="8" required /> 
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right"><b>PASSWORD : </b></td>
                                    <td>
                                        <input type="password" name="password" id="password" size="8" required/> 
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right">
										
                                    </td>
                                    <td align="center">
                                        <input type="submit" name="enviar" value="Logear"/></td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td align="center"><a href="recupera.php">¿Perdiste la contraseña?</a><br />
                                        </td>
                                </tr>                                
                            </tbody>                                                        
                        </table>
                    </form>
					</br></br></br></br></br></br></br>
					
<center><h1>Nostra Pizza</h1><center>

<table width="70%" border="0">
<tr>							
                                    <td><a href="#" ><h2>Locales </h2></a></td>
                                    <td><a href="#" ><h2>Promociones</h2></a> </td>
                                    <td><a href="#" ><h2>Eventos</h2></a> </td>
                                    <td><a href="#" ><h2>Fotos </h2></a></td>
                                </tr> 
								</table>
<table width="70%" border="0">
                            <tbody>
                               
                                   	
 
								<tr>
                                    <td></br></br> </td>
                                    <td><a href="#" >Barranca</a> <a href="#">Paramonga</a></td>
									<td></td>
									<td></td>
                                </tr>		

										
							<tr>
                                    <td> <img src="Vista/imagenes/logo.png"></td>
                                    <td> Lorem ipsum  Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum</td>
									<td></td>
									<td><img src="Vista/imagenes/ub.png"></td>
                                </tr>		
								
                            </tbody>                                                          
                        </table>
						
                               
</br></br></br></br></br>

					<div class="main_sr"> </div>
					
	<script src="Vista/js/send_message.js" type="text/javascript"></script>
<script src="Vista/js/refresh_message_log.js" type="text/javascript"></script>
</body>
</html>