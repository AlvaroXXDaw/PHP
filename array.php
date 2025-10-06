<?php

$authors = ["Z"];


for( $i = 0 ; $i < count($authors) ; $i++)
{

echo $authors[$i] . "<br>";

}


$orden = ["primero" , "segundo"];
$orden[2] =  " tercero";

foreach ( $orden as $item ) 
{
    echo $item . "<br>";
}

unset($orden["primero"]);




?>

