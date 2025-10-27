<?php
function formulario1()
{
	?>
	<form method="post" action="hidden2.php">
	<input type="hidden" name="opcion" value="paso2" >
	<label for=”nombre”>Nombre</label>
	<input type="text" name="nombre">	
	<input type="submit">
	</form>
	<?php
}
function formulario2($nombre)
{
	?>
	<form method="post" action="hidden2.php">
	<input type="hidden" name="opcion" value="paso3" >
	
	<?php 
	printf('<input type="hidden" name="nombre" value="%s">) ', $nombre);
	?>
	
	<label for=”apellidos”>Apellidos</label>
	<input type="text" name="apellidos">	
	<input type="submit">
	</form>
	<?php
}
function respuesta($nombre, $apellido, $sexo = '')
{
    echo $nombre . ' ' . $apellido . ' ' . $sexo;
}

function formulario3($nombre,$apellido)
{
?>
<form method="POST" action="hidden2.php">
<input type="hidden" name="opcion" value="paso4">

<label for="male"></label><br>
<?php 
	printf('<input type="hidden" name="nombre" value="%s"> ) ', $nombre);
	printf('<input type="hidden" name="apellidos" value="%s"> ) ', $apellido);
	?>
	
<label for="sexo">Sexo</label>
<select name="sexo" id="sexo">
<option value="Hombre">Hombre</option>
<option value="Mujer">Mujer</option>
<option value="Otro">Otro</option>
</select>

<input type="submit" name="Enviar">
</form>
<?php

}




?>
<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <title>Document</title>
 </head>
 <body>
<?php

if( !isset( $_POST[ "opcion" ] )  )
{
	formulario1();
}
else 
	if( $_POST[ "opcion" ] == "paso2")
{
	if(  !empty( $_POST[ "nombre" ] )  )
		formulario2($_POST[ "nombre" ]);
	else
		formulario1();
}
else if( $_POST[ "opcion" ] == "paso3")
{
	if(  !empty( $_POST[ "nombre" ] ) && !empty( $_POST[ "apellidos" ] ) )
		formulario3( $_POST[ "nombre" ],$_POST[ "apellidos" ]);
	else
		formulario2($_POST[ "nombre" ]);
}
else if( $_POST[ "opcion" ] == "paso4")
{
	if(  !empty( $_POST[ "nombre" ] ) && !empty( $_POST[ "apellidos" ] ) && !empty($_POST["sexo"]))
		respuesta( $_POST[ "nombre" ],$_POST[ "apellidos" ], $_POST["sexo"]);
	else
		formulario3($_POST[ "nombre" ],$_POST[ "apellidos" ]);
}

?>
</body>
</html>
