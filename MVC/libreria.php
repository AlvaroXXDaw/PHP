<?php

function fechaUSA($fecha )
{	
	//echo "[" . $fecha . "]" ;
	$partes = explode("-", $fecha);

	return $partes[2] . "-" . $partes[1] . "-" . $partes[0];
	
}

function checkNumero( $numero )
{
	if( strlen( $numero ) == 5 && is_numeric( $numero ) ) 
		$resultado = 1;
	else 
		$resultado = 0;
	return $resultado;
		
}

function checkSerie($serie)
{
if(is_numeric($serie) && $serie <99 && $serie >0)
{
return 1;
} else return 0;

}

function checkFecha($fecha )
{	
	
	
	$resultado  = false;
	$partes = explode("-", $fecha);
	if( isset($partes[0]) && isset($partes[1]) && isset($partes[2]) )
	{
		if (  checkdate($partes[1], $partes[0], $partes[2]) ) $resultado = true;
	}
	return $resultado;
	
}

function validateField( $fieldName, $missingFields ) 
{
	if ( in_array( $fieldName, $missingFields ) ) 
	{
		echo ' class="error"';
	}
}
function processForm( $campos ) 
{
	
	
	foreach ( $campos as $campo ) 
	{
		if ( !isset( $_POST[$campo[ 'nombre' ] ] ) or !$_POST[$campo[ 'nombre' ] ] ) 
		{
			$missingFields[] = $campo[ 'nombre' ];
		}
		elseif( ! call_user_func( $campo[ 'funcion' ],  $_POST[$campo[ 'nombre' ] ] ) )
		{
			$missingFields[] = $campo[ 'nombre' ];
		}
		
	}

	if( isset ( $missingFields ) )
		return( $missingFields );
	else
		return null;
	
}