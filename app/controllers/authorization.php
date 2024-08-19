<?php

namespace App\controllers;

use App\services\Router;

class Authorization 
{
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
		$user->password = password_hash($password, PASSWORD_DEFAULT);

		\R::store($user);

		Router::redirect('login');
	}
}
