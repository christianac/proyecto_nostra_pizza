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
		$cod=$_GET['cod'];
		require_once  '../Controlador/app/Config.php';
		require_once  '../Controlador/app/Modelo.php';
		if(isset($_SESSION['usuario']['dni']))
		include '../menu-admin.php';
		?>
        
    </header>  
	
    <section id="content"><div class="ic"></div>
       
       <div class="block-2 pad-1">
	   <center>
        <h2>Cuentas por pagar</h2>
		
		<?php
		$m = new Model(Config::$mvc_bd_hostname, Config::$mvc_bd_usuario,
													Config::$mvc_bd_clave, Config::$mvc_bd_nombre);
		
		$datos = $m->editar_det($cod);
		
		
		
		if($_SESSION['usuario']['priv']==1){
								echo '<table id="newspaper-a">
								<tr><td>NOSTRA PIZZA</td><td></td></tr>
								<tr><td>Direccion: ';
								if($_SESSION['usuario']['suc']==0)
								echo 'JIRON LIMA #587, BARRANCA';
								else
								echo 'Paramonga';
								echo '</td><td></td></tr>
								<tr><td>RUC: </td><td>Codigo: '.str_pad($cod, 7, "NP00000", STR_PAD_LEFT).'</td></tr>
								
								</table>'; }
		
		$subtotal = 0;
			 echo '<table id="newspaper-a">	<thead>	<tr>
									<th scope="col">Mesa Nº</th>
									<th scope="col">Pedido</th>
									<th scope="col">Tamaño</th>
									<th scope="col">Cantidad</th>
									<th scope="col">Tipo Pedido</th>
									<th scope="col">Importe</th></tr>		</thead><tbody>';
			 for($j=0;$j<count($datos);$j++)
			 { 
			 echo '
								
								<tr>
								<td>';
								if($m->get_numesa($datos[$j]['id_pedido'])[0]['id_mesa']==99)
								echo '--';
								else
								echo $m->get_numesa($datos[$j]['id_pedido'])[0]['id_mesa'];
								echo '</td>
								<td>'.$m->get_nompizza($datos[$j]['id_pizza'])[0]['nombre_pizza'].'</td>
								
								<td>';//Tamaño
								if($datos[$j]['tamano']==0)
								echo 'Ninguno';
								elseif($datos[$j]['tamano']==1)
								echo 'Personal';
								elseif($datos[$j]['tamano']==2)
								echo 'Mediana';
								elseif($datos[$j]['tamano']==3)
								echo 'Familiar';
								elseif($datos[$j]['tamano']==4)
								echo 'Extra-Familiar';
								echo '</td>
								
								<td>'.$datos[$j]['cantidad'].'</td>
								<td>'.$m->get_tipo($datos[$j]['tipo_pedido']).'</td>
								<td>S/. '.$m->get_nompizza($datos[$j]['id_pizza'])[0]['precio_pizza'].'</td>';
								$subtotal = $subtotal+$m->get_nompizza($datos[$j]['id_pizza'])[0]['precio_pizza'];
								}echo '</tr>'; 
								echo '<tr><td></td><td></td><td></td><td></td><td>Total</td><td>S/. '.$subtotal.'</td>';
								if($_SESSION['usuario']['priv']==2){
								print '<tr><td></td><td></td><td></td><td></td><td><button><a href="ped_elab.php?cod='.$cod.'&id_estadop=2">Cocinado!</a></button></td>';
								}
								if($_SESSION['usuario']['priv']==0)
								echo '<tr><td></td><td></td><td>';
								if($_SESSION['usuario']['priv']==0 && $m->get_estado($datos[0]['id_pedido'])[0]['id_estadop']==2 && $datos[0]['tipo_pedido']==0)
								{ 
								echo '<td><button><a href="ped_elab.php?cod='.$cod.'&id_estadop=3">Entregado!<a></button></td><td><button><a href="editar_pedido.php?cod='.$cod.'">Editar<a></button></td>';
								}
								
								elseif($_SESSION['usuario']['priv']==0) 
								echo '<td></td><td></td><td><button><a href="editar_pedido.php?cod='.$cod.'">Editar<a></button></td>';
								
								echo'</tr></table>';
								if($_SESSION['usuario']['priv']==1){
								echo '<table id="newspaper-a">
								<tr><td>Cajero:</td><td>'.$_SESSION['usuario']['apellido'].', '.$_SESSION['usuario']['nombre'].'</td><td></td><td></td><td></td></tr>
								<tr><td>Sucursal:</td><td>'.$m->get_suc($_SESSION['usuario']['suc']).'</td><td></td><td></td><td></td></tr>
								<tr><td>Fecha:</td><td>'.date('d/m/Y', time()).'</td><td>Hora: </td><td>'.date('g:ia', time()).'</td><td></td></tr>';
								
								print '</table>'; 
								    if($_SESSION['usuario']['priv']==1 && $m->get_estado($datos[0]['id_pedido'])[0]['id_estadop']==2 && $datos[0]['tipo_pedido']==1)
								echo '<tr><td></td><td></td><td></td><td></td><td><button><a href="ped_elab.php?cod='.$cod.'&id_estadop=4">Facturar!<a></button></td></tr>';
								elseif($_SESSION['usuario']['priv']==1 && $m->get_estado($datos[0]['id_pedido'])[0]['id_estadop']==4 && $datos[0]['tipo_pedido']==1)
								echo '<tr><td></td><td></td><td></td><td></td><td><button><a href="ped_elab.php?cod='.$cod.'&id_estadop=5">Pagado<a></button></td></tr>';
								elseif($_SESSION['usuario']['priv']==1 && $m->get_estado($datos[0]['id_pedido'])[0]['id_estadop']==3 && $datos[0]['tipo_pedido']==0)
								echo '<tr><td></td><td></td><td></td><td></td><td><button><a href="ped_elab.php?cod='.$cod.'&id_estadop=5">Facturado y Pagado<a></button></td></tr>';
								elseif($_SESSION['usuario']['priv']==1 && $m->get_estado($datos[0]['id_pedido'])[0]['id_estadop']==3 && $datos[0]['tipo_pedido']==1)
								echo '<tr><td></td><td></td><td></td><td></td><td><button><a href="ped_elab.php?cod='.$cod.'&id_estadop=4">Facturar!<a></button></td></tr>';
								}
								else
								echo '';
			if(count($datos)==0)
		{ header("Location: cuentas_chef.php");}
				?>
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
