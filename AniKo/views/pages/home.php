<?php
use App\services\Component;

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/x-icon" href="../assets/icon/aniko-nofon.png">
	<link rel="stylesheet" href="../assets/css/menu.css">
	<link rel="stylesheet" href="../assets/css/home.css">
	<title>AniKo</title>
</head>
<body>
	<?php Component::part('background') ?> <!-- Фон -->

	<?php Component::part('menu') ?> <!-- Меню -->

	<div id="main">
		<a href="/login" class="go-home-btn">Авторизация / Регистрация</a>
	</div>

	<script type="text/javascript" src="../libs/jquery-3.7.1.min.js"></script>
</body>
</html>