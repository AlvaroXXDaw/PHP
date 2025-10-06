<?php
$primos= [];

for ($i=2; $i < 100; $i++) { 
    
$primo = true;

for ($j = 2; $j < $i ; $j++) 
   { 
    
if($i % $j == 0)
   {
$primo=false;
break;

   }

}
if ($primo == true) 
    {


array_push($primos,$i);
    }
}
print_r($primos);


?>