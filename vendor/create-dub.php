<?php
	require_once 'connect.php';

	$dubber = $_POST['dubber'];
	$name = $_POST['name'];
	$on_project = $_POST['on_project'];
	$telegram = $_POST['telegram'];
	$youtube = $_POST['youtube'];
	$info = $_POST['info'];
	$quote = $_POST['quote'];


	mysqli_query($connect, 
		"INSERT INTO `dubber` (`id`, `dubber`, `name`, `on_project`, `telegram`, `youtube`,
		 `description`, `quote`) 
		VALUES (NULL, '$dubber', '$name', 'on_project', '$telegram', '$youtube', 
		 '$info', '$quote')");


	
	header( 'Location: ../php/team.php');

?>