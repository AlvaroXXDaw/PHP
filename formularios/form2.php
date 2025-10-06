<?php
function order($n1,$n2,$n3)
{ 
    $array = [];

    $array[] = $n1;
    $array[] = $n2;
    $array[] = $n3;

sort($array);
return $array;

}

if (isset($_POST["Enviar"])) {
    if (isset($_POST["numero1"]) && isset($_POST["numero2"]) && isset($_POST["numero3"]) ) {
       print_r( order($_POST["numero1"],$_POST["numero2"],$_POST["numero3"]) ); 
 echo "<a href ='form2.html'> continuar </a>";
    } else {
        echo "Error: por favor ingresa ambos números.";
    }
}



?>
