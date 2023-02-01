<?php 
    session_start();
	echo "<link rel='stylesheet' href='/css/add-title.css'>";
	require_once '../vendor/connect.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
  	<meta charset="UTF-8">
  	<meta name="viewport" content="width=device-width">
  	<link rel="stylesheet" href="../css/add-title.css">
  	<link rel="icon" type="image/png" sizes="512x512" href="../img/AniKo.png">
  	<link rel="stylesheet"
	 href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<title>AniKo</title>
</head>
<body>

	<!-- Фон сайта -->
	<img class="fon" src="../img/fon-1.png">

	<!-- Главное меню сайта -->
	<div class="mainmenu">

			<!-- Ссылка на главную -->
			<div class="namelink" >
			 <a id="namelink" href="../index.php">AniKo</a>
			</div>

			<!-- Поиск -->
			<div class="searchbox">
    	 	 <input type="text" id="search"  placeholder="Поиск тайтла..."
    	  	  title="Type some text">
   	   		 <button type="submit"></button>
    		</div>

    	<?php if(isset($_SESSION['user'])) : ?>
    		<div class="user"> 
    			<a id="user" href="../profile/profile.php"> <?= $_SESSION['user']['login'] ?> </a>
    		</div>

	    <? else : ?>
	    	<div class="user"> 
	    		<a id="user" href="../login.php"> Регистрация / Вход </a>
	    	</div>
	    <?php endif; ?>

    		<div class="catalog">
    			<a id="catalog" href="../title/catalog.php"> Каталог </a>
    		</div>

    </div>

		<!-- Контентная часть -->
		<div id="wrapper">

			<div id="main">

				<h3> Добавить тайтл </h3>	
					<form id="add-title" action="../vendor/create.php" method="post">
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
						<p class="ins"> Описание </p>
							<textarea type="text" name="text"></textarea>
						<p class="ins"> Ссылка на плеер </p>
							<input class="input" type="text" name="link">
						<button id="add-title-btn" type="submit"> Добавить тайтл </button>
					</form>
			</div>

		</div>

</body>
</html>
