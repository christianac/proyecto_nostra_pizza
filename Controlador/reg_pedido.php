<?php 

session_start();

$cantidad = $_POST['cantidad'];
$pizza = $_POST['pizzas'];
$mesa = $_POST['mesa'];
$tamaño = $_POST['tamaño'];
if(isset($_POST['tipo']))
{$tipo = $_POST['tipo'];
$mesa = 99;}
else
$tipo = 0;
$id_sucursal = $_SESSION['usuario']['suc'];
$fecha = time();
$e=0;
                  
 $mysqli = new mysqli("mysql.hostinger.es", "u648084236_np", "paramore761", "u648084236_np");
 
 
        $sql = "select variable from variable where id_var=1";
		$result = $mysqli->query($sql);
		$var = array();
        while ($row = mysqli_fetch_assoc($result))
         {
             $var = $row;
         }

     
 
	 
	 
	//$var_temp = variable($mysqli)['variable'];
	
			$mysqli->autocommit(FALSE);
			$all_query_ok=true;
   
			for($i=0;$i<count($cantidad);$i++)
				{
					$mysqli->query("INSERT INTO pedido (id_pedido,id_estadop,id_mesa,fecha,id_sucursal) VALUES (".$var['variable'].",1,$mesa,$fecha,0)") ? null : $all_query_ok=false;
					$mysqli->query("INSERT INTO pedido_detalle (id_pedido,id_pizza,cantidad,tipo_pedido,tamano) VALUES (".$var['variable'].",".$pizza[$i].",".$cantidad[$i].",$tipo,".$tamaño[$i].")") ? null : $all_query_ok=false;
				}
				
			
			
			if($all_query_ok)
			{
			
			$mysqli->commit(); 
			$n_var = $var['variable'] + 1;
			$mysqli->query("update variable set variable = $n_var where id_var=1");
			header("Location: ../admin/cuentas.php");
			}
			else
			$mysqli->rollback(); header("Location: ../admin/cuentas.php");
			
			$mysqli->close();
		
		 
	 

  //$m->añadirPedido($arreglo);
 //header('Location: ../admin');
 ?>
