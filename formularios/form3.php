<?php

?>

<form method="POST">
<input type="checkbox" id="vehicle1" name="vehicle[]" value="bike">
<label for="vehicle1">Ive got a bike</label><br>
<input type="checkbox" id="vehicle2" name="vehicle[]" value="car">
<label for="vehicle2">Ive got a car</label><br>
<input type="checkbox" id="vehicle3" name="vehicle[]" value="boat">
<label for="vehicle3">Ive got a boat</label><br>
<input type="submit" name="submitButton" id="submitButton" value="Submit Form">
</form>

<?php

if (isset($_POST["vehicle"] ) ) 
{
   echo " los valores seleccionados son:";
   foreach($_POST["vehicle"] as $item) echo $item;

}


?>