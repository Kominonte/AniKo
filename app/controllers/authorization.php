<?php

namespace App\controllers;

use App\services\Router;

class Authorization 
{

	public function authorization($data){
			
			$email = $data["email"];
			$password = $data["password"];

			$user = \R::findOne('users', 'email = ?', [$email]);

			$response = [];
			$errors = 0;

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

			if($errors == 0){
				$response += ["authorization" => true];
			}

			echo json_encode($response);
	}

	public function register($data){

		$login = $data["login"];
		$email = $data["email"];
		$password = $data["password"];
		$confPassword = $data["secondPassword"];

		$response = [];
		$errors = 0;

		if($user = \R::findOne('users', 'login = ?', [$login])){

			$message = 'Логин'.$login .'уже занят';

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
							"status" => false,
							"message" => 'Почта свободна'
			  			]];
		}


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
							"status" => false,
							"message" => 'Пароли совпали'
						]];
		}	

		if($errors == 0){
			$user = \R::dispense('users');
			$user->login = $login;
			$user->email = $email;
			$user->group = 1;
			$user->password = password_hash($password, PASSWORD_DEFAULT);

			\R::store($user);

			$response += ["registration" => true];
		}

		echo json_encode($response);
	}

	public function logout(){
		unset($_SESSION['user']);
		Router::redirect('/login');
	}
}
