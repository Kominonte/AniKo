<?php 
    session_start();

	require_once '../vendor/connect.php';

	$title_id = $_GET['id'];
	$title = mysqli_query($connect, "SELECT * FROM `title` WHERE id = '$title_id'");
	$title = mysqli_fetch_assoc($title);

	$comment = mysqli_query($connect, "SELECT * FROM `comment` WHERE title_id = '$title_id' ");
	$comment = mysqli_fetch_all($comment);
?>


<!DOCTYPE html>
<html lang="en">
<head>
  	<meta charset="UTF-8">
  	<meta name="viewport" content="width=device-width">
  	<link rel="stylesheet" href="../css/title.css">
  	<link rel="icon" type="image/png" sizes="512x512" href="../img/AniKo.png">
  	<link rel="stylesheet"
	 href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<title>AniKo</title>
</head>
<body>

	<!-- Фон сайта -->
	<img class="fon" src="img/fon-1.png">

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

	    	<div class="add-title">
    			<a id="add-title" href="add-title.php"> Добавить тайтл </a>
    		</div>

    		<div class="catalog">
    			<a id="catalog" href="catalog.php"> Каталог </a>
    		</div>

    </div>

			<!-- Контентная часть -->
			<div id="wrapper">

				<div id="main">

					<div id="description">
						<h2> Описание </h2>
						<p> <?= $title['text']?> </p>
					</div>

					<iframe id="player" src="<?= $title['link']?>" type="text/html" width=840 height=515 frameborder="0" allowfullscreen></iframe>

					<div id="com-fon">
						
						<h2 id="h-com"> Коментарии </h2>
							<hr color ="red">
						<form action="vendor/add-comment.php" method="post">
							<input type="hidden" name="id" value="<?= $title['id'] ?>">
							<textarea 
							id="add-com-text" name="body" placeholder="Коментарий...">
							</textarea>
							<button id="add-com-btn" type="submit"> Оставить коментарий</button>
						</form>

							<hr color ="red">

						<ul id="comment">
							<?php
								foreach ($comment as $comment) {
								?>
									<li> <?= $comment[2] ?></li>
								<?php
								}
							?>
						</ul>
					</div>
				</div>
					
				<div id="sidebar">
					<img id="poster" src="<?= $title['poster']?>">
					<h3 id="title"> <?= $title['title']?> </h3>

					<div class="des">
						<p> Статус </p>
							<td> <?= $title['status']?> </td>
						<p> Тип </p>
							<td> <?= $title['type']?> </td>
						<p> Сезон </p>
							<td> <?= $title['season']?> </td>
						<p> Год </p>
							<td> <?= $title['year']?> </td>
						<p> Серий </p>
							<td> <?= $title['serias']?> </td>
						<p> Жанры </p>
							<td> <?= $title['genre']?> </td>
						<p> Студия </p>
							<td> <?= $title['studio']?> </td>
						<p> Озвучили </p>
							<td> <?= $title['dub']?> </td>
						<p> Тайминг </p>
							<td> <?= $title['timing']?> </td>
					</div>
				</div>

				</div>

</body>
</html>