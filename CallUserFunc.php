<?php

$s="segundo";
function incremento_cardinal($a)
{
 $lista = ["primero", "segundo","tercero"];

 $encontrado = false;

 for ($i=0; $i < count($lista)-1 && !$encontrado ; $i++) { 
if ($a==$lista[$i]) {
    $encontrado = true;
}
if ($encontrado) 
{

return $lista[$i];   
    
}else return "error";

}
$a=0;




}

call_user_func("incremento_cardinal",$s);



?>