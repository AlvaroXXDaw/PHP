<?php
$conexion = new PDO("mysql:host=localhost;dbname=test", "root","");

$sql = "update usuarios set nombre = 'javier' where codigo = 1";

$conexion -> exec($sql);

echo "updateado";

?>