<?php

		session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width">
  <link rel="stylesheet" href="../css/profile-style.css">
  <link rel="icon" type="image/png" sizes="512x512" href="../img/AniKo.png">
 	<link rel="stylesheet"
	 href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<title>Профиль</title>
	</div>
</head>
<body>

	<!-- Фон сайта -->
	<img class="fon" src="../img/fon-1.png">

	<!-- Главное меню сайта -->
	<div class="mainmenu">

			<!-- Ссылка на главную -->
			<div id="namelink" >
			 <a class="namelink" href="../index.php">AniKo</a>
			</div>

			<!-- Поиск -->
			<div class="searchbox">
    	 <input type="text" id="search"  placeholder="Поиск тайтла..."
    	  title="Type some text">
   	   <button type="submit"></button>
    	</div>

	</div>

			<!-- Контентная часть -->
			<div id="wrapper">
				
				<div id="top">
					<div id="avatar-login">
						<img id="img-avatar" src="../img/noavatar.png">
						<span id="login"> <?= $_SESSION['user']['login'] ?></span>
						<a id="exit" href="../vendor/logout.php"> Выйти </a>
					</div>
				</div>

				<div id="main">
				</div>
					
				<div id="sidebar">
				</div>
			
			</div>


</body>
</html>