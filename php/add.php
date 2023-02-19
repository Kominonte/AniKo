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
	<link href="../css/add.css" rel="stylesheet" >
	<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
	<title>Добавление</title>
</head>
<body id="body">

	<!-- Фон сайта -->

	<img id="background" src="../img/fon-1.png">
		<div id="blackout"></div>

	<!-- Главное меню -->

		<nav id="mainmenu">

    		<ul id="profile">
    			<li class="profile">
    			 <a class="profile-text" href="../profile/profile.php"> <?= $_SESSION['user']['login'] ?> </a>
    			</li>
    		</ul>

			<ul id="menu">
				<li class="menu-obj">
				 <a class="menu-obj-text" href="../title/catalog.php">  Каталог</a>
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

			<div class="content">
			<div class="content-d">
				<p class="content-p"> Форма добавления аниме </p>
				<a class="content-btn" href="../title/add-title.php"> Добавить тайтл </a>
			</div>

			<div class="content-d">
				<p class="content-p"> Форма добавления дабера </p>
				<a class="content-btn" href="../team/add-dub.php"> Добавить дабера </a>
			</div>

			<div class="content-d">
				<p class="content-p"> Форма добавления таймера </p>
				<a class="content-btn" href="../php/add-timer.php"> Добавить таймера </a>
			</div>

			<div class="content-d">
				<p class="content-p"> Форма добавления переводчика </p>
				<a class="content-btn" href="#"> Добавить переводчика </a>
			</div>

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

