<?php

$conexion = new PDO( "mysql:host=localhost;dbname=test", "root", "" );
$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
try {
	$conexion->beginTransaction();
   	$conexion->exec('LOCK TABLES usuarios write'); 
	
	$sql = "update usuarios set nombre = ?,  apellidos = ? where codigo = ?";
	$rs = $conexion->prepare( $sql );
	$rs->bindParam( 1, $nombre);
	$rs->bindParam( 2, $apellidos);
	$rs->bindParam( 3, $codigo);
	$nombre = "javier";
	$apellidos = "perez";
	$codigo = 1;
	$rs->execute();
	
	sleep( 60 );
    $conexion->commit();
    $conexion->exec('UNLOCK TABLES'); 
	print "Transaccion Realizada";
	
} 
catch(PDOException $e) {
        $conexion->rollback();
        print "Error!: " . $e->getMessage() . "</br>";
}



?>