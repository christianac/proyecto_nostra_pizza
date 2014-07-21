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
<body>
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
        <h2>Cuentas por pagar</h2>
		<?php
		$m = new Model(Config::$mvc_bd_hostname, Config::$mvc_bd_usuario,
													Config::$mvc_bd_clave, Config::$mvc_bd_nombre);
		$count = $m->contar();
		$datos = $m->listar_det();
		echo '<table id="newspaper-a">	<thead>	<tr>
									<th scope="col">Codigo</th>
									<th scope="col">Mesa N�</th>
									<th scope="col">Tipo Pedido</th>
									<th scope="col">Estado</th>';
									if($_SESSION['usuario']['priv']==1)
									echo	'<th scope="col">Boleta</th>';
									else
									echo	'<th scope="col">Detalles</th>';
									echo '</tr>		</thead>';
									 for($j=0;$j<$count;$j++)
			 { 
			 echo '<tbody>
								<tr>
								<td>'.$datos[$j]['id_pedido'].'</td>
								<td>';
								
								if($m->get_numesa($datos[$j]['id_pedido'])[0]['id_mesa']==99)
								echo '--';
								else
								echo $m->get_numesa($datos[$j]['id_pedido'])[0]['id_mesa'];
								echo '</td>';
								
								echo '</td><td>'.$m->get_tipo($datos[$j]['tipo_pedido']).'</td></td><td>';
								
									if($m->get_estado($datos[$j]['id_pedido'])[0]['id_estadop']==1)
								echo '<div style="border: 1px; padding: 1px;BACKGROUND-COLOR: yellow">'.$m->get_estado_name($m->get_estado($datos[$j]['id_pedido'])[0]['id_estadop'])['nombre_estado'].'</td></div>';
								elseif($m->get_estado($datos[$j]['id_pedido'])[0]['id_estadop']==2)
								echo '<div style="border: 1px; padding: 1px;BACKGROUND-COLOR: orange">'.$m->get_estado_name($m->get_estado($datos[$j]['id_pedido'])[0]['id_estadop'])['nombre_estado'].'</td></div>';
								elseif($m->get_estado($datos[$j]['id_pedido'])[0]['id_estadop']==3)
								echo '<div style="border: 1px; padding: 1px;BACKGROUND-COLOR: pink">'.$m->get_estado_name($m->get_estado($datos[$j]['id_pedido'])[0]['id_estadop'])['nombre_estado'].'</td></div>';
								elseif($m->get_estado($datos[$j]['id_pedido'])[0]['id_estadop']==4)
								echo '<div style="border: 1px; padding: 1px;BACKGROUND-COLOR: GreenYellow">'.$m->get_estado_name($m->get_estado($datos[$j]['id_pedido'])[0]['id_estadop'])['nombre_estado'].'</td></div>';
								elseif($m->get_estado($datos[$j]['id_pedido'])[0]['id_estadop']==5)
								echo '<div style="border: 1px; padding: 1px;BACKGROUND-COLOR: black; color: white">'.$m->get_estado_name($m->get_estado($datos[$j]['id_pedido'])[0]['id_estadop'])['nombre_estado'].'</td></div>';
								
								if($_SESSION['usuario']['priv']==1)
								echo '<td><button><a href="editar_cuenta.php?cod='.$datos[$j]['id_pedido'].'">Crear boleta</a></button></td>';
								elseif($_SESSION['usuario']['priv']==2){
								if($m->get_estado($datos[$j]['id_pedido'])[0]['id_estadop']==1)
								print '<td><button><a href="editar_cuenta.php?cod='.$datos[$j]['id_pedido'].'">Ver Detalles</a></button></td>';
								else 
								print  '<td></td>';
								}
								else
								echo '<td><button><a href="editar_cuenta.php?cod='.$datos[$j]['id_pedido'].'">Ver Detalles</a></button></td>';
								
								echo '</tr>	</tbody>'; }
								echo '</table>';
		?>
         </div>
        </div>
       </div>
    </section> 
 
</div> 
</div>       
</body>
</html>
