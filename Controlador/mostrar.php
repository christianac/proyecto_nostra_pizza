<?php
session_Start();
$mesa = $_POST['mesa'];
$cantidad = $_POST['cantidad'];
$pizzas =$_POST['pizzas'];
$id_sucursal = $_SESSION['usuario']['suc'];
$fecha = time();
//echo $nom_part[0];
$arreglo = '';

for($i=0;$i<count($cantidad);$i++)
{
	$arreglo .= "CALL `sistemanp`.`insertarPedido`(0,$mesa,'$fecha', $id_sucursal);";
}


						
echo $sentence;
/*var_dump($p);
var_dump ($mesa);
*/
?>