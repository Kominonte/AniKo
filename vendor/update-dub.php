<?php
	require_once 'connect.php';

	$id = $_POST['id'];
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
		"UPDATE `dubber` SET `avatar`='$avatar',`dubber`='$dubber',`name`='$name',`on_project`='$on_project',`telegram`='$telegram',`youtube`='$youtube',`info`='$info',`quote`='$quote' WHERE `dubber`.`id` = $id");


	
	header( 'Location: ../team/team.php');
?>