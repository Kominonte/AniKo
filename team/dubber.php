	<!-- Ссесия и подключение к БД -->

<?php 
    session_start();

	require_once '../vendor/connect.php';

	$dubber_id = $_GET['id'];
	$dubber = mysqli_query($connect, "SELECT * FROM `dubber` WHERE id = '$dubber_id'");
	$dubber = mysqli_fetch_assoc($dubber);
?>

	<!-- end -->

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width">
	<link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap" rel="stylesheet">
	<link rel="icon" type="image/png" sizes="512x512" href="../img/AniKo.png">
	<link href="../css/dubber.css" rel="stylesheet" >
	<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
	<title><?=$dubber['dubber']?></title>
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
				 <a class="menu-obj-text" href="../title/catalog.php">  Каталог </a>
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
			<div>

			<img src="<?= $dubber['avatar'] ?>"></div>

			<p class="info"> <?= $dubber['dubber'] ?></p>

			<p class="info"> <?= $dubber['name'] ?></p>

			<p class="info"> <?= $dubber['on_project'] ?></p>

			<p class="info"> <?= $dubber['telegram'] ?></p>

			<p class="info"> <?= $dubber['youtube'] ?></p>

			<p class="info"> <?= $dubber['info'] ?></p>

			<p class="info"> <?= $dubber['quote'] ?></p>

			</div>

			<div id="div-btn-update">
				<a id="btn-update"  href="../team/update-dub.php?id=<?= $dubber_id?>"> 
				 Изменить инфу
				</a>
			</div>

		</div>
					
		<div id="sidebar">
		</div>

		</div>

	<script src="../js/main.js"></script>
</body>
</html>