<?php
	session_start();
	
	$dni=$_GET['dni'];
	$pass=md5($_GET['password']);
	require_once __DIR__ . '/app/Config.php';
	require_once __DIR__ . '/app/Modelo.php';


$m = new Model( Config::$mvc_bd_hostname, Config::$mvc_bd_usuario,
                     Config::$mvc_bd_clave,Config::$mvc_bd_nombre);
 $datos = array();
 $datos = $m->conectar_usuarios($dni,$pass);
 //$m->añadir();

	if(count($datos)!=0)
	{
		
		$_SESSION['usuario']['dni']=$dni;
		$_SESSION['usuario']['priv']=$datos['priv'];
		$_SESSION['usuario']['apellido']=$datos['apellido'];
		$_SESSION['usuario']['nombre']=$datos['nombre'];
		$_SESSION['usuario']['suc']=$datos['id_sucursal'];
		$_SESSION['resto']['mesa1']='verd';
		$_SESSION['resto']['mesa2']='verd';
		$_SESSION['resto']['mesa3']='verd';
		$_SESSION['resto']['mesa4']='verd';
	    $_SESSION['resto']['mesa5']='verd';
		if($_SESSION['usuario']['priv']==2)
		header('Location: ../admin/cuentas_chef.php');
		elseif($_SESSION['usuario']['priv']==1)
		header('Location: ../admin/reg_del.php');
		elseif($_SESSION['usuario']['priv']==3)
		header('Location: ../admin/entregas.php');
		else
		header('Location: ../admin');
	}
	else
	 header('Location: error.php');
?>