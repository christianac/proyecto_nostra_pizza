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
	
</head>
<body onLoad="$('.main').load('../mostrar_mesas.php');">
<div class="bg-top">
<div class="bgr">
    <header>
	<h1><a href="index.php"><img src="images/logo.jpg" alt=""></a></h1>
        <?php
		session_Start();
		require_once  '../Controlador/app/Config.php';
		require_once  '../Controlador/app/Modelo.php';
		if(isset($_SESSION['usuario']['dni']))
		include '../menu-admin.php';
		?>
        
    </header>  
	
    <section id="content"><div class="ic"></div>
       
       <div class="block-2 pad-1">
	   
			<?php
			
					if($_SESSION['usuario']['priv']==1)
					{
					echo '<center><h2>Registrar Delivery</h2></center>
										<form action="../Controlador/reg_pedido.php" name="enviar" method="post">
					 <table  id ="" width="100%" border="1" cellspacing="2" cellpadding="0">
                            
                                <tr>
                                   
                                    <td align="center" width="50%">
									<input type="hidden" name="tipo" value="1">';
									$m = new Model(Config::$mvc_bd_hostname, Config::$mvc_bd_usuario,
													Config::$mvc_bd_clave, Config::$mvc_bd_nombre);
									
									?>
									
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
			<td>
                <select name="pizzas[]" >
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
    </tbody>
</table>
<button type="button" class="add" >Añadir</button>

<button type="submit" onClick="return confirm('Desea guardar?')">Enviar</button>
			
</form>
									<?php
									echo '
									</td>
                                </tr>                           
								<tr>
								 <td align="center" width="50%">
								 <b>Sucursal : ';
								 if($_SESSION['usuario']['suc']==0)
								 echo 'Barranca';
								 else
								 echo 'Paramonga';
								 echo '</b></br>
									</td>
								</tr>
                                                                                    
                        </table>';
					}
					
					elseif($_SESSION['usuario']['priv']==3)
					header('Location: entregas.php');
					elseif($_SESSION['usuario']['priv']==1)
					header('Location: cuentas.php');
?>
			</center>
            
			


            </div>
        </div>
       </div>
    </section> 

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
</div> 
</div>       
</body>
</html>
