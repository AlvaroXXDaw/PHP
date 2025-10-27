<?php
// Incluir el modelo
require_once('modelo.php');
// Incluir la presentacion
require_once('vista.php');

if(  !isset( $_GET['opcion'] ))
{
	$torneos=getTorneos();
	displayTorneos($torneos);
}



?>