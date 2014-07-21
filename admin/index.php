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
			if(!isset($_SESSION['usuario']['dni']))
			{
echo  '<center><h5>Ingrese sus datos</h5></center>
        <div class="clear"></div>
        <div class="block-3">
		
		<center>
        	<form action="../Controlador/ingresar_sistema.php" class="form_usr" name="enviar" type="get">
                        <table width="25%" border="0" cellspacing="2" cellpadding="0" align="">
                            <tbody align="">
                                <tr>
                                    <td align="right"><b>DNI : </b></td>
                                    <td>
                                        <input name="dni" type="number" id="dni" value="" size="8" required /> 
                                    </td>
                                </tr>
                                <tr>
                                    <td align="" font-style="italic"><b>PASSWORD </b></td>
                                    <td>
                                        <input type="password" name="password" id="password" size="8" required/> 
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right">
										
                                    </td>
                                    <td align="">
                                        <input type="submit" name="enviar" value="Logear"/></td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td align=""><a href="recupera.php">¿Perdiste la contraseña?</a><br />
                                        </td>
                                </tr>                                
                            </tbody>                                                        
                        </table>
                    </form>';}
					elseif($_SESSION['usuario']['priv']==0)
					{
					echo '<center><h2>Mesas</h2></center>
										<form action="../Controlador/reg_pedido.php" name="enviar" method="post">
					 <table  id ="" width="100%" border="1" cellspacing="2" cellpadding="0">
                            
                                <tr>
                                    <td align="center">
									Estado de mesas:
									<div class="main">
					</div>
					</td>
                                    <td align="center" width="50%">
									Mesa :
									<select name="mesa" id="mesa" required/>';
									$m = new Model(Config::$mvc_bd_hostname, Config::$mvc_bd_usuario,
													Config::$mvc_bd_clave, Config::$mvc_bd_nombre);
									$datos = array();
									$datos = $m->listarMesas();
									
									for($i=0;$i < count($datos);$i++)
									{
										echo '<option value="'.$datos[$i]['id_mesa'].'">Mesa '.$datos[$i]['id_mesa'].'</option>
										';
									}
									echo'
									</select>';
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
								</br>
									Leyenda:
									<img src="../imagenes/leyen.png" >
									</td>
								</tr>
                                                                                    
                        </table>';
					}
					
					else{
					if($_SESSION['usuario']['priv']==3)
					header('Location: entregas.php');
					
					if($_SESSION['usuario']['priv']==1)
					header('Location: cuentas.php');
					}
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
<!--==============================footer================================= #table tbody tr td #table_added tbody tr-->
  <footer>
      <p>© 2012  Valencia<br>Plantillas web profesionales gratuitas <a href="http://www.mejoresplantillasgratis.es" target="_blank">en www.mejoresplantillasgratis.es</a>.<br>
      <a rel="nofollow" href="http://www.templatemonster.com/" target="_blank" class="link">Website Template</a> by TemplateMonster.com</p> 
  </footer>	 
</div> 
</div>       
</body>
</html>
