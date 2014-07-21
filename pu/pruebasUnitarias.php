<?php

include 'simpletest/autorun.php';
include 'simpletest/web_test.php';
include 'Modelo.php';



class pruebasUnitarias extends UnitTestCase{

	function testPruebaUnitaria(){
	
		$Modelo = new Model('mysql.hostinger.es','u648084236_np','paramore761','u648084236_np');
		//Probando que se llama correctamente el archivo
		$this->assertTrue('Modelo.php');
		//Probando que se listan correctamente los usuarios y la cantidad en el array son 3
		//Muestran 3 por que la funcion solo es para listar los que no son JEFES ADMINISTRADORES
		$this->assertTrue(count($Modelo->listar_usuarios())==3);
		
		$this->assertEqual('Jose',$Modelo->listar_usuarios()[2]['nombre']);
		//Probando que se listan correctamente las mesas y la cantidad en el array son 6
		$this->assertTrue(count($Modelo->listarMesas())==6);
	}
	
}

?>