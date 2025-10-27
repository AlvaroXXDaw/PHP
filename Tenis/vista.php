<?php


function displayTorneos( $torneos )
{

	?>
     <h1>Torneos</h1>
    <?php

	 foreach ($torneos as $item ) 
		{
	
		echo $item['FECHA'] . " "; 
		?> 
		<a href="controlador.php?opcion=resultados&torneo_id=<?php echo $item['TORNEO_ID']; ?>"><?php echo $item['TORNEO']; ?></a><br>
		<?php

	 }
	
}

?>
