<?php
	require_once 'connect.php';

	$id = $_POST['id'];
	$title = $_POST['title'];
	$poster = $_POST['poster'];
	$status = $_POST['status'];
	$type = $_POST['type'];
	$season = $_POST['season'];
	$year = $_POST['year'];
	$serias = $_POST['serias'];
	$genre = $_POST['genre'];
	$studio = $_POST['studio'];
	$dub = $_POST['dub'];
	$timing = $_POST['timing'];
	$text = $_POST['text'];
	$link = $_POST['link'];

	mysqli_query($connect, 
		"UPDATE `title` SET `title` = '$title', `poster` = '$poster', `status` = '$status', `type` = '$type', `season` = '$season', `year` = '$year', `serias` = '$serias', `genre` = '$genre', `studio` = '$studio', `dub` = '$dub', `timing` = '$timing', `text` = '$text', `link` = '$link' WHERE `title`.`id` = $id");
	
	header( 'Location: ../title/catalog.php');

?>