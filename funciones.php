<?php

fibonacci(5);


function fibonacci($numero)
{
$fibonacci = [];

$n1=0;
$n2 = 1;

$sum=0;
for ($i=0; $i < $numero; $i++) { 
       array_push($fibonacci, $n1); 
    $sum = $n1+$n2;

    $n1 = $n2;
    
    $n2 = $sum;
   

}
print_r($fibonacci)


factorial($sum);


}


function factorial($limite)
{

    if($limite ==0)

        {
return -1;

        } 
        else
            {
$sum =1;
    for ($i=1; $i <= $limite ; $i++) 
{ 
    $sum = $sum * $i;
    
}
}

return $sum;
}

?>