<?php
session_start();
?>
 <table width="30%" border="1" cellspacing="2" cellpadding="0">
                           
                                <tr>
                                    <td align="center"> <img src="../imagenes/m_<?php echo $_SESSION['resto']['mesa1']; ?>.png" width="60" height="60" onClick="checkearTecla(1)"> </td>
                                    <td align="center"> <img src="../imagenes/m_<?php echo $_SESSION['resto']['mesa2']; ?>.png" width="60" height="60" onClick="checkearTecla(2)">  </td>
                                </tr>
                                <tr>
                                    <td  align="center"> <img src="../imagenes/m_<?php echo $_SESSION['resto']['mesa3']; ?>.png" width="60" height="60" onClick="checkearTecla(3)"></td>
                                    <td align="center"> <img src="../imagenes/m_<?php echo $_SESSION['resto']['mesa4']; ?>.png" width="60" height="60" onClick="checkearTecla(4)"></td>
                                </tr>
                                <tr>
                                    <td align="center"><img src="../imagenes/m_<?php echo $_SESSION['resto']['mesa5']; ?>.png" width="60" height="60" onClick="checkearTecla(5)">  </td>
									
                                </tr>
                                                                                 
                        </table>
<script>

function checkearTecla(e)
{
	
	var dataString = 'num_mesa=mesa' + e;// + '&message=' + message;
		
	$.ajax({
			type: "POST",
			url: "../enviar_estado.php",
			data: dataString,
			success: function() {
				//document.write("");
			}
		});
		$('.main').load('../mostrar_mesas.php');
}
</script>

