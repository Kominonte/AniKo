	<!-- Ссесия и подключение к БД -->

<?php 
    session_start();

	require_once '../vendor/connect.php';
?>

	<!-- end -->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width">
<link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap" rel="stylesheet">
	<link rel="icon" type="image/png" sizes="512x512" href="../img/AniKo.png">
	<link href="../css/add-dup.css" rel="stylesheet" >
	<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
	<title>Добавить даббера</title>
	</div>
</head>
<body id="body">

	<!-- Фон сайта -->

	<img id="background" src="../img/fon-1.png">
		<div id="blackout"></div>

	<!-- Главное меню -->

		<nav id="mainmenu">

			<ul id="menu">
				<li class="menu-obj">
				 <a class="menu-obj-text" href="catalog.php">  Каталог</a>
				</li>
			</ul>

			<ul id="AniKo">
				<li class="AniKo">
				 <a class="AniKo-text" href="../index.php"> AniKo </a>
				<li class="search" onclick="viewDiv()">
				 <img height="25px" width="25px" src="../img/search.png">
			</ul>

		</nav>

		<div id="search-box">
			<div id="search-content">
			 <input id="input-search" type="text" name="search"> 		
			</div>

			<a id="searhc-close" onclick="closeDiv()"> 
			 <img src="../img/close.png" height="45px" width="45px"> 
			</a>

		</div>
    		<ul id="profile">
    			<li class="profile">
    			 <a class="profile-text" href="profile/profile.php"> <?= $_SESSION['user']['login'] ?> </a>
    			</li>
    		</ul>

	<!-- Контентная часть -->
	<div id="wrapper">

		<div id="main">

			<form class="add-dub" action="../vendor/create-dub.php" method="post">
			<div id="left">
					<p class="ins"> Даббер </p>
						<input class="input" type="text" name="dubber">

					<p class="ins"> Имя </p>
						<input class="input" type="text" name="name">	

					<p class="ins"> На проекте </p>
						<input class="input" type="text" name="on_project">	

					<p class="ins"> Telegram </p>	
						<input class="input" type="text" name="telegram">

					<p class="ins"> YouTube </p>
						<input class="input" type="text" name="youtube">
			</div>
			
			<div id="right">

					<p class="des"> Информация </p>
						<textarea class="textarea" type="text" name="info"></textarea>

					<p class="des"> Цитата </p>
						<textarea class="textarea" type="text" name="quote"></textarea>

			</div>

				<button id="add-dub-btn" type="submit"> Добавить даббера </button>
			</form>
			
	</div>

	<script src="../js/main.js"></script>
</body>
</html>
