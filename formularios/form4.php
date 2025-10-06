
<form method="POST" action="radio.php">

<input type="radio" id="male" name="gender" value="MALE">
<label for="male"> Male</label><br>

<input type="radio" id="female" name="gender" value="FEMALE">
<label for="female"> Female</label><br>

<input type="radio" id="other" name="gender" value="OTHER">
<label for="other"> Other</label><br>

<input type="submit" name="Enviar">
</form>

<?php

if(isset($_POST["gender"]))
    echo "El valor seleccionado es {$_POST["gender"]}<br>";

?>