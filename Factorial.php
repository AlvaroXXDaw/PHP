<?php
$primos = array();
$numero = 1;
$almacen=0;

$a = 1;
for ($i = 2; $i < 1000; $i++) 
{
    $primo = true;
   
    for ($j = 2; $j <= sqrt($i); $j++) {
        if ($i % $j == 0) {
            $primo = false;
            break; 
        }
    }
    if ($primo) {
        $primos[] = $i;
        echo "El número es primo: " . $i . "<br>";
    }
}
for ($i=1; $i < 10 ; $i++) 
{ 
    $numero = $numero * $i;
    
}

echo $numero;

$fibonacci = [];

$n1=0;
$n2 = 1;

$numero=0;
for ($i=0; $i < 10; $i++) { 
    $numero = $n1+$n2;

    $n1 = $n2;
    
    $n2 = $numero;
    array_push($fibonacci,$numero);

}
print_r($fibonacci)

?>