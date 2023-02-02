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



