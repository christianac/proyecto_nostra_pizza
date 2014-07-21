<?php 

session_start();
		require_once  '../Controlador/app/Config.php';
		require_once  '../Controlador/app/Modelo.php';
$cod=$_GET['cod'];
$id_estadop=$_GET['id_estadop'];
$m = new Model(Config::$mvc_bd_hostname, Config::$mvc_bd_usuario,
													Config::$mvc_bd_clave, Config::$mvc_bd_nombre);
$m->set_estado($cod,$id_estadop);
if($_SESSION['usuario']['priv']==2)
header("Location: cuentas_chef.php");
elseif($_SESSION['usuario']['priv']==1)
header("Location: cuentas.php");
elseif($_SESSION['usuario']['priv']==0)
header("Location: cuentas.php");
 ?>
