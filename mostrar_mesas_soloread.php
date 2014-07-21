<?php
session_start();
if (isset($_SESSION['resto']['mesa1']))
{
echo '<center>
<div class="h3">
       			<h3 class="h3-line-2">Estado de Mesas en tiempo real:</h3>
            </div>
 <table width="30%" border="0" cellspacing="2" cellpadding="0">
                            
                                <tr>
                                    <td align="center"> <img src="imagenes/m_'.$_SESSION['resto']['mesa1'].'.png" width="60" height="60" > </td>
                                    <td align="center"> <img src="imagenes/m_'.$_SESSION['resto']['mesa2'].'.png" width="60" height="60" >  </td>
                                </tr>
                                <tr>
                                    <td  align="center"> <img src="imagenes/m_'.$_SESSION['resto']['mesa3'].'.png" width="60" height="60" ></td>
                                    <td align="center"> <img src="imagenes/m_'.$_SESSION['resto']['mesa4'].'.png" width="60" height="60" ></td>
                                </tr>
                                <tr>
                                    <td align="center"><img src="imagenes/m_'.$_SESSION['resto']['mesa5'].'.png" width="60" height="60" >  </td>
								
                                    <!--td align="center"> <img src="imagenes/m_verd.png" width="60" height="60"> </td-->
                                </tr>
                                <!--tr>
                                    <td align="center"> <img src="imagenes/m_verd.png" width="60" height="60"> </td>
                                    <td align="center"> <img src="imagenes/m_verd.png" width="60" height="60"> </td>
                                </tr-->                                                     
                        </table><center>';
						}
						else
						echo '<center><h3 class="h3-line-2">No disponible</h3>';
						 
						?>

