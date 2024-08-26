<?php
use App\services\Component;

    // Пример использования cURL для отправки HTTP-запроса

    // Инициализация cURL-сессии
    $ch = curl_init();

    // Установка параметров запроса
    curl_setopt($ch, CURLOPT_URL, 'https://anilibria.top/api/v1/anime/releases/latest?limit=7');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    // Выполнение запроса и получение результата
    $response = json_decode(curl_exec($ch));

    // Проверка наличия ошибок
    if (curl_errno($ch)) {
        echo 'Ошибка cURL: ' . curl_error($ch);
    }

    // Завершение сессии cURL
    curl_close($ch);

    // Обработка полученного результата

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/x-icon" href="../assets/icon/aniko-nofon.png">
	<link rel="stylesheet" href="../assets/css/root.css">
	<link rel="stylesheet" href="../assets/css/menu.css">
	<link rel="stylesheet" href="../assets/css/home.css">
	<title>AniKo</title>
</head>
<body>
	<?php Component::part('background') ?> <!-- Фон -->

	<?php Component::part('menu') ?> <!-- Меню -->

	<div id="wrapper">
		<div id="updates-box">
			<div id="updates-info-top">
				<span class="updates-info-label">Новые серии</span>
				<div id="updates-info-empty"></div>	
				<span id="updates-info-season-label">Сезон</span>
				<span id="updates-info-season">Лето 24</span>
			</div>

			<div id="updates-wrapper">
			<?php 
				foreach($response as $response){

			?>
				<div class="updates-title">
					<span class="updates-title-name"><?= $response->name->main ?></span>
					<img class="updates-title-img" src="https://anilibria.top<?= $response->poster->optimized->src ?>">
				</div>
			<?php } ?>
			</div>

		</div>

	
		<!-- <script src="https://cdn.jsdelivr.net/npm/hls.js@latest"></script>
		<video id="video" controls></video>
		<button class="but-link" data-video="https://cache.libria.fun/videos/media/ts/9723/5/1080/9fad0659a7c8ee9695907bfddad12564.m3u8?isWithAds=1&countryIso=UA&isAuthorized=0"><img src="resources/image/btn.png"/></button>
  		<button class="but-link" data-video="https://cache.libria.fun/videos/media/ts/9723/3/1080/4f81332229588a5150be26c377f979a1.m3u8?isWithAds=1&countryIso=UA&isAuthorized=0"><img src="resources/image/btn.png"/></button> -->
		<!-- <script>
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

		</script> -->
	</div>

	<script type="text/javascript" src="../libs/jquery-3.7.1.min.js"></script>
</body>
</html>