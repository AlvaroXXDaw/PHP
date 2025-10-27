<?php

require "bd.php";

?>
<h1>Cartelera</h1>
<?php
$sql = "SELECT CINE, SALA, TITULO, HORA FROM CARTELERA_CINES
        JOIN CARTELERA_SALAS ON CARTELERA_SALAS.CINE_ID = CARTELERA_CINES.CINE_ID
        JOIN CARTELERA_PASES ON CARTELERA_PASES.SALA_ID = CARTELERA_SALAS.SALA_ID
        JOIN CARTELERA_PELICULAS ON CARTELERA_PELICULAS.PELICULA_ID = CARTELERA_PASES.PELICULA_ID
        ORDER BY CARTELERA_CINES.CINE, CARTELERA_SALAS.SALA, CARTELERA_PELICULAS.TITULO, CARTELERA_PASES.HORA";


$stmt = $GLOBALS['DB']->query($sql);
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (count($rows) > 0) {
    $cineActual = "";
    $salaActual = "";
    $peliculaActual = "";
    $horas = "";
    
    foreach ($rows as $row) {
        if ($cineActual != $row['CINE']) {
            if ($salaActual != "" && $peliculaActual != "") {
                echo "SALA: " . $salaActual . " - " . $peliculaActual . " - " . $horas . "<br>";
            }
            $cineActual = $row['CINE'];
            echo "<h2>" . $cineActual . "</h2>";
            $salaActual = $row['SALA'];
            $peliculaActual = $row['TITULO'];
            $horas = $row['HORA'];
        } elseif ($salaActual != $row['SALA']) {
            if ($peliculaActual != "") {
                echo "SALA: " . $salaActual . " - " . $peliculaActual . " - " . $horas . "<br>";
            }
            $salaActual = $row['SALA'];
            $peliculaActual = $row['TITULO'];
            $horas = $row['HORA'];
        } elseif ($peliculaActual != $row['TITULO']) {
            echo "SALA: " . $salaActual . " - " . $peliculaActual . " - " . $horas . "<br>";
            $peliculaActual = $row['TITULO'];
            $horas = $row['HORA'];
        } else {
            $horas .= ", " . $row['HORA'];
        }
    }
    echo "SALA: " . $salaActual . " - " . $peliculaActual . " - " . $horas . "<br>";
} else {
    echo "No hay resultados disponibles.";
}
?>
