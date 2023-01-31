<?php
	session_start();
	require_once '../vendor/connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/png" sizes="512x512" href="../img/AniKo.png">
	<link rel="stylesheet" href="../css/auth.css"> 
	<title>Авторизация и регистрация</title>
</head>
<body>
	
	<!-- Фон сайта -->
	<img class="fon" class="password" src="../img/auth.jpg">

	<div class="content">
	<div id="auth">

		<p class="login">Авторизация</p>

		<form action="../vendor/sigin.php" method="post" enctype="multipart/form-data">
			<input type="text"  placeholder="Почта" name="email" >
			<div class="password">
			<input type="password" id="password-input" placeholder="Пароль" name="password">
			<a class="password-control" onclick="return show_hide_password(this);"></a>
			</div>
				<style type="text/css">
					.password-control {
						position: relative;
						display: block;
						margin: -50px 0px 40px 365px;
						width: 30px;
						height: 30px;
						background: url(img/eye);
						transition: 0.2s;
	                }

					.password-control.view {
						background: url(img/eyec); 
						transition: 0.2s;
					}
				</style>

			<?php 
				if ($_SESSION['message']){
					echo '<p class="messege">' . $_SESSION['message'] . '</p>';
				}
				unset($_SESSION['message']);
			?> 	

			<button type="submit" class="login" id="login">Войти</button>
			
			<p id="sinup">
				Впервые тут ?  <a class="sinup" href="../php/register.php">Зарегистрируйся</a>
			</p>
		</form>
		</div>

	<div class="home">
		<button id="home"  onclick="window.location.href ='../index.php'">На главную</button>
	</div>

	</div>

	<script src="js/jquery-3.6.1.min.js"></script>
	<script src="js/main.js"></script>

</body>
</html>