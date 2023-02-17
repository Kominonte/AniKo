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
	<link href="../css/catalog.css" rel="stylesheet" >
	<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
	<title>Главная</title>
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
				 <a class="menu-obj-text" href="../title/add-title.php"> Добавить </a>
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
			<div id="search-content">
			 <input type="text" name="search"> 		
			</div>

			<a id="searhc-close" onclick="closeDiv()"> 
			 <img src="../img/close.png" height="45px" width="45px"> 
			</a>

		</div>


	<!-- Контентная часть -->
	<div id="wrapper">

		<div id="main">

			<div class="content">
				<?php
				$title = mysqli_query($connect, "SELECT * FROM `title`");
				$title = mysqli_fetch_all($title);

				
				
				foreach ($title as $title) {
			?>		
				<a class="item" href="../title/title.php?id=<?= $title[0]?>"> 
					<img  class="poster" src="<?= $title[2]?>">
				</a> 
			<?php
				}
			?>	
			</div>
		</div>
					
		<div id="sidebar">
		</div>
	</div>

	<script src="../js/main.js"></script>
</body>
</html>
