<?php
use App\services\Component;

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/x-icon" href="../assets/icon/aniko-nofon.png">
	<link rel="stylesheet" href="../assets/css/menu.css">
	<link rel="stylesheet" href="../assets/css/home.css">
	<title>AniKo</title>
</head>
<body>
	<?php Component::part('background') ?> <!-- Фон -->

	<?php Component::part('menu') ?> <!-- Меню -->

	<div id="main">
		<a href="/login" class="go-home-btn">Авторизация / Регистрация</a>
		<a href="/user" class="go-home-btn">Профиль</a>

		<script src="https://cdn.jsdelivr.net/npm/hls.js@latest"></script>
		<video id="video" controls></video>
		<button class="but-link" data-video="https://cache.libria.fun/videos/media/ts/9723/5/1080/9fad0659a7c8ee9695907bfddad12564.m3u8?isWithAds=1&countryIso=UA&isAuthorized=0"><img src="resources/image/btn.png"/></button>
  		<button class="but-link" data-video="https://cache.libria.fun/videos/media/ts/9723/3/1080/4f81332229588a5150be26c377f979a1.m3u8?isWithAds=1&countryIso=UA&isAuthorized=0"><img src="resources/image/btn.png"/></button>
		<script>

		var els__butLink = document.querySelectorAll('.but-link'),
    		el__player = document.querySelector('#video');

			// Перебираем все кнопки
			els__butLink.forEach(function(el__butLink) {
			  // Создаём событие нажатия на кнопку
			  el__butLink.addEventListener('click', function() {
			    // Получаем ссылку на видео из адрибута
			    var str__video = el__butLink.getAttribute('data-video');
			    
			    // Воспроизводим видео
			    if (Hls.isSupported()) {
		  var video = document.getElementById('video');
		  var hls = new Hls();

		  // bind them together
		  hls.attachMedia(video);
		  hls.on(Hls.Events.MEDIA_ATTACHED, function () {
		    hls.loadSource(str__video);
		    hls.on(Hls.Events.MANIFEST_PARSED, function (event, data) {
		    });
		  });     
		}
			el__player.play();
			  });
			});

		</script>
	</div>

	<script type="text/javascript" src="../libs/jquery-3.7.1.min.js"></script>
</body>
</html>