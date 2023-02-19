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
	<link href="../css/add-dup.css" rel="stylesheet" >
	<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
	<title>Добавить даббера</title>
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

    		<ul id="profile">
    			<li class="profile">
    			 <a class="profile-text" href="../profile/profile.php"> <?= $_SESSION['user']['login'] ?> </a>
    			</li>
    		</ul>


	<!-- Контентная часть -->
	<div id="wrapper">

		<div id="main">

			<?php
					$dubber = mysqli_query($connect, "SELECT * FROM `dubber`");
					$dubber = mysqli_fetch_all($dubber);

					foreach ($dubber as $dubber) {
						?>

					<?php
					}
				?>

				<?php
					$dubber_id = $_GET['id'];
					$dubber = mysqli_query($connect, "SELECT * FROM `dubber` WHERE id = '$dubber_id'");
					$dubber = mysqli_fetch_assoc($dubber);
				?>	

			<form class="add-dub" action="../vendor/update-dub.php" method="post"
			 enctype="multipart/form-data">
			
			<div id="left">
						<input type="hidden" name="id" 
							value="<?= $dubber['id'] ?>">

					<p class="ins"> Аватар </p>
						<input class="input" type="file" name="avatar" 
						value="<?= $dubber['avatar'] ?>">

					<p class="ins"> Даббер </p>
						<input class="input" type="text" name="dubber" 
						value="<?= $dubber['dubber'] ?>">

					<p class="ins"> Имя </p>
						<input class="input" type="text" name="name" 
						value="<?= $dubber['name'] ?>">	

					<p class="ins"> На проекте </p>
						<input class="input" type="text" name="on_project" 
						value="<?= $dubber['on_project'] ?>">	

					<p class="ins"> Telegram </p>	
						<input class="input" type="text" name="telegram" 
						value="<?= $dubber['telegram'] ?>">

					<p class="ins"> YouTube </p>
						<input class="input" type="text" name="youtube" 
						value="<?= $dubber['youtube'] ?>">
			</div>
			
			<div id="right">

					<p class="des"> Информация </p>
						<textarea class="textarea" type="text" name="info"><?= $dubber['info'] ?></textarea>

					<p class="des"> Цитата </p>
						<textarea class="textarea" type="text" name="quote" ><?= $dubber['quote'] ?></textarea>

			</div>

				<button id="add-dub-btn" type="submit"> Обновить инфу </button>
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