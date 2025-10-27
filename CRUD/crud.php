<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<style type="text/css">
.error { background: #d33; color: white; padding: 0.2em; }
</style>
</head>
<body>
<?php
//require "conexion.php";

require "usuario.php";



function insert() {

	
    $dsn = "mysql:dbname=test";
    $username = "root";
    $password = "";


    $conn = new PDO( $dsn, $username, $password );


    $sql = sprintf( 'INSERT INTO personas ( nombre, apellidos, sexo, telefono, CP ) VALUES ( "%s", "%s", "%s", "%s", "%s" )', $_POST["nombre"], $_POST["apellidos"], $_POST["sexo"],$_POST["telefono"],$_POST["CP"] );

    $rows = $conn->query( $sql );
    
}

function update()
{

	
    $dsn = "mysql:dbname=test";
    $username = "root";
    $password = "";


    $conn = new PDO( $dsn, $username, $password );
    
    
    $sql = 'UPDATE personas SET nombre = "'.$_POST["nombre"].'", apellidos= "'.$_POST["apellidos"].'", sexo= "'.$_POST["sexo"].'", telefono = "'.$_POST["telefono"].'",CP = "'.$_POST["CP"].'"
	 WHERE codigo = '.$_POST["codigo"].';';

    $rows = $conn->query( $sql );
}


function delete()
{

	
    $dsn = "mysql:dbname=test";
    $username = "root";
    $password = "";


    $conn = new PDO( $dsn, $username, $password );


    $sql = sprintf( 'DELETE FROM personas where codigo = %s', $_GET["codigo"] );

    $rows = $conn->query( $sql );
    
}

function select( $codigo ) {
	
    $dsn = "mysql:dbname=test";
	$username = "root";
	$password = "";

	$conn = new PDO( $dsn, $username, $password );
	
	$sql = 'SELECT * FROM personas where codigo = "'.$codigo.'";';
    
    $result = $conn->query($sql);
	$persona  = $result->fetch();
	return $persona;
}

function checkDato( $valor )
{	
	if( strlen( $valor ) < 5 ) 
		$resultado = 0;
	else 
		$resultado = 1;
	return $resultado;
}

function checkCp($valor)
{
	if(is_numeric($valor) && strlen($valor) == 5)
	{
		$resultado = 1;
	}
	else
	{
		$resultado = 0;
	}
	return $resultado;
}

function checkSexo( $valor )
{	
	if( $valor == 'M' || $valor == 'F' ) 
		$resultado = 1;
	else 
		$resultado = 0;
	return $resultado;
}

function checkTelefono( $valor )
{	
	if( strlen( $valor ) >= 9 && is_numeric( $valor ) ) 
		$resultado = 1;
	else 
		$resultado = 0;
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
	<FORM METHOD=POST ACTION="crud.php">
	<INPUT TYPE="hidden" name="opcion" value ="insertar">
	<br>
	<label for="nombre" <?php validateField( "nombre",	$missingFields ) ?>>Nombre</label>
	<INPUT TYPE="text" NAME="nombre">
	<br>
	<label for="apellidos" <?php validateField( "apellidos",	$missingFields ) ?>>Apellidos</label>
	<INPUT TYPE="text" NAME="apellidos">
	<br>
	<label for="sexo" <?php validateField( "sexo",	$missingFields ) ?>>Sexo</label>
	<select name="sexo" id="sexo">
		<option value="">Seleccione...</option>
		<option value="M">Masculino</option>
		<option value="F">Femenino</option>
	</select>
	<br>
	<label for="telefono" <?php validateField( "telefono",	$missingFields ) ?>>Teléfono</label>
	<INPUT TYPE="text" NAME="telefono">
	<br>
	<label for="CP" <?php validateField( "CP",	$missingFields ) ?>>Código Postal</label>
	<INPUT TYPE="text" NAME="CP">
	<br>
	<input type="submit" name="submit" id="submitButton" value="Enviar" >
	<input type="reset" name="reset" id="resetButton"	value="Borrar" >
	</FORM>
	<?php
}
function displayEdicion( $missingFields, $registro )
{
	?>    
	<H1>Introduce Identificación</H1>
	<FORM METHOD="POST" ACTION="crud.php">
	<INPUT TYPE="hidden" name="opcion" value ="update">

	
	<label for="codigo" <?php validateField( "nombre",	$missingFields ) ?>>Codigo</label>
    <INPUT TYPE="text" NAME="codigo" value="<?php echo $registro['codigo'] ?>" readonly>
	<br><br>
	
	<label for="nombre" <?php validateField( "nombre",	$missingFields ) ?>>Nombre</label>
	<INPUT TYPE="text" NAME="nombre" value="<?php echo $registro['nombre'] ?>">
	<br><br>
	
	<label for="apellidos" <?php validateField( "apellidos",	$missingFields ) ?>>Apellidos</label>
	<INPUT TYPE="text" NAME="apellidos" value="<?php echo $registro['apellidos'] ?>">
	<br><br>
	
	<label for="sexo" <?php validateField( "sexo",	$missingFields ) ?>>Sexo</label>
	<select name="sexo" id="sexo">
		<option value="">Seleccione...</option>
		<option value="M" <?php echo ($registro['sexo'] == 'M') ? 'selected' : ''; ?>>Masculino</option>
		<option value="F" <?php echo ($registro['sexo'] == 'F') ? 'selected' : ''; ?>>Femenino</option>
	</select>
	<br><br>
	
	<label for="telefono" <?php validateField( "telefono",	$missingFields ) ?>>Teléfono</label>
	<INPUT TYPE="text" NAME="telefono" value="<?php echo $registro['telefono'] ?>">
	<br><br>
	<label for="CP" <?php validateField( "CP",	$missingFields ) ?>>CP</label>
	<INPUT TYPE="text" NAME="CP" value="<?php echo $registro['CP'] ?>">
	<br><br>

	<input type="submit" name="submit" id="submitButton" value="Enviar" >
	<input type="reset" name="reset" id="resetButton"	value="Borrar" >
	</FORM>
	<?php
}


function listado()
{
    
    $dsn = "mysql:dbname=test";
    $username = "root";
    $password = "";


    $conn = new PDO( $dsn, $username, $password );

    
    $sql = 'SELECT * FROM personas';

    $result = $conn->query( $sql );
    



    echo "<table>\n";
    
    foreach ( $result as $row ) {
        echo "\t<tr>\n";
        echo "\t\t<td>". $row[ 'codigo' ]. "</td>\n";
        echo "\t\t<td>". $row[ 'nombre' ]. "</td>\n";
        echo "\t\t<td>". $row[ 'apellidos' ]. "</td>\n";
        echo "\t\t<td>". $row[ 'sexo' ]. "</td>\n";
        echo "\t\t<td>". $row[ 'telefono' ]. "</td>\n";
		echo "\t\t<td>". $row[ 'CP' ]. "</td>\n";
        echo "\t\t<td>". "<a href='crud.php?opcion=editar&codigo=" . $row[ 'codigo' ]. "'>Editar</a>" ."</td>\n";
        echo "\t\t<td>". "<a href='crud.php?opcion=delete&codigo=" . $row[ 'codigo' ]. "'>Borrar</a>" ."</td>\n";
        echo "\t</tr>\n";
    }
    echo "</table>\n";
	echo "<a href='crud.php?opcion=nuevo'>Nuevo</a>";
	
}

//conexion();


if( ! isset( $_REQUEST["opcion"] ) ) 
{
	listado();
}
elseif(  $_REQUEST["opcion"]  == 'nuevo'  ) 
{
	displayEntrada( array() );
}		
elseif( $_REQUEST["opcion"]  == 'insertar' ) 
{
	echo "entro en insertar";
	
	$campos = array( 
				array( 'nombre' => 'nombre', 'funcion' => 'checkDato' ), 
				array( 'nombre' => 'apellidos', 'funcion' => 'checkDato' ),
				array( 'nombre' => 'sexo', 'funcion' => 'checkSexo' ),
				array( 'nombre' => 'telefono', 'funcion' => 'checkTelefono' ),
				array( 'nombre' => 'CP', 'funcion' => 'checkCp' ) );
				
	$missingFields = processForm( $campos );

	if ( $missingFields ) 
	{
		
		displayEntrada( $missingFields );
	} 
	else
	{
		insert();
		listado();
	}
}
elseif( $_REQUEST["opcion"]  == 'editar' ) 
{
		$registro = select( $_REQUEST["codigo"]  );
		displayEdicion( array(), $registro );
	
}
elseif( $_REQUEST["opcion"]  == 'update' ) 
{
	echo "entro en insertar";

	$campos = array( 
				array( 'nombre' => 'nombre', 'funcion' => 'checkDato' ), 
				array( 'nombre' => 'apellidos', 'funcion' => 'checkDato' ),
				array( 'nombre' => 'sexo', 'funcion' => 'checkSexo' ),
				array( 'nombre' => 'telefono', 'funcion' => 'checkTelefono' ),
				array( 'nombre' => 'CP', 'funcion' => 'checkCp' ) );
	$missingFields = processForm( $campos );

	$registro = array();
	
	$registro[ 'codigo' ]  = $_POST[ 'codigo'];
	if( isset( $_POST[ 'nombre'] ))
		$registro[ 'nombre' ] = $_POST[ 'nombre'];
	else 
		$registro[ 'nombre' ] = "";
	if( isset( $_POST[ 'apellidos'] ))
		$registro[ 'apellidos' ]  = $_POST[ 'apellidos'];
	else 
		$registro[ 'apellidos' ] = "";
	if( isset( $_POST[ 'sexo'] ))
		$registro[ 'sexo' ]  = $_POST[ 'sexo'];
	else 
		$registro[ 'sexo' ] = "";
	if( isset( $_POST[ 'telefono'] ))
		$registro[ 'telefono' ]  = $_POST[ 'telefono'];
	else 
		$registro[ 'telefono' ] = "";
	if( isset( $_POST[ 'CP'] ))
		$registro[ 'CP' ]  = $_POST[ 'CP'];
	else 
		$registro[ 'CP' ] = "";
	
	
	if ( $missingFields ) 
	{
		displayEdicion( $missingFields, $registro  );
	} 
	else
	{
		update( $registro  );
		listado();
	}
}
elseif( $_REQUEST["opcion"]  == 'delete' ) 
{
	delete( );
	listado();
}
?>
</body>
</html>