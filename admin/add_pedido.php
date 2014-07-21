<?php 

session_start();

if(isset($_POST['cod']))
$cod = $_POST['cod'];

$cantidad = $_POST['cantidad'];
$pizza = $_POST['pizzas'];
$tamaño = $_POST['tamaño'];
if($_POST['mesa']!="delivery")
{$mesa = $_POST['mesa'];
$tipo = 0;}
else
{$tipo = 1;$mesa=99;}
$id_sucursal = $_SESSION['usuario']['suc'];
$fecha = time();
                  
 $mysqli = new mysqli("mysql.hostinger.es", "u648084236_np", "paramore761", "u648084236_np");
 
			$mysqli->autocommit(FALSE);
			$all_query_ok=true;
   
			for($i=0;$i<count($cantidad);$i++)
				{
					$mysqli->query("INSERT INTO pedido (id_pedido,id_estadop,id_mesa,fecha,id_sucursal) VALUES (".$cod.",1,$mesa,$fecha,0)") ? null : $all_query_ok=false;
					$mysqli->query("INSERT INTO pedido_detalle (id_pedido,id_pizza,cantidad,tipo_pedido,tamano) VALUES (".$cod.",".$pizza[$i].",".$cantidad[$i].",$tipo,".$tamaño[$i].")") ? null : $all_query_ok=false;
				}
			
			if($all_query_ok)
			{$mysqli->commit(); header("Location: editar_pedido.php?cod=$cod");
			}
			else
			{
			$mysqli->rollback();header("Location: editar_pedido.php?cod=$cod");}
			
			$mysqli->close();
		

  //$m->añadirPedido($arreglo);
 //header('Location: ../admin');
 ?>
