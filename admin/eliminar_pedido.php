
        <?php
		session_Start();
		$cod=$_GET['cod'];
		$pk=$_GET['pk'];
		require_once  '../Controlador/app/Config.php';
		require_once  '../Controlador/app/Modelo.php';
		//include '../menu-admin.php';
		
		$m = new Model(Config::$mvc_bd_hostname, Config::$mvc_bd_usuario,
													Config::$mvc_bd_clave, Config::$mvc_bd_nombre);
		
		$datos = $m->eliminar_ped_det($pk,$cod);
		header('Location: editar_pedido.php?cod='.$cod.'');
		?>
  