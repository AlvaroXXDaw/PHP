<form method ="post">
<label for="lang">Lenguaje</label>
<select name="lenguajes[]" id="lang" multiple>
<option value="php">PHP</option>
<option value="java">Java</option>
<option value="Golang">Golang</option>
<option value="C">C</option>
<option value="C++">C++</option>
</select>
<input type="submit" value="Enviar"/>
</form>

<?php
if (isset($_POST["lenguajes"])) {
    foreach ($_POST["lenguajes"] as $item) 
        {
        echo $item;
    }
}

?>