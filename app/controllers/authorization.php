<?php

namespace App\controllers;

use App\services\Router;

class Authorization 
{

	// Авторизация
	public function authorization($data){
			
			// Данные с формы
			$email = trim($data["email"]);
			$password = trim($data["password"]);

			// Ишем пользоватлея по введенной почте
			$user = \R::findOne('users', 'email = ?', [$email]);

			$response = [];	//Массив для ответа сервера
			$errors = 0;	//Переменная для ошибок 

			// Проверка есть ли такой пользователь по $email
			if(!$user){
				$response += [
							"email" => [
								"status" => false,
								"message" => 'Пользователь не найден'
							]];
				
				$errors	+= 1;
			}else{
				$response += [
							"email" => [
								"status" => true,
								"message" => 'Пользователь найден'
							]];
			}

			// Проверяем пароль на правильность
			if(password_verify($password, $user->password)){
				$_SESSION["user"] = [
					"id" => $user->id,
					"login" => $user->login,
					"group" => $user->group
				];

				$response += [
							"password" => [
								"status" => true,
								"message" => 'Пароль верный'
							]];

			}else{
				$response += [
							"password" => [
								"status" => false,
								"message" => 'Неверный пароль'
							]];
				
				$errors	+= 1;		
			}

			// Если нет ошибок, то авторизация пройдена
			if($errors == 0){
				$response += ["authorization" => true];
			}
			
			// Отправка даннык клиенту
			echo json_encode($response);
	}

	// Регистрация
	public function register($data){

		// Данные с формы
		$login = trim($data["login"]);
		$email = trim($data["email"]);
		$password = trim($data["password"]);
		$confPassword = trim($data["secondPassword"]);

		$response = []; // Ответ сервера
		$errors = 0;	// Переменная с ошибками

		// Проверяем, есть ли такой пользователь с таким логином
		if($user = \R::findOne('users', 'login = ?', [$login])){

			$message = 'Логин ' . $login .' уже занят';

			$response += [
						"login" => [
							"status" => false,
							"message" => $message
						]];
			
			$errors	+= 1;
		}else{
			$response += [
						"login" => [
							"status" => true,
							"message" => 'Логин свободен'
						]];
		}

		// Проверяем, есть ли такой пользователь с такой почтой
		$user = \R::findOne('users', 'email = ?', [$email]);

		if($user["email"] == $email){
			$response += [
						"email" => [
							"status" => false,
							"message" => 'Почта уже занята'
						]];
			$errors	+= 1;
		}else{
			$response += [
						"email" => [
							"status" => true,
							"message" => 'Почта свободна'
			  			]];
		}

		// Проверяем, совпадают ли пароль и проверочный пароль
		if($password !== $confPassword){
			$response += [
				"password" => [
					"status" => false,
					"message" => 'Пароли не совпали'
				  ]];

		$errors	+= 1;

		}else{
			$response += [
						"password" => [
							"status" => true,
							"message" => 'Пароли совпали'
						]];
		}	

		// Если ошибок не, то загоняем пользователя в базу
		if($errors == 0){
			$user = \R::dispense('users');
			$user->login = $login;
			$user->email = $email;
			$user->group = 1;
			$user->password = password_hash($password, PASSWORD_DEFAULT);

			\R::store($user);

			$response += ["registration" => true];
		}
		
		// Отправка данных клиенту
		echo json_encode($response);
	}

	// Выход из аккаунта
	public function logout(){
		unset($_SESSION['user']);
		Router::redirect('/login');
	}
}
