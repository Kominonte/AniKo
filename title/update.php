<?php 
    session_start();

	require_once '../vendor/connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  	<meta charset="UTF-8">
  	<meta name="viewport" content="width=device-width">
  	<link rel="stylesheet" href="../css/update-title.css">
  	<link rel="icon" type="image/png" sizes="512x512" href="/img/AniKo.png">
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
	    		<a id="user" href="auth.php"> Регистрация / Вход </a>
	    	</div>
	    <?php endif; ?>

	    	<div class="add-title">
    			<a id="add-title" href="title/add-title.php"> Добавить тайтл </a>
    		</div>

    		<div class="catalog">
    			<a id="catalog" href="title/catalog.php"> Каталог </a>
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

					<?php
					}
				?>

				<?php
					$title_id = $_GET['id'];
					$title = mysqli_query($connect, "SELECT * FROM `title` WHERE id = '$title_id'");
					$title = mysqli_fetch_assoc($title);
					?>	

				<h3> Изменить тайтл <?=  $title['title'] ?> </h3>	
					<form id="add-title-form" action="../vendor/update.php" method="post">
							<input type="hidden" name="id" 
							value="<?= $title['id'] ?>">
						<p class="ins"> Тайтл (название аниме) </p>
							<input class="input" type="text" name="title" 
							 value="<?= $title['title'] ?>">
						<p class="ins"> Постер (ссылка на постер аниме, можно перетащить на поле)</p>
							<input class="input" type="text" name="poster"  
							 value="<?= $title['poster'] ?>">
						<p class="ins"> Статус (выходит/вышел/онгоинг/анонс)</p>
							<input class="input" type="text" name="status" 
							 value="<?= $title['status'] ?>">
						<p class="ins"> Тип (фильм/сериал/OVA)</p>
							<input class="input" type="text" name="type" 
							 value="<?= $title['type'] ?>">
						<p class="ins"> Сезон (зима/весна/лето/осень)</p>
							<input class="input" type="text" name="season" list="season" 
							 value="<?= $title['season'] ?>">	
								<datalist id="season">
									<option value="Зима"></option>
									<option value="Весна"></option>
									<option value="Лето"></option>
									<option value="Осень"></option>
								</datalist>
						<p class="ins"> Год (дата выхода)</p>
							<input class="input" type="number" name="year" 
							 value="<?= $title['year'] ?>">
						<p class="ins"> Серий (количество серий)</p>
							<input class="input" type="text" name="serias" 
							 value="<?= $title['serias'] ?>">
						<p class="ins"> Жанры </p>
							<input class="input" type="text" name="genre" 
							 value="<?= $title['genre'] ?>">
						<p class="ins"> Студия </p>
							<input class="input" type="text" name="studio" 
							 value="<?= $title['studio'] ?>">
						<p class="ins"> Озвучили </p>
							<input class="input" type="text" name="dub" 
							 value="<?= $title['dub'] ?>">
						<p class="ins"> Тайминг </p>
							<input class="input" type="text" name="timing" 
							 value="<?= $title['timing'] ?>">
						<p class="ins"> Описание </p>
							<textarea type="text" name="text"><?= $title['text'] ?></textarea>
						<p class="ins"> Ссылка на плеер </p>
							<input class="input" type="text" name="link" 
							 value="<?= $title['link'] ?>">
						<button id="add-title-btn" type="submit"> Изменить тайтл </button>
					</form>
			</div>

		</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

	<script type="text/javascript">
		
		$(document).ready(function() {

				$("#live-search").keyup(function(){
					var input = $ (this).val();
					if(input != ""){
						$.ajax({

							url:"vendor/search.php",
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
