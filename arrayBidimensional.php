    <?php
    $matrix = array(array());

    $animal = array(
        array("perro","gato"),
        array("burro","lombriz"),
        array("ave","pez"),
        
    );

    echo $animal[2][1];



for ($i=0; $i < count($animal); $i++) 
    { 
    echo "<br>";
        for ($j=0; $j < count($animal[$i]) ; $j++) { 
      
echo $animal [$i][$j];

        }

}

    ?>