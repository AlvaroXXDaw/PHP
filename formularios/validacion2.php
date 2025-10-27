<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<style type="text/css">
	.error { background: #d33; color: white; padding: 0.2em; }
	</style>
</head>

<body>
<?php
function checkPassword( $contrasena )
{	
	if( strlen( $contrasena ) < 5 ) 
		$esValido = 0;
	else 
		$esValido = 1;
	return $esValido;
}

function checkUsuario( $nombreUsuario )
{	
	if( strlen( $nombreUsuario ) < 5 ) 
		$esValido = 0;
	else 
		$esValido = 1;
	return $esValido;
}

function checkCP( $codigoPostal )
{	
	if( (strlen( $codigoPostal ) < 5) || (!ctype_digit($codigoPostal)) ) 
		$esValido = 0;
	else 
		$esValido = 1;
	return $esValido;
}

function checkPhoneNumber( $numeroTelefono )
{	
	if( (strlen($numeroTelefono)<9) || (!ctype_digit($numeroTelefono)) )
		$esValido = 0;
	else 
		$esValido = 1;
	return $esValido;
}

function validateField( $nombreCampo, $camposFaltantes ) 
{
	if ( in_array( $nombreCampo, $camposFaltantes ) ) 
	{
		echo ' class="error"';
	}
}

function setValue( $nombreCampo ) 
{
	if ( isset( $_POST[$nombreCampo] ) ) 
	{
		echo $_POST[$nombreCampo];
	}
}

function processForm( $camposFormulario ) 
{
	foreach ( $camposFormulario as $campoActual ) 
	{
		if ( !isset( $_POST[$campoActual[ 'nombre' ] ] ) or !$_POST[$campoActual[ 'nombre' ] ] ) 
		{
			$camposFaltantes[] = $campoActual[ 'nombre' ];
		}
		elseif( ! call_user_func( $campoActual[ 'funcion' ],  $_POST[$campoActual[ 'nombre' ] ] ) )
		{
			$camposFaltantes[] = $campoActual[ 'nombre' ];
		}
	}
	if( isset ( $camposFaltantes ) )
		return( $camposFaltantes );
	else
		return null;
}

function displayEntrada( $camposFaltantes )
{
	?>
	<H1>Introduce Identificación</H1>
	<FORM METHOD=POST ACTION="validacion.php">
		<INPUT TYPE="hidden" name="opcion" value ="entrada">
	<br>
	<label for="usuario" 
	
	<?php validateField( "usuario",	$camposFaltantes ) ?>>Usuario</label>
		<INPUT TYPE="text" NAME="usuario">
	<br>
	<label for="password" 
	
	<?php 
	validateField( "password",	$camposFaltantes ) ?>>Password</label>
		<INPUT TYPE="password" NAME="password">
	<br>
	<label for="phoneNumber" <?php validateField( "phoneNumber",	$camposFaltantes ) ?>>Phone Number</label>
		<INPUT TYPE="tel" NAME="phoneNumber" pattern="[69][0-9]{8}">
	<br>
	<label for="cp" <?php validateField( "cp",	$camposFaltantes ) ?>>Zip Code</label>
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
	$camposFormulario = array( 
				array( 'nombre' => 'usuario'    , 'funcion' => 'checkUsuario' ), 
				array( 'nombre' => 'password'   , 'funcion' => 'checkPassword' ),
				array( 'nombre' => 'cp'    , 'funcion' => 'checkCP' ),
				array( 'nombre' => 'phoneNumber', 'funcion' => 'checkPhoneNumber' ) );
	$camposFaltantes = processForm( $camposFormulario );

	if ( $camposFaltantes ) 
	{
		displayEntrada( $camposFaltantes );
	} 
	else
	{
		echo ( "Su informacion ha sido procesada" );
	}
}
?>
</body>
</html>