<?php

 class Model
 {
     protected $conexion;
     public function __construct($dbhost,$dbuser,$dbpass,$dbname)
     {
       $mvc_bd_conexion = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	   
	   
       if ($mvc_bd_conexion->connect_error) {
           die('No ha sido posible realizar la conexión con la base de datos: ' . $mvc_bd_conexion->connect_errno);
       }
       //mysql_select_db($dbname, $mvc_bd_conexion);

	   
       //mysql_set_charset('utf8');

       $this->conexion = $mvc_bd_conexion;
     }



     public function bd_conexion()
     {

     }
	
	function paginar($total,$numero_res)
	{
		return round($total/$numero_res);
		
	}
	
     function conectar_usuarios($dni_usuario, $password_usuario) {
		
		$sql = "select * from usuarios where dni=".$dni_usuario." and pass='".$password_usuario."'";
         $result = mysqli_query($this->conexion,$sql);

         $datos = array();
		 
         while ($row = mysqli_fetch_assoc($result))
         {
             $datos = $row;
         }

         return $datos;

	}
	
	function listar_usuarios() {
		
		$sql = "select * from usuarios where priv!=3 and habilitado=0";
         $result = mysqli_query($this->conexion,$sql);

         $datos = array();
		 
         while ($row = mysqli_fetch_assoc($result))
         {
             $datos[] = $row;
         }

         return $datos;

	}
	
	function añadirUsuario($dni,$nom,$ape,$pass,$pues,$priv,$hab,$suc){
		$sql = "CALL `u648084236_np`.`insertarUsuario`($dni,'$nom', '$ape', '$pass', '$pues', $priv,$hab, $suc)";
		$result = mysqli_query($this->conexion, $sql);
	}
	
     public function listarMesas()
     {
         $sql = "select id_mesa from mesa";

         $result = mysqli_query($this->conexion, $sql);

         $mesa = array();
         while ($row = mysqli_fetch_assoc($result))
         {
             $mesa[] = $row;
         }

         return $mesa;
     }
	 
	 public function variable()
     {
         $sql = "select variable from variable where id_var=1";

         $result = mysqli_query($this->conexion, $sql);

         $var = array();
         while ($row = mysqli_fetch_assoc($result))
         {
             $var[] = $row;
         }

         return $var[0];
     }
	 
	 public function listarPizzas()
     {
         $sql = "select id_pizza,nombre_pizza,precio_pizza from pizza";

         $result = mysqli_query($this->conexion, $sql);

         $pizza = array();
         while ($row = mysqli_fetch_assoc($result))
         {
             $pizza[] = $row;
         }

         return $pizza;
     }
	

	 
	
	 
	 public function listar_all_det($inicio,$limite)
     {	 
         $sql = "select id_pedido,id_pizza,cantidad,tipo_pedido,id_recibo,cancelado from pedido_detalle group by id_pedido limit $inicio,$limite";

         $result = mysqli_query($this->conexion, $sql);

         $detalle = array();
         while ($row = mysqli_fetch_assoc($result))
         {
             $detalle[] = $row;
         }

         return $detalle;
     }
	 
	 public function editar_det($cod)
     {	 $cod=$cod;
         $sql = "select pk_ped_Det,id_pedido,id_pizza,cantidad,tipo_pedido,id_recibo,cancelado,eliminado,tamano from pedido_detalle where id_pedido=$cod AND eliminado=0";

         $result = mysqli_query($this->conexion, $sql);

         $detalle = array();
         while ($row = mysqli_fetch_assoc($result))
         {
             $detalle[] = $row;
         }

         return $detalle;
     }
	 
	 	public function listar_det()
     {	 
         $sql = "select * from pedido_detalle,pedido where pedido_detalle.id_pedido=pedido.id_pedido and  pedido.id_estadop<5  group by pedido.id_pedido";

         $result = mysqli_query($this->conexion, $sql);

         $detalle = array();
         while ($row = mysqli_fetch_assoc($result))
         {
             $detalle[] = $row;
         }

         return $detalle;
     }
	 
	 public function contar()
     {	 
         $sql = "select pedido_detalle.id_pedido,pedido.id_pedido from pedido_detalle,pedido where pedido_detalle.id_pedido=pedido.id_pedido and  pedido.id_estadop<5  group by pedido.id_pedido";

         $result = mysqli_query($this->conexion, $sql);

         $detalle = array();
         while ($row = mysqli_fetch_assoc($result))
         {
             $detalle[] = $row;
         }

         return count($detalle);
     }
	 
	  public function contar_all()
     {	 
         $sql = "select id_pedido from pedido_detalle group by id_pedido";

         $result = mysqli_query($this->conexion, $sql);

         $detalle = array();
         while ($row = mysqli_fetch_assoc($result))
         {
             $detalle[] = $row;
         }

         return count($detalle);
     }
	 
	 public function get_estado($i)
     {	 
         $sql = "select id_estadop from pedido where id_pedido=$i";

         $result = mysqli_query($this->conexion, $sql);

         $detalle = array();
         while ($row = mysqli_fetch_assoc($result))
         {
             $detalle[] = $row;
         }

         return $detalle;
     }
	 
	 public function get_estado_name($i)
     {	 
         $sql = "select nombre_estado from estado_pedido where id_estadop=$i";

         $result = mysqli_query($this->conexion, $sql);

         $detalle = array();
         while ($row = mysqli_fetch_assoc($result))
         {
             $detalle[] = $row;
         }

         return $detalle[0];
     }
	 
	 public function eliminar_ped_det($pk,$id)
     {	 
         $sql = "update pedido_detalle SET eliminado=1 where pk_ped_Det=$pk AND id_pedido=$id";

         $result = mysqli_query($this->conexion, $sql);
     }
	 
	 public function set_estado($cod,$id_estadop)
     {	 
         $sql = "update pedido SET id_estadop=$id_estadop where id_pedido=$cod";

         $result = mysqli_query($this->conexion, $sql);
     }
	 
	 public function get_tipo($tipo)
	 {
		if($tipo==0)
		return 'Local';
		else
		return 'Delivery';
	}
	 
	 public function get_suc($suc)
	 {
		if($suc==0)
		return 'Barranca';
		else
		return 'Paramonga';
	}
	
	 public function get_nompizza($set_id)
     {		$id = $set_id;
         $sql = "select nombre_pizza,precio_pizza from pizza where id_pizza=$id";

         $result = mysqli_query($this->conexion, $sql);

         $nombre = array();
         while ($row = mysqli_fetch_assoc($result))
         {
             $nombre[] = $row;
         }
         return $nombre;
     }
     
	  public function get_numesa($ped)
     {		$id = $ped;
         $sql = "select id_mesa from pedido where id_pedido=$id";

         $result = mysqli_query($this->conexion, $sql);

         $mesa = array();
         while ($row = mysqli_fetch_assoc($result))
         {
             $mesa[] = $row;
         }
         return $mesa;
     }

 }
 ?>