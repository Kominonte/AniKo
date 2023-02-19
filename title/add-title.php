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
		<form method="post">
			<div id="search-content">
			 <input type="text" name="search" id="live-search" placeholder="Найти тайтл" autocomplete="off">  	
			</div>

			<a id="searhc-close" onclick="closeDiv()"> 
			 <img src="../img/close.png" height="45px" width="45px"> 
			</a>

			<div id="searchresult"></div>
	
		</form> 
		</div>

		</div>
    		<ul id="profile">
    			<li class="profile">
    			 <a class="profile-text" href="profile/profile.php"> <?= $_SESSION['user']['login'] ?> </a>
    			</li>
    		</ul>

	<!-- Контентная часть -->
	<div id="wrapper">

		<div id="main">

			<form class="add-title" action="../vendor/create.php" method="post">
			<div id="left">
					<p class="ins"> Тайтл </p>
						<input class="input" type="text" name="title">
					<p class="ins"> Статус </p>
						<select  class="input" type="text" name="status" list="status">
							<option value="Выходит">Выходит</option>
							<option value="Вышел">Вышел</option>
							<option value="Онгоинг">Онгоинг</option>
							<option value="Анонс">Анонс</option>
						</select>
					<p class="ins"> Тип </p>
						<select class="input" type="text" name="type" list="type">
							<option value="Фильм">Фильм</option>
							<option value="Сериал">Сериал</option>
							<option value="OVA">OVA</option>
						</select>
					<p class="ins"> Сезон</p>	
						<select class="input" type="text" name="season" list="season">
							<option value="Зима">Зима</option>
							<option value="Весна">Весна</option>
							<option value="Лето">Лето</option>
							<option value="Осень">Осень</option>
						</select>
					<p class="ins"> Год </p>
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
			</div>
			
			<div id="right">
					<p class="ins"> Описание </p>
						<textarea class="textarea" type="text" name="text"></textarea>
					<p class="link"> Постер (ссылка на постер аниме, можно перетащить на поле) </p>
						<input class="input" type="text" name="poster">
					<p class="link"> Ссылка на плеер </p>
						<input class="input" type="text" name="link">
			</div>

				<button id="add-title-btn" type="submit"> Добавить тайтл </button>
			</form>
			
	</div>

	<script src="../js/main.js"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

	<script type="text/javascript">
		
		$(document).ready(function() {

				$("#live-search").keyup(function(){
					var input = $ (this).val();
					if(input != ""){
						$.ajax({

							url:"/vendor/search.php",
							method:"POST",
							data:{input:input},

							success:function(data){
								$("#searchresult").html(data);
								$("#searchresult").css("display","block");
							}
						});
					}else{

						$("#searchresult").css("display","none");
					}
				});

		});

	</script>
</body>
</html>
