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
	<link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap" rel="stylesheet">
	<link rel="icon" type="image/png" sizes="512x512" href="../img/AniKo.png">
	<link href="../css/title.css" rel="stylesheet" >
	<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
	<title><?= $title['title']?></title>
</head>
<body id="body">

	<!-- Фон сайта -->

	<img id="background" src="../img/fon-1.png">
		<div id="blackout"></div>

	<!-- Главное меню -->

		<nav id="mainmenu">

		<?php if(isset($_SESSION['user'])) : ?>
    		<ul id="profile">
    			<li class="profile">
    			 <a class="profile-text" href="../profile/profile.php"> <?= $_SESSION['user']['login'] ?> </a>
    			</li>
    			<li class="menu-obj">
				 <a class="menu-obj-text" href="../php/add.php"> Добавить </a>
				</li>
    		</ul>

		<? else : ?>
			<ul id="profile">
				<li class="profile">
				 <a class="profile-text" href="../php/login.php"> Войти </a>
				</li>
				<li class="profile">
				 <a class="profile-text" href="../php/register.php"> Регистарация </a>
				</li>
			</ul>

		<?php endif; ?>
			<ul id="menu">
				<li class="menu-obj">
				 <a class="menu-obj-text" href="../title/catalog.php">  Каталог</a>
				</li>
			</ul>

			<ul id="menu">
				<li class="menu-obj">
				 <a class="menu-obj-text" href="../team/team.php">  AniL team </a>
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


	<!-- Контентная часть -->
			<div id="wrapper">

				<div id="main">

					<button class="collapsible"> Описание </button>
					<div class="description">
						<p> <?= $title['text']?> </p>
					</div>

					<iframe id="player" src="<?= $title['link']?>" type="text/html" width=840 height=515 frameborder="0" allowfullscreen></iframe>

					
						
						<h2 id="h-com"> Коментарии </h2>
						
					<div id="com-box">
						<form action="../vendor/add-comment.php" method="post">
							<input type="hidden" name="id" value="<?= $title['id'] ?>">
							<textarea rows="1"
							id="add-com-text" name="body" placeholder="Коментарий...">
							</textarea>
							<button id="add-com-btn" type="submit">Оставить коментарий</button>
						</form>

					<div  id="comment">
						<ul>
							<?php
								foreach ($comment as $comment) {
								?>
									<li id="com-list"> <?= $comment[2] ?></li>
								<?php
								}
							?>
						</ul>
					</div>

					</div>
				</div>
					
				<div id="sidebar">
					<img id="poster" src="<?= $title['poster']?>">

					<h3 id="title"> <?= $title['title']?> </h3>

					<div class="des-box">

						<div class="des">
							<p class="left"> Статус </p>
							<p class="right"> <?= $title['status']?> </p>	
						</div>

						<div class="des">
							<p class="left"> Тип </p>
							<p class="right"> <?= $title['type']?> </p>
						</div>

						<div class="des">
							<p class="left"> Сезон </p>
							<p class="right"> <?= $title['season']?> </p>	
						</div>

						<div class="des">
							<p class="left"> Год </p>
							<p class="right"> <?= $title['year']?> </p>
						</div>	

						<div class="des">
							<p class="left"> Серий </p>
							<p class="right"> <?= $title['serias']?> </p>	
						</div>

						<div class="des">
							<p class="big-des-l"> Жанры </p>
							<p class="big-des"> <?= $title['genre']?> </p>
						</div>

						<div class="des">	
							<p class="left"> Студия </p>
							<p class="right"> <?= $title['studio']?> </p>
						</div>

						<div class="des">
							<p class="big-des-l"> Озвучили </p>
							<p class="big-des"> <?= $title['dub']?> </p>
						</div>

						<div class="des">
							<p class="big-des-l"> Тайминг </p>
							<p class="big-des"> <?= $title['timing']?> </p>	
						</div>
					</div>

					<div id="div-btn-update">
						<a id="btn-update"  href="update.php?id=<?= $title_id?>"> 
						 Изменить тайтл
						</a>
					</div>

				</div>

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