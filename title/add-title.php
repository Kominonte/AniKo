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
	<link href="../css/add-title.css" rel="stylesheet" >
	<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
	<title>Добавить тайтл</title>
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
    			 <a class="profile-text" href="../profile/profile.php">
    			  <?= $_SESSION['user']['login'] ?> </a>
    			</li>
    		</ul>

	<!-- Контентная часть -->
	<div id="wrapper">

		<div id="main">

			<form class="add-title" action="../vendor/create.php" method="post">
			<div id="add">
					<p class="ins"> Тайтл (название аниме) </p>
						<input class="input" type="text" name="title">
					<p class="ins"> Постер (ссылка на постер аниме, можно перетащить на поле) </p>
						<input class="input" type="text" name="poster">
					<p class="ins"> Статус (выходит/вышел/онгоинг/анонс)</p>
						<input class="input" type="text" name="status">
					<p class="ins"> Тип (фильм/сериал/OVA)</p>
						<input class="input" type="text" name="type">
					<p class="ins"> Сезон (зима/весна/лето/осень)</p>
						<input class="input" type="text" name="season" list="season">	
							<datalist id="season">
								<option value="Зима"></option>
								<option value="Весна"></option>
								<option value="Лето"></option>
								<option value="Осень"></option>
							</datalist>
					<p class="ins"> Год (дата выхода)</p>
						<input class="input" type="number" name="year">
					<p class="ins"> Серий (количество серий)</p>
						<input class="input" type="text" name="serias">
					<p class="ins"> Жанры </p>
						<input class="input" type="text" name="genre">
					<p class="ins"> Студия </p>
						<input class="input" type="text" name="studio">
					<p class="ins"> Озвучили </p>
						<input class="input" type="text" name="dub">
					<p class="ins"> Тайминг </p>
						<input class="input" type="text" name="timing">
					<p class="ins"> Ссылка на плеер </p>
						<input class="input" type="text" name="link">
			</div>
			
			<div>
					<p class="ins"> Описание </p>
						<textarea class="textarea" type="text" name="text"></textarea>
			</div>

				<button id="add-title-btn" type="submit"> Добавить тайтл </button>
			</form>
			
	</div>

	<script src="../js/main.js"></script>
</body>
</html>
