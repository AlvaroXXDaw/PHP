<?php
// Incluir el modelo
require_once('modelo.php');
// Incluir la presentacion
require_once('vista.php');

if(  isset( $_GET['opcion'] ) && $_GET['opcion'] == 'jornada' )
{
	$resultados = getResultados();

	print_jornada( $resultados );
}
elseif( isset( $_GET['opcion'] ) && $_GET['opcion'] == 'clasificacion' )
{
	$clasificacion = getClasificacion();
	print_clasificacion( $clasificacion );
}
else
	print_inicio( );


?>