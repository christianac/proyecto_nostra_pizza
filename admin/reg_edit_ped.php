<?php 

session_start();

$mesa = $_GET['mesa'];
$cantidad = $_GET['cantidad'];
$tamaño = $_GET['tamaño'];
$pizza = $_GET['pizza'];
$pk= $_GET['pk'];
$cod= $_GET['cod'];
$id_sucursal = $_SESSION['usuario']['suc'];
$fecha = time();

                  
 $mysqli = new mysqli("mysql.hostinger.es", "u648084236_np", "paramore761", "u648084236_np");
 
 
			$mysqli->autocommit(FALSE);
			$all_query_ok=true;
   
			for($i=0;$i<count($cantidad);$i++)
				{
					$mysqli->query("update pedido SET id_mesa=$mesa where id_pedido=$cod") ? null : $all_query_ok=false;
					$mysqli->query("update pedido_detalle SET tamano=".$tamaño[$i].",cantidad=".$cantidad[$i].",id_pizza=".$pizza[$i].",cantidad=".$cantidad[$i]." where pk_ped_Det=".$pk[$i]." AND id_pedido=$cod") ? null : $all_query_ok=false;
				}
			
			if($all_query_ok)
			{$mysqli->commit(); header("Location: editar_cuenta.php?cod=$cod");;
			}
			else
			$mysqli->rollback();
			
			$mysqli->close();
		
		 
	 

  //$m->añadirPedido($arreglo);
 //header('Location: ../admin');
 ?>
