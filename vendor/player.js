document.querySelector('#play').onclick = play;
document.querySelector('#pause').onclick = pause;
document.querySelector('#volume').oninput = volume;

let video;
let display;
let progress;

video = document.querySelector('#player');
progress = document.querySelector('#progress');

video.ontimeupdate = progressUpdate;
progress.onclick = videoRewind;

function play(){
    video.play();
}

function pause(){
    video.pause();
}

function volume(){
    let v = this.value;
    video.volume = v/100
}

function progressUpdate(){
    console.log(video.duration);
    console.log(video.currentTime);

    let duration = video.duration;
    let currentTime = video.currentTime;

    progress.value = (100 * currentTime) / duration;
}

function videoRewind(){
    let width = this.offsetWidth;
    let position = event.offsetX;
    this.value = 100 * position / width;
    video.pause();
    video.currentTime = video.duration * (position / width);
    video.play();
}

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
        });
    });


    function wider() {
    document.getElementById("player-box").style.width = "calc(100% - 20px)";
}