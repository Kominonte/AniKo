<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/x-icon" href="../assets/icon/aniko-nofon.png">
	<link rel="stylesheet" href="../assets/css/login.css">
	<title>Welcome</title>
</head>
<body>
	<img id="background" src="../assets/background/welcome.jpeg">
	<div id="login">
		<div id="box-welcome">
			<span class="label-section">Добро пожаловать</span>
			<span class="label-section">на сайт</span>
			<br>
			<span class="welcome-name">AniKo</span>
			<div class="message"></div>
			<img class="welcome-img" src="..\assets\mascot\yokoso.webp">
		</div>
		<div id="box-login">
			<!-- Авторизация -->
			<form id="form-authorization">
				<span class="label-section">Авторизация</span>

				<div class="entryarea">
					<input class="input" type="text" name="email" required>
					<div class="laballine">Почта</div>
				</div>

				<div class="entryarea">
					<input class="input" type="password" name="password" required>
					<div class="laballine">Пароль</div>
				</div>

				<button id="login-btn" class="auth-btn" type="button">Войти</button>

				<span class="label-conductor">Нету аккаунта ?</span>
				<button class="swap-auth-btn" type="button" onclick="registration()">Регистрация</button>
			</form>

			<!-- Ригистрация -->
			<form id="form-registration">
				<span class="label-section">Регистрация</span>

				<div class="entryarea">
					<input id="reg-login" class="input" type="text" name="login" required>
					<div class="laballine">Логин</div>
				</div>

				<div class="entryarea">
					<input id="reg-email" class="input" type="text" name="email" required>
					<div class="laballine">Почта</div>
				</div>

				<div class="entryarea">
					<input id="reg-password" class="input" type="password" name="password" required>
					<div class="laballine">Пароль</div>
				</div>

				<div class="entryarea">
					<input id="reg-conf-password" class="input" type="password" name="conf-password" required>
					<div class="laballine">Проверочный пароль</div>
				</div>

				<button id="register-btn" class="auth-btn"  type="button">Регистрация</button>
				<span class="label-conductor">Есть аккаунт ?</span>
				<button class="swap-auth-btn" type="button" onclick="authorization()">Авторизация</button>
			</form>
		</div>

	</div>

	<script type="text/javascript" src="../libs/jquery-3.7.1.min.js"></script>
	<script type="text/javascript" src="../vendor/authorization.js"></script>

	<script type="text/javascript">
		function registration(){
			document.getElementById("form-authorization").style.animationName = "registration";
  			document.getElementById("form-authorization").style.marginTop = "-475px";
 
		};
		function authorization(){
			document.getElementById("form-authorization").style.animationName = "authorization";
  			document.getElementById("form-authorization").style.marginTop = "0px";
		};
	</script>
</body>
</html>