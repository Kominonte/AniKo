<?php 
    session_start();

	require_once '../vendor/connect.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
  	<meta charset="UTF-8">
  	<meta name="viewport" content="width=device-width">
  	<link rel="stylesheet" href="../css/catalog.css">
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

	    	<div class="add-title">
    			<a id="add-title" href="../title/add-title.php"> Добавить тайтл </a>
    		</div>

    		<div class="catalog">
    			<a id="catalog" href="../title/catalog.php"> Каталог </a>
    		</div>

    </div>

			<!-- Контентная часть -->
			<div id="wrapper">

				<div id="main">
					<?php
						$title = mysqli_query($connect, "SELECT * FROM `title`");
						$title = mysqli_fetch_all($title);
						/*print_r($title);*/
						foreach ($title as $title) {
							?>

					<div class="content">
						

						<a href="title.php?id=<?= $title[0]?>"> 
							 <img  class="poster" src="<?= $title[2]?>">
						</a>  

						<div>
							<a class="btn"  href="../title/title.php?id=<?= $title[0]?>"> 
							 Просмотреть 
							</a>
						</div>

						<div>
							<a class="btn"  href="../title/update.php?id=<?= $title[0]?>"> 
							 Изменить 
							</a>
						</div>
					</div>	
						<?php
						}
					?>	
				</div>
			</div>

</body>
</html>
