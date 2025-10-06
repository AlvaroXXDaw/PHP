<?php

	
	




	
function rango($value, $value2) {
	$array = [];
    $contador = 0;
    for ($i = $value + 1; $i < $value2; $i++) 
		{
        $array[$contador]= $i;
		$contador++;
    }
    return $array;
}
	
	

	

	


	if (isset($_POST["Enviar"])) {
    if (isset($_POST["numero"]) && isset($_POST["numero2"])) {
       print_r( rango($_POST["numero1"],$_POST["numero2"]) )
 echo "<a href ='rango2.php'> continuar </a>"
    } else {
        echo "Error: por favor ingresa ambos números.";
    }
}
	
?>
<form method="post" action="form.php" >
<label for="numero">Introduce el número</label>
<input type="text" name="numero" id="numero">
<input type="text" name="numero2" id="numero2">
<input type="submit" name="Enviar" value="Enviar">
</form>