// Проверка пароля

function show_hide_password(target){
	var input = document.getElementById('password-input');
	if (input.getAttribute('type') == 'password') {
		target.classList.add('view');
		input.setAttribute('type', 'text');
	} else {
		target.classList.remove('view');
		input.setAttribute('type', 'password');
	}
	return false;
}

// Поиск

function viewDiv(){
  document.getElementById("search-box").style.display = "block";
  document.getElementById("blackout").style.display = "block";
  document.getElementById("body").style.overflow = "hidden";

};

function closeDiv(){
  document.getElementById("search-box").style.display = "none";
  document.getElementById("blackout").style.display = "none";
  document.getElementById("body").style.overflow = "visible";
};


// Описание
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.display === "block") {
      content.style.display = "none";
    } else {
      content.style.display = "block";
    }
    if (content.style.maxHeight){
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    }
  });
};


// Коментарии 

var textarea = document.getElementsByTagName('textarea')[0];

textarea.addEventListener('keydown', resize);

function resize() {
  var el = this;
  setTimeout(function() {
    el.style.cssText = 'height:auto; padding:0';
    el.style.cssText = 'height:' + el.scrollHeight + 'px';
  }, 1);
}


