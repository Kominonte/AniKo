<?php

	$connect = mysqli_connect('localhost', 'root', '', 'aniko');	

	if (!$connect) {
		die('Error connect to DataBase');
	}
?>