<?php

	session_start();
	require_once 'connect.php';

	$email = $_POST['email'];
	$password = $_POST['password'];

	$error = array();

	$password = md5($password);

	$check_user = mysqli_query($connect, 
		"SELECT * FROM `user` WHERE email = '$email' 
		 AND password = '$password'");
	
	if (mysqli_num_rows($check_user) > 0 ){

		$user = mysqli_fetch_assoc($check_user);

		$_SESSION['user'] = [
			"id" => $user['id'],
			"login" => $user['login'],
			"email" => $user['email']
		];	

		header('Location: ../index.php');
		echo 'авторизация прошла успешно';

	} else {
		$_SESSION['message'] = 'Неверный логин или пароль';
		header('Location: ../auth.php');	
	}

	if (trim($email === '')) {
		$error[] = 'Введите почту';
	}

	if (trim($password === '')) {
		$error[] = 'Введите пароль';
	}	

	if (!empty($error)) {
		$_SESSION['message'] = array_shift($error);
		header('Location: ../php/login.php');
	}

?>