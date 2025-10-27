<?php
class Usuario
{
    public $nombre;
    public $apellidos;

   
    function getNombre()
    {
        return $this->nombre;
    }
    function setNombre($valor)
    {
        return $this->nombre = $valor;
    }
    function getApellidos()
    {
        return $this->apellidos;
    }
    function setApellidos($valor)
    {
        return $this->apellidos = $valor;
    }
}

$conexion = new PDO("mysql:host=localhost;dbname=test", "root", "");
$sql = "select nombre, apellidos from usuarios";
$rs = $conexion->query($sql);
$rs->setFetchMode(PDO::FETCH_CLASS, 'Usuario');
while ($row = $rs->fetch()) {
    echo $row->getNombre() . " " . $row->getApellidos()  . "<br>";
}
