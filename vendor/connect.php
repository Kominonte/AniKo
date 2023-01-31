<?php

	$connect = mysqli_connect('localhost', 'root', 'root', 'anikodb');	

	if (!$connect) {
		die('Error connect to DataBase');
	}
?>