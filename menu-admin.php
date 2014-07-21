<?php
		echo '<b><label>';
		if($_SESSION['usuario']['priv']==0)
		echo '</br>Logeado como Mesero';
		elseif($_SESSION['usuario']['priv']==1)
		echo '</br>Logeado como Cajero';
		elseif($_SESSION['usuario']['priv']==2)
		echo '</br>Logeado como Cocinero';
		elseif($_SESSION['usuario']['priv']==3)
		echo '</br>Logeado como Jefe Administrador'; echo'</label></b>';
echo '
        <center><nav>  
            <ul class="menu">';
			if($_SESSION['usuario']['priv']==0)
            echo '<li><a href="index.php">Mesas</a></li>';
			if($_SESSION['usuario']['priv']==1)
			echo '<li><a href="reg_del.php">Registrar Delivery</a></li>';
			if($_SESSION['usuario']['priv']==0)
            echo '<li><a href="cuentas.php">En espera</a></li>';
			if($_SESSION['usuario']['priv']==2)
            echo '<li><a href="cuentas_chef.php">En espera</a></li>';
			if($_SESSION['usuario']['priv']==1)
			echo '<li><a href="cuentas.php">Facturar</a></li>';
				if($_SESSION['usuario']['priv']==3)
				echo ' <li><a href="entregas.php">Registros</a></li>';
				if($_SESSION['usuario']['priv']==3)
				{
					echo '<li><a href="crear_user.php">Crear Usuario</a></li>';
					echo '<li><a href="listar_user.php">Listar Usuarios</a></li>';
					echo '<li><a href="nuevo_producto.php">Nuevo Producto</a></li>';
				}
                echo '<li><a href="../sess_des.php">Logout</a></li>
            </ul>
            <div class="clear"></div>
         </nav></center>';
		 ?>