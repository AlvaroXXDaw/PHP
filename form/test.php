<?php


function conexion()
{

    $dsn = "mysql:dbname=test";
    $username = "root";
    $password = "";
    $conexion = new PDO( $dsn, $username, $password );
	$conexion->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    return $conexion;

}

function registro( $nombre, $password)
{
	$conexion = conexion();
	
	
	$sql = "SELECT * FROM reg_personas WHERE (usuario = ? OR nickname = ?) AND clave = ?";
	$rs = $conexion->prepare( $sql );
	$rs->bindParam( 1, $nombre );
	$rs->bindParam( 2, $nombre );
	$rs->bindParam( 3, $password);
	$rs->execute();
	

	if( $row = $rs->fetch() )
	{
		
		try {
			$sql = "INSERT into reg_log(Fecha,UsuarioId) values(NOW(),?)";
			$rs_log = $conexion->prepare( $sql );
			$rs_log->bindParam( 1, $row["codigo"] );
			$rs_log->execute();
			
		} catch(PDOException $e) {
			
		}
		
		return true; 
	}
	else
		return false;
	

}


if( isset( $_POST[ "usuario" ] ) && isset( $_POST[ "password" ] ) && registro( $_POST[ "usuario" ],$_POST[ "password" ]))
{

	printf( "Se ha logueado");
	
}
else
{
	printf( "<a href=\"prueba.html\">Error. Vuelva a intentarlo</a>");
}


?>