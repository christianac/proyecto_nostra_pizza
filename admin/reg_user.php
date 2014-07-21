<?php 

session_start();

$dni = $_POST['dni'];
$nombre = $_POST['nombre'];
$ap = $_POST['apellidos'];
$pass = md5($_POST['password']);
$pues = $_POST['puesto'];
$priv =$_POST['priv'];
$hab = 0;
$suc = $_POST['id_sucursal'];


require_once  '../Controlador/app/Config.php';
require_once  '../Controlador/app/Modelo.php';


$m = new Model( Config::$mvc_bd_hostname, Config::$mvc_bd_usuario,
                     Config::$mvc_bd_clave,Config::$mvc_bd_nombre);
 
  $m->añadirUsuario($dni,$nombre,$ap,$pass,$pues,$priv,$hab,$suc);
	header('Location: entregas.php');
 ?>
