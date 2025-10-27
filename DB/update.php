<?php
$conexion = new PDO("mysql:host=localhost;dbname=test", "root","");

$sql = "update usuarios set nombre = 'pepe' where codigo = 2";

$conexion -> exec($sql);

echo "updateado";

?>