<?php

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

echo "el numero es primo" . $i. "<br>";
    }
}


?>