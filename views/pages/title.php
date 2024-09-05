<?php
use App\services\Component;

    // Пример использования cURL для отправки HTTP-запроса

    // Инициализация cURL-сессии
    $ch = curl_init();

    // Установка параметров запроса
    curl_setopt($ch, CURLOPT_URL, 'https://anilibria.top/api/v1/anime/releases/' . $_GET['name']);
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
        <video id="player" poster="https://anilibria.top/storage/releases/episodes/previews/9740/1/L6X9f6m0iK5eoaYu.jpg"></video>

        <button id="play">Play</button>
        <button id="pause">Pause</button>
        <input type="range" id="volume" min=0 max=100></input>
        <button onclick="wider()">На всю ширину</button>
        
        <div class="bar-box">
            <progress id="progress" max="100" value="0"></progress>
        </div>

        <div id="series-box">
            <?php
                foreach($response->episodes as $episodes){
            ?>
                <button class="but-link" data-img="https://anilibria.top/<?= $episodes->preview->src ?>" data-video="<?= $episodes->hls_720 ?>">Серия <?= $episodes->ordinal ?></button>
            <?php } ?>
            </div>
        </div>
        <aside id="sidebar">
            <img id="title-poster" src="https://anilibria.top<?= $response->poster->optimized->src ?>">
            <span id="title-name"><?= $response->name->main ?></span>
        </aside>
	</div>
    
    <script type="text/javascript" src="../vendor/player.js"></script>
	<script type="text/javascript" src="../libs/jquery-3.7.1.min.js"></script>
</body>
</html>