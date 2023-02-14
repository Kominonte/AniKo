<?php

	require_once 'connect.php';

	$id = $_POST['id'];
	$body = $_POST['body'];

	mysqli_query($connect, "INSERT INTO `comment` (`id`, `title_id`, `body`) VALUES (NULL, '$id', '$body')");

	header( 'Location: ../title/title.php?id=' . $id);	

?>