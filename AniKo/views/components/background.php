<?php 	

$timeOfDay = date('H');

	if($timeOfDay < 5){ 

?>
		<img id="background" src="../assets/background/night.jpg">

<?php }elseif($timeOfDay < 9){ ?>	

		<img id="background" src="../assets/background/sunset.jpg">

<?php }elseif($timeOfDay < 18){ ?>	

		<img id="background" src="../assets/background/day.jpg">

<?php }elseif($timeOfDay < 22){ ?>	
		
		<img id="background" src="../assets/background/sunset.jpg">

<?php }else { ?>

		<img id="background" src="../assets/background/night.jpg">

<?php } ?>	