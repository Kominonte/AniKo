<?php 
    session_start();

	require_once 'vendor/connect.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width">
	<link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap" rel="stylesheet">
	<link href="css/index.css" rel="stylesheet" >
	<title>Главная</title>
</head>
<body>

	<img id="background" src="img/fon-1.png">

		<nav id="mainmenu">

		<?php if(isset($_SESSION['user'])) : ?>
    		<ul id="profile">
    			<li class="profile">
    			 <a class="profile-text" href="php/profile.php"> <?= $_SESSION['user']['login'] ?> </a>
    			</li>
    		</ul>

		<? else : ?>
			<ul id="profile">
				<li class="profile">
				 <a class="profile-text" href="php/login.php"> Войти </a>
				</li>
				<li class="profile">
				 <a class="profile-text" href="php/register.php"> Регистарация </a>
				</li>
				<li class="border">
				</li>
			</ul>
		<?php endif; ?>

			<ul id="menu">
				<li class="menu-obj">
				 <a class="menu-obj-text" href="#"> Добавить тайтл </a>
				</li>
				<li class="menu-obj">
				 <a class="menu-obj-text" href="#">  Каталог</a>
				</li>
			</ul>

			<ul id="AniKo">
				<li class="AniKo">
				 <a class="AniKo-text" href="index.php"> AniKo </a>
			</ul>

		</nav>

	<!-- Контентная часть -->
	<div id="wrapper">

		<div id="main">
			<div>
				<h2> Винимание! </h2>
				<p class="text">
				 Это не официальный сайти Anilibria! Вот настоящая <a id="anilibria-link" target="_blank" href="https://www.anilibria.tv/">www.anilibria.tv</a>
				 <br>
				  Разраб берет у них плеер с постерами аниме и ничего на них не претендует, так как у него нету денег арендовать сервер приходится выкручиваться таким образом.
 				</p>

				<p class="text">
				 Это сайт делаеться любителем, и не претендует на звание хорошего добротной площадки для просмотра аниме, но все же в него вкладываются силы и время.
				<p>

				<p class="text">
				 По вопросам или жалобам пишите сюда geymermamin@gmail.com
				</p>
			</div>
		</div>
					
		<div id="sidebar">
		</div>

		</div>

	<script src="js/main.js"></script>
</body>
</html>

