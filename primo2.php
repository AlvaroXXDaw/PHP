<?php
$primos = array();

for ($i=2; $i < 100 ; $i++)
    { 

$primo = true;
for ($j=0; $j < count($primos) && $primo  ; $j++) 
    { 

if ($i % $primos[$j] == 0 ) {
    
$primo = false;

}    

    }

    if (count($primos) > 0 ) 
        {
        $inicio = $primos[count($primos)-1]+1;
    } else {
        $inicio = 2;

for ($j=$inicio; $j <= $i/2 && $primo ; $j++) { 
    if ($i % $j == 0 ) {
        $primo = false;
    }
}
if ($primo) {
    $primos[]= $i;
    echo  "el numero es primo" . $i . "<br>";
}

    }
    

    }


?>