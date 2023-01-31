<?php

	session_start();
	require_once 'connect.php';

    $error = array();


	$login = $_POST['login'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$password_confirm = $_POST['password_confirm'];

	if ($password === $password_confirm) {

		$password = md5($password);

		mysqli_query($connect, 
			"INSERT INTO `user` (`id`, `login`, `email`, `password`)
			 VALUES (NULL, '$login', '$email', '$password')");

		
		header('Location: ../auth.php');
	
	} else {
		$_SESSION['message'] = 'Пароли не совпали';
		header('Location: ../php/register.php');	
	}

	if (trim($login === '')) {
		$error[] = 'Введите логин';
	}

	if (trim($email === '')) {
		$error[] = 'Введите почту';
	}

	if (trim($password === '')) {
		$error[] = 'Введите пароль';
	}

	if (trim($password_confirm === '')) {
		$error[] = 'Введите проверочный пароль';
	}		

	if (!empty($error)) {
		$_SESSION['message'] = array_shift($error);
		header('Location: ../php/register.php');
	}

?>


