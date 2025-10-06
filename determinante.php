    <?php

    $matriz = array(
    array(1,2,3),
    array(1,2,2),
    array(2,9,5),
    );

    $primero = 0;
    $segundo =0;
    $tercero = 0;
    $cuarto = 0;
    $quinto = 0 ;
    $sexto = 0;
    $resultado = 0;

    $primero = $matriz[0][0] * $matriz[1][1] * $matriz[2][2];
    $segundo = $matriz[0][1] * $matriz[1][2] * $matriz[2][0];
    $tercero = $matriz[0][2] * $matriz[1][0] * $matriz[2][1];

    $cuarto = $matriz[0][2] * $matriz[1][1] * $matriz[2][0];
    $quinto = $matriz[0][0] * $matriz[1][2] * $matriz[2][1];
    $sexto = $matriz[0][1] * $matriz[1][0] * $matriz[2][2];


    $resultado = ($primero + $segundo + $tercero ) - ($cuarto + $quinto + $sexto);

    echo $resultado;
    ?>