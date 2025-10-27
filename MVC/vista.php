<?php
function cabecera()
{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Membership Form</title>
<link rel="stylesheet" type="text/css" href="common.css" />
<style type="text/css">
.error { background: #d33; color: white; padding: 0.2em; }


</style>
</head>
<body>
<?php
}

function pies()
{
?>
</body>
</html>
<?php
}

function displayResultados($resultados)
{
	
	cabecera();
	?>
	<H1>Resultado</H1>
	<?php

if ($resultados["numero" ] == $_POST[ 'numero'] && $resultados["serie" ] == $_POST[ 'serie']) {
	?>
		<H2>Enhorabuena ha resultado ganador del premio del dia <?php echo $_POST[ 'fecha']; ?> con el numero premiado <?php echo $_POST[ 'numero'] ?> con un premio de <?php echo $resultados["premioGrande" ] ?> Euros</H2>
		<BR>
		<A HREF="controlador.php">Volver</A>
		<?php
} else {
	if( $resultados["numero" ] == $_POST[ 'numero'] )
	{
		?>
		<H2>Enhorabuena ha resultado ganador del premio del dia <?php echo $_POST[ 'fecha']; ?> con el numero premiado <?php echo $_POST[ 'numero'] ?> con un premio de <?php echo $resultados["premioPequeño" ]  ?> Euros</H2>
		<BR>
		<A HREF="controlador.php">Volver</A>
		<?php
	}
	else
	{
		?>
		<H2>Lo sentimos su numero <?php echo $_POST[ 'numero'] ?> no ha sido premiado<br>El numero ganador del premio del dia <?php echo  $_POST[ 'fecha']; ?> ha sido el numero  <?php echo $resultados["numero" ] ?> con un premio de <?php echo $resultados["premio" ] ?> Euros</H2>
		<BR>
		<A HREF="controlador.php">Volver</A><?php
	}
}

	
	pies();
}

function displayEntrada( $missingFields )
{
	
	cabecera();
	?>
	<H1>Comprobación de Cupón</H1>
	<FORM METHOD=POST ACTION="controlador.php">
	<INPUT TYPE="hidden" NAME="opcion" VALUE="comprobar" >

	<label for="numero" <?php validateField( "numero",	$missingFields ) ?>>Numero</label>
	<INPUT TYPE="text" NAME="numero">
	
	<label for="serie" <?php validateField( "serie",	$missingFields ) ?>>Serie</label>
	<INPUT TYPE="text" NAME="serie">

	<label for="fecha" <?php validateField( "fecha",	$missingFields ) ?>>Fecha</label>
	<select  NAME="fecha" >
	<?php
	$fecha = time();
	for( $i = 0; $i < 30; $i++ )
	{
		?>
		<option value="<?php echo date( "d-m-Y", $fecha); ?>"><?php echo date( "d-m-Y", $fecha); ?></option>	
		<?php
		
		$fecha = $fecha - 24 * 60 * 60; 
	}
	?>
	</select>
	<input type="submit" name="submit" id="submitButton" value="Enviar" >
	<input type="reset" name="reset" id="resetButton"	value="Borrar" >
	</FORM>
	<?php
	pies();
}