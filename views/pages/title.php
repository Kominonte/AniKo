<?php
use App\services\Component;

    // Пример использования cURL для отправки HTTP-запроса

    // Инициализация cURL-сессии
    $ch = curl_init();

    // Установка параметров запроса
    curl_setopt($ch, CURLOPT_URL, 'https://anilibria.top/api/v1/anime/releases/seishun-buta-yarou-wa-bunny-girl-senpai-no-yume-wo-minai'); //.$_GET['id']
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
	<link rel="stylesheet" href="../assets/css/title.css">
	<title>AniKo</title>
</head>
<body>
	<?php Component::part('background') ?> <!-- Фон -->

	<?php Component::part('menu') ?> <!-- Меню -->

	<div id="wrapper">
    <script src="https://cdn.jsdelivr.net/npm/hls.js@latest"></script>
        <div id="player-box">
        <video id="player" controls></video>
        <button onclick="wider()">На всю ширину</button>
            <div id="series-box">
            <?php
                foreach($response->episodes as $episodes){
            ?>
                <button class="but-link" data-video="<?= $episodes->hls_720 ?>">Серия <?= $episodes->ordinal ?></button>
            <?php } ?>
            </div>
        </div>
        <aside id="sidebar">
            <img id="title-poster" src="https://anilibria.top<?= $response->poster->optimized->src ?>">
            <span id="title-name"><?= $response->name->main ?></span>
        </aside>
	</div>

		<script>
		var els__butLink = document.querySelectorAll('.but-link'),
    		el__player = document.querySelector('#player');

			// Перебираем все кнопки
			els__butLink.forEach(function(el__butLink) {
			  // Создаём событие нажатия на кнопку
			  el__butLink.addEventListener('click', function() {
			    // Получаем ссылку на видео из адрибута
			    var str__video = el__butLink.getAttribute('data-video');
			    
			    // Воспроизводим видео
			    if (Hls.isSupported()) {
		  var video = document.getElementById('player');
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


            function wider() {
            document.getElementById("player-box").style.width = "calc(100% - 20px)";
}
		</script>
	<script type="text/javascript" src="../libs/jquery-3.7.1.min.js"></script>
</body>
</html>