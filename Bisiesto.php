<?php
$año=2100;

if ($año>1500)
{
if(($año % 4 ==0) && ($año % 100 !=0) || ($año % 400 ==0))
    {

echo "el año" . $año . "es bisiesto";

    }
     else echo "el año no es bisiesto";
}    
else echo "año erroneo";    



?>

