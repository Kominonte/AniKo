<?php
use App\services\Component;
use App\services\Router;

if (!$_SESSION['user']){
	Router::redirect('/login');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/x-icon" href="../assets/icon/aniko-nofon.png">
	<link rel="stylesheet" href="../assets/css/menu.css">
	<link rel="stylesheet" href="../assets/css/user.css">
	<title><?= $_SESSION['user']['login']?></title>
</head>
<body>
	<?php Component::part('background') ?> <!-- Фон -->

	<?php Component::part('menu') ?> <!-- Меню -->

	<div id="main">
		<span>Hello, <?= $_SESSION['user']['login']?></span>

		<form action="/auth/logout" method="POST">
			<button type="submit">Выйти</button>
		</form>
	</div>

	<script type="text/javascript" src="../libs/jquery-3.7.1.min.js"></script>
</body>
</html>