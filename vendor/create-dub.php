<?php
	require_once 'connect.php';

	$dubber = $_POST['dubber'];
	$name = $_POST['name'];
	$on_project = $_POST['on_project'];
	$telegram = $_POST['telegram'];
	$youtube = $_POST['youtube'];
	$info = $_POST['info'];
	$quote = $_POST['quote'];

	$avatar = '../team/upload/' . time() . $_FILES['avatar']['name'];
		move_uploaded_file($_FILES['avatar']['tmp_name'],  $avatar);


	mysqli_query($connect, 
		"INSERT INTO `dubber` (`id`, `avatar`, `dubber`, `name`, `on_project`, `telegram`, `youtube`, `description`, `quote`) VALUES (NULL, '$avatar', '$dubber', '$name', '$on_project', '$telegram', '$youtube', '$info', '$quote')");


	
	header( 'Location: ../team/team.php');
?>