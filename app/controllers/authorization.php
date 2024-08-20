<?php

namespace App\controllers;

use App\services\Router;

class Authorization 
{

	public function authorization($data){

		$email = $data["email"];
		$password = $data["password"];

		$user = \R::findOne('users', 'email = ?', [$email]);

		if(!$user){
			echo "Пользователь не найден";
		}

		if(password_verify($password, $user->password)){
			$_SESSION["user"] = [
				"id" => $user->id,
				"login" => $user->login,
				"group" => $user->group,
			];

			Router::redirect('/');
		} else{
			echo 'Не верные данные авторизации';
		}
	}

	public function register($data){

		$login = $data["login"];
		$email = $data["email"];
		$password = $data["password"];
		$confPassword = $data["conf-password"];

		if($password !== $confPassword){
			die("password error");
		}

		$user = \R::dispense('users');
		$user->login = $login;
		$user->email = $email;
		$user->group = 1;
		$user->password = password_hash($password, PASSWORD_DEFAULT);

		\R::store($user);

		Router::redirect('/login');
	}

	public function logout(){
		unset($_SESSION['user']);
		Router::redirect('/login');
	}
}
