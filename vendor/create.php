<?php
	require_once 'connect.php';

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
		"INSERT INTO `title` (`id`, `title`, `poster`, `status`, `type`, `season`, `year`, `serias`, `genre`, `studio`, `dub`, `timing`, `text`, `link`) 
		VALUES (NULL, '$title', '$poster', '$status', '$type', '$season', '$year', '$serias', '$genre', '$studio', '$dub', '$timing', '$text', '$link')");
	
	header( 'Location: ../title/catalog.php');

?>