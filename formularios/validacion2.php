<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<style type="text/css">
	.error { background: #d33; color: white; padding: 0.2em; }
	</style>
</head>

<body>
<?php
function checkPassword( $password )
{	
	if( strlen( $password ) < 5 ) 
		$resultado = 0;
	else 
		$resultado = 1;
	return $resultado;
}

function checkUsuario( $usuario )
{	
	if( strlen( $usuario ) < 5 ) 
		$resultado = 0;
	else 
		$resultado = 1;
	return $resultado;
}

function checkCP( $cp )
{	
	if( (strlen( $cp ) < 5) || (!ctype_digit($cp)) ) 
		$resultado = 0;
	else 
		$resultado = 1;
	return $resultado;
}

function checkPhoneNumber( $phoneNumber )
{	
	if( (strlen($phoneNumber)<9) || (!ctype_digit($phoneNumber)) )
		$resultado = 0;
	else 
		$resultado = 1;
	return $resultado;
}

function validateField( $fieldName, $missingFields ) 
{
	if ( in_array( $fieldName, $missingFields ) ) 
	{
		echo ' class="error"';
	}
}

function setValue( $fieldName ) 
{
	if ( isset( $_POST[$fieldName] ) ) 
	{
		echo $_POST[$fieldName];
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

function displayEntrada( $missingFields )
{
	?>
	<H1>Introduce Identificación</H1>
	<FORM METHOD=POST ACTION="validacion.php">
		<INPUT TYPE="hidden" name="opcion" value ="entrada">
	<br>
	<label for="usuario" <?php validateField( "usuario",	$missingFields ) ?>>Usuario</label>
		<INPUT TYPE="text" NAME="usuario">
	<br>
	<label for="password" <?php validateField( "password",	$missingFields ) ?>>Password</label>
		<INPUT TYPE="password" NAME="password">
	<br>
	<label for="phoneNumber" <?php validateField( "phoneNumber",	$missingFields ) ?>>Phone Number</label>
		<INPUT TYPE="tel" NAME="phoneNumber" pattern="[69][0-9]{8}">
	<br>
	<label for="cp" <?php validateField( "cp",	$missingFields ) ?>>Zip Code</label>
		<INPUT TYPE="text" NAME="cp" pattern="[0-9]{5}"> 
	<br>
	<input type="submit" name="submit" id="submitButton" value="Enviar" >
	<input type="reset" name="reset" id="resetButton"	value="Borrar" >
	</FORM>
	<?php
}

if( ! isset( $_POST["submit"] ) ) 
{
	displayEntrada( array() );
}	
elseif( isset( $_POST["opcion"]  ) &&  $_POST["opcion"] == "entrada" ) 
{
	// campo_requerido funcion_validacion
	$campos = array( 
				array( 'nombre' => 'usuario'    , 'funcion' => 'checkUsuario' ), 
				array( 'nombre' => 'password'   , 'funcion' => 'checkPassword' ),
				array( 'nombre' => 'cp'    , 'funcion' => 'checkCP' ),
				array( 'nombre' => 'phoneNumber', 'funcion' => 'checkPhoneNumber' ) );
	$missingFields = processForm( $campos );

	if ( $missingFields ) 
	{
		displayEntrada( $missingFields );
	} 
	else
	{
		echo ( "Su informacion ha sido procesada" );
	}
}
?>
</body>
</html>