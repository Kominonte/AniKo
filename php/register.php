<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/png" sizes="512x512" href="../img/AniKo.png">
	<link rel="stylesheet" href="../css/register.css"> 
	<title>Авторизация и регистрация</title>
</head>
<body>
	
	<!-- Фон сайта -->
	<img class="fon" class="password" src="../img/auth.jpg">

	<div class="content">
	<div id="auth">

		<p class="register">Регистрация</p>
		<form action="../vendor/signup.php" method="post" enctype="multipart/form-data">
			<input type="text" name="login" placeholder="Логин">
			<input type="text" name="email" placeholder="Почта">
			<div class="password">
			<input type="password" id="password-input" placeholder="Пароль" name="password">
			<a class="password-control" onclick="return show_hide_password(this);"></a>
			<input type="password" id="password-input" placeholder="Подтвердите пароль" name="password_confirm">	
			</div>
				<style type="text/css">
					.password-control {
						position: relative;
						display: block;
						margin: -50px 0px 20px 365px;
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

			<button type="submit" id="register">Регистрация</button>

			<p id="sinup">
				Есть аккаунт ?  <a class="sinup" href="login.php">Войти</a>
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