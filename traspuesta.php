<?php

$array = array(
    array(1,2),
    array(2,1));

    traspuesta($array);

function traspuesta($array1)
{

    if(($array1[0][0]==$array1[1][1])&&($array1[0][1]==$array1[1][0]))
        {
echo "simetrica";


        } else echo "no simetrica"; 


}



?>