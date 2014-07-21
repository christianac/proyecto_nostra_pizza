<?php
session_start();
$num_mesa = $_POST['num_mesa'];
if($_SESSION['resto']["$num_mesa"]=='verd')
$_SESSION['resto'][$num_mesa]="amar";
else if ($_SESSION['resto']["$num_mesa"]=='amar')
$_SESSION['resto'][$num_mesa]="roja";
else
$_SESSION['resto'][$num_mesa]="verd";

?>