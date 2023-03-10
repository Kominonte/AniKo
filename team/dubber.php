	<!-- Ссесия и подключение к БД -->

<?php 
    session_start();

	require_once '../vendor/connect.php';

	$voice_id = $_GET['id'];
	$voice = mysqli_query($connect, "SELECT * FROM `dubber` WHERE id = '$voice_id'");
	$voice = mysqli_fetch_assoc($voice);
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
	<title><?=$voice['dubber']?></title>
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
			
			<div class="content-top"> 

				
			<div class="content-i">
				<p class="dubber"> <?= $voice['dubber'] ?></p>
				<p class="info"> Имя: <?= $voice['name'] ?></p>
				<p class="info"> На проекте c <?= $voice['on_project'] ?></p>
				
				<a id="btn-update"  href="../team/update-dub.php?id=<?= $voice_id?>"> 
				 Изменить инфу
				</a>
			</div>

			<div class="content-a">

				<img class="avatar" src="<?= $voice['avatar'] ?>">

			</div>

				
			</div>

			<div class="content-link">
				<div class="div-dub-link">
				<a class="telegram-link" href="<?= $voice['telegram'] ?>" 
					target="_blank">Telegram</a>
					<img class="telegram-link-img" src="../img/telegram.png">
				</div>

				<div class=div-dub-link>
				<a class="youtube-link" href="<?= $voice['youtube'] ?>" 
					target="_blank">Youtube</a>
					<img class="youtube-link-img" src="../img/youtube.png">
				</div>
			</div>

			<div class="content-mid">

				<div class="content-mid-l">
					<p class="info"> Информация </p>
					<p class="info"> <?= $voice['info'] ?></p>
				</div>

				<div class="content-mid-r">
					<p class="info"> Цитата </p>
					<p class="info"> <?= $voice['quote'] ?></p>
				</div>

			</div>


			<div class="content-bottom">
				<p class="dub-title"> Тайтлы озвученные этим войсером </p>
				<?php
				$dubtitle = $voice['dubber'];
				 	$dubt = mysqli_query($connect, 
				 		"SELECT * FROM `title` WHERE dub LIKE '%{$dubtitle}%'");

				 		if(mysqli_num_rows($dubt) > 0){?>

				 		<?php 
				 		while ($row = mysqli_fetch_assoc($dubt)) {

				 			$id = $row['id'];
							$poster = $row['poster'];
							$title = $row['title'];
						?>

						<a class="item" href="../title/title.php?id=<?php echo $id; ?>"> 
							<img  class="poster" src="<?php echo $poster; ?>">
						</a>

							
							<?php
							}
							?>
			<?php

							}else{

							echo "<h4 id=''>Нет тайтлов которые озвучил этот войсер</h4>";
							}
						?>

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