<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" media="screen" href="../css/reset.css">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/style.css">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/slider.css">
    <link href='http://fonts.googleapis.com/css?family=Great+Vibes' rel='stylesheet' type='text/css'>
    <script src="../js/jquery-1.7.min.js"></script>
    <script src="../js/jquery.easing.1.3.js"></script>
    <script src="../js/tms-0.4.1.js"></script>
	
  
	<script>
		$(document).ready(function(){ 
			$('#mostrar_form').on('click',function(){
			$('#form_add').toggle('slow');
			});
		});
	</script>
</head>
<body>
<div class="bg-top">
<div class="bgr">
    <header>
	<h1><a href="index.php"><img src="images/logo.jpg" alt=""></a></h1>
        <?php
		session_Start();
		$cod=$_GET['cod'];
		require_once  '../Controlador/app/Config.php';
		require_once  '../Controlador/app/Modelo.php';
		if(isset($_SESSION['usuario']['dni']))
		include '../menu-admin.php';
		?>
        
    </header>  
	
    <section id="content"><div class="ic"></div>
       
       <div class="block-2 pad-1">
	   <center>
        <h2>Editar Pedido</h2>
		
		<?php
		$m = new Model(Config::$mvc_bd_hostname, Config::$mvc_bd_usuario,
													Config::$mvc_bd_clave, Config::$mvc_bd_nombre);
		
		$datos = $m->editar_det($cod);
		
		if(count($datos)==0)
		header('Location: cuentas.php');
		
		$subtotal = 0;
			 echo '
			 <form action="reg_edit_ped.php" type="get">
			 <table id="newspaper-a">	<thead>	<tr>
									<th scope="col">Mesa Nº</th>
									<th scope="col">Pedido</th>
									<th scope="col">Tamaño</th>
									<th scope="col">Cantidad</th>
									<th scope="col">Tipo Pedido</th>
									<th scope="col">Importe</th>';
									if($_SESSION['usuario']['priv']==0)
									echo '<th scope="col">Eliminar</th>';
									echo '</tr>		</thead><tbody>';
				if($m->get_numesa($cod)[0]['id_mesa']!=99){
				print '<select name="mesa" id="mesa">';
								
								$mesas = $m->listarMesas();
								for($x=0;$x < count($mesas);$x++)
									{
										if($m->get_numesa($cod)[0]['id_mesa']==$mesas[$x]['id_mesa'])
										print '<option value="'.$mesas[$x]['id_mesa'].'" selected>Mesa '.$mesas[$x]['id_mesa'].'</option>';
										else
										print '<option value="'.$mesas[$x]['id_mesa'].'">Mesa '.$mesas[$x]['id_mesa'].'</option>';
									}
									
								echo '</select></td>';}
				
				
			 for($j=0;$j<count($datos);$j++)
			 { 
			 echo '
								
								<tr><td>'.$m->get_numesa($datos[$j]['id_pedido'])[0]['id_mesa'].'
								<input type="hidden" id="pk[]" name="pk[]" value='.$datos[$j]['pk_ped_Det'].'>
								</td>
								<td><select name="pizza[]" id="pizza" required/> ';
									$pizzas = $m->listarPizzas();
									
									for($i=0;$i < count($pizzas);$i++)
									{
									if($pizzas[$i]['nombre_pizza']==$m->get_nompizza($datos[$j]['id_pizza'])[0]['nombre_pizza'])
										echo '<option value="'.$pizzas[$i]['id_pizza'].'" selected>'.$pizzas[$i]['nombre_pizza'].'</option>';
										else
										echo '<option value="'.$pizzas[$i]['id_pizza'].'">'.$pizzas[$i]['nombre_pizza'].'</option>';
									}
									
								echo '</select><td>
								<select name="tamaño[]">';
								
								$tamaños = array("Ninguno","Personal","Mediana","Familiar","Extra-Familiar");
								for($i=0;$i < count($tamaños);$i++)
									{
									if($datos[$j]['tamano']==$i)
									echo '<option value="'.$i.'" selected>'.$tamaños[$i].'</option>';
									else
									echo '<option value="'.$i.'">'.$tamaños[$i].'</option>';
									}
								print '</select></td>
								
								<td><input name="cantidad[]" type="text" value="'.$datos[$j]['cantidad'].'" size="5"></td>
								<td>'.$m->get_tipo($datos[$j]['tipo_pedido']).'</td>
								<td>S/. '.$m->get_nompizza($datos[$j]['id_pizza'])[0]['precio_pizza'].'</td>';
								if($_SESSION['usuario']['priv']==0)
								echo '<td><button><a href="eliminar_pedido.php?cod='.$cod.'&pk='.$datos[$j]['pk_ped_Det'].'" onClick="return confirm('."'Esta seguro?'".')">Eliminar</a></button></td>';
								
								$subtotal = $subtotal+$m->get_nompizza($datos[$j]['id_pizza'])[0]['precio_pizza'];
								}
								echo '</tr>
								<tr><td></td><td></td><td></td><td></td><td>Total</td><td>S/. '.$subtotal.'</td><td><input type="hidden" name="cod" value='.$cod.'></td>
								<tr><td></td><td></td><td></td><td></td><td></td><td><button type="submit" onClick="return confirm('."'Guardar la edicion?'".')">Guardar</button></td><td></td></tr></table></form>';
								if($_SESSION['usuario']['priv']==1){
								echo '<table id="newspaper-a">
								<tr><td>Cajero:</td><td>'.$_SESSION['usuario']['apellido'].', '.$_SESSION['usuario']['nombre'].'</td><td></td><td></td><td></td></tr>
								<tr><td>Sucursal:</td><td>'.$m->get_suc($_SESSION['usuario']['suc']).'</td><td></td><td></td><td></td></tr>
								<tr><td>Fecha:</td><td>'.date('d/m/Y', time()).'</td><td>Hora: </td><td>'.date('g:ia', time()).'</td><td>Codigo: '.str_pad($cod, 7, "NP00000", STR_PAD_LEFT).'</td></tr>
								<h2>O añadir pedido:</h2>
								</table>'; 
								}
								else
								echo '';
								
							if($_SESSION['usuario']['priv']==0)
							{
							echo "<h4>O añadir al pedido</h4></br><button id='mostrar_form'>Añadir</button>";
							
					echo '<div id="form_add" style="display:none"> <form action="add_pedido.php" name="enviar" method="post">
							
                                 <table id="table_added" width="50%">
									<thead>
										<tr>
											<th width="13" scope="col">Producto</th>
									<th width="13" scope="col">Tamaño</th>
									<th width="14" scope="col">Cantidad</th>
									<th width="81" scope="col">&nbsp;</th>
								</tr>
								</thead>
									<tbody>
									<tr>
								<td><input type="hidden" name="cod" value='.$cod.'>
								<input type="hidden" name="mesa" value='.$m->get_numesa($cod)[0]['id_mesa'].'>
									<select name="pizzas[]" >';
									?>
                    <?php
					$datos_p = array();
					$datos_p = $m->listarPizzas();
									
									for($i=0;$i < count($datos_p);$i++)
									{
										echo '<option value="'.$datos_p[$i]['id_pizza'].'">'.$datos_p[$i]['nombre_pizza'].'</option>';
									}
					?>
                </select>
            </td>
			<td>
			<select name="tamaño[]">
			<option value="0">Ninguno</option>
			<option value="1">Personal</option>
			<option value="2">Mediana</option>
			<option value="3">Familiar</option>
			<option value="4">Extra-Familiar</option>
			</select>
			</td>
            <td>
				
                <input name="cantidad[]" id="" type="text" autocomplete="off" value="1">
            </td>
            <td>
                <button type="button" class="btn remove_button">Remover</button>
            </td>
        </tr>
		<button type="button" class="add" >Añadir Fila</button><button type="submit" onClick="return confirm('Desea guardar?')">Enviar</button>
		
    </tbody>

		</table>	
</form></div>
									<?php }	?>
         </div>
        </div>
       </div>
    </section> 

	 
</div> 
</div> 

<script>
	$(document).ready(function ($) {
    // trigger event when button is clicked
    $("button.add").click(function () {
        // add new row to table using addTableRow function
        addTableRow($("#table_added"));
        // prevent button redirecting to new page
        return false;

    });

    // function to add a new row to a table by cloning the last row and 
    // incrementing the name and id values by 1 to make them unique
    function addTableRow(table) {

        // clone the last row in the table
        var $tr = $(table).find("tbody tr:last").clone();


        // get the name attribute for the input and select fields
        $tr.find("input,select").attr("name", function () {
            // break the field name and it's number into two parts
            var parts = this.attr;//.match(/(\D+)(\d+)$/);
            // create a unique name for the new field by incrementing
            // the number for the previous field by 1
            return parts;//[1] + ++parts[2];

            // repeat for id attributes
        }).attr("id", function () {
            var parts = this.attr;//id.match(/(\D+)(\d+)$/);
            return parts;//[1] + ++parts[2];
        });
        // append the new row to the table
        $(table).find("tbody tr:last").after($tr);
        $tr.hide().fadeIn('slow');

        // row count
        rowCount = 0;
        $("#table tr td:first-child").text(function () {
            return ++rowCount;
        });

        // remove rows
        $(".remove_button").on("click", function () {
            if ( $('#table tbody tr').length == 1) return;
            $(this).parents("#table_added tbody tr").fadeOut('slow', function () {
                $(this).remove();
                rowCount = 0;
                $("#table tr td:first-child").text(function () {
                    return ++rowCount;
                });
            });
        });

    };
});
	</script>     
</body>
</html>
