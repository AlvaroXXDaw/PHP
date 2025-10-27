<?php

require "db.php";




function getTorneos()
{
	$sentencia = "SELECT TORNEO_ID, TORNEO, FECHA FROM tenis_torneos ORDER BY FECHA ASC;";
	$resultado  = $GLOBALS['DB']->prepare($sentencia);
	$resultado->execute();
	$torneos = $resultado->fetchAll();
	

	return( $torneos );
}


?>