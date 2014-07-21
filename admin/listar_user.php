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
        <h2>Usuarios</h2>
           <?php          
$m = new Model(Config::$mvc_bd_hostname, Config::$mvc_bd_usuario,Config::$mvc_bd_clave, Config::$mvc_bd_nombre);	


		$datos = $m->listar_usuarios();
		echo '<table id="newspaper-a">	<thead>	<tr>
									<th scope="col">DNI</th>
									<th scope="col">Nombres y Apellidos</th>
									<th scope="col">Puesto</th>
									<th scope="col">Sucursal</th></thead>';
									
									 for($j=0;$j<count($datos);$j++)
			 { 
			 echo '<tbody>
								<tr>
								<td>'.$datos[$j]['dni'].'</td>
								<td>'.$datos[$j]['nombre'].' '.$datos[$j]['apellido'].'</td>';
								
								
								if($datos[$j]['priv']==0)
								echo '<td><div style="border: 1px; padding: 1px;BACKGROUND-COLOR: yellow">Mesero</div></td>';
								elseif($datos[$j]['priv']==1)
								echo '<td><div style="border: 1px; padding: 1px;BACKGROUND-COLOR: orange">Cajero</div></td>';
								elseif($datos[$j]['priv']==2)
								echo '<td><div style="border: 1px; padding: 1px;BACKGROUND-COLOR: pink">Cocinero/Chef</div></td>';
								
								
								if($datos[$j]['id_sucursal']==0)
								echo '<td>Barranca</td>';
								else
								echo '<td>Paramonga</td>';
								
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
