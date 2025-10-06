<?php
abstract class Figura
{
public $name;

function __constructor($name="")
{
$this->name= $name;
}

function area();

}

class Cuadrado extends Figura
{
public $lado;


}

?>
