<?php
// Incluir el modelo
require_once('libreria.php');
// Incluir el modelo
require_once('modelo.php');
// Incluir la presentacion
require_once('vista.php');



if( isset( $_POST["opcion"] ) && $_POST["opcion"] == "comprobar" ) 
{
	// campo_requerido funcion_validacion
	$campos = array( 
				array( 'nombre' => 'numero', 'funcion' => 'checkNumero' ),
				array( 'nombre' => 'serie', 'funcion' => 'checkSerie' ), 
				array( 'nombre' => 'fecha', 'funcion' => 'checkFecha' ) );
	$missingFields = processForm( $campos );

	if ( $missingFields ) 
	{
		displayEntrada( $missingFields);
	} 
	else 
	{
		$resultados = getResultados( $_POST["fecha"] );
		
		displayResultados($resultados );
	}
} 
else 
{
	displayEntrada( array() );
}


?>