
// Авторизация

$('#login-btn').click(function() {

	let email = $('input[name="email"]').val(),
		password = $('input[name="password"]').val();

		let dur = 0.5;

	if(!email){	
		$('#log-email').toggleClass('error');
		setTimeout(() => $('#log-email').removeClass('error'), dur * 1000);
		return;
	}

	if(!password){
		$('#log-password').toggleClass('error');
		setTimeout(() => $('#log-password').removeClass('error'), dur * 1000);
		return;
	}

	$.ajax({
		url: 'auth/authorization',
		type: 'POST',
		dataType: 'json',
		data: {
			email: email,
			password: password
		},
		success(response){
			console.log(response);

			$('.message').removeClass('er-message');

			
			if(response.email.status === false){
				$('.message').toggleClass('er-message');
				$('.message').text(response.email.message);
				$('.welcome-img').attr('src', '../assets/mascot/ups.webp');

				let dur = 0.5;
      			$('input[name="email"]').toggleClass('error');
      			setTimeout(() => $('input[name="email"]').removeClass('error'), dur * 1000);
				return;
			}

			if(response.password.status === false){
				$('.message').toggleClass('er-message');
				$('.welcome-img').attr('src', '../assets/mascot/ups.webp');	
				$('.message').text(response.password.message);

				let dur = 0.5;
      			$('input[name="password"]').toggleClass('error');
      			setTimeout(() => $('input[name="password"]').removeClass('error'), dur * 1000);
				return;
			}

			if(response.authorization === true){
				$('.message').removeClass('er-message');
				document.location.href = '/';
			}


		}
	})
})
// Регистрация

$('#register-btn').click(function() {

	let login = $('#reg-login').val(),
		email = $('#reg-email').val();
		password = $('#reg-password').val();
		secondPassword = $('#reg-conf-password').val();

	let dur = 0.5;

	if(!login){
		$('#reg-login').toggleClass('error');
		setTimeout(() => $('#reg-login').removeClass('error'), dur * 1000);
		return;
	}

	if(!email){
		$('#reg-email').toggleClass('error');
		setTimeout(() => $('#reg-email').removeClass('error'), dur * 1000);
		return;
	}

	if(!password){
		$('#reg-password').toggleClass('error');
		setTimeout(() => $('#reg-password').removeClass('error'), dur * 1000);
		return;
	}

	if(!secondPassword){
		$('#reg-conf-password').toggleClass('error');
		setTimeout(() => $('#reg-conf-password').removeClass('error'), dur * 1000);
		return;
	}

	$.ajax({
		url: 'auth/register',
		type: 'POST',
		dataType: 'json',
		data: {
			login: login,
			email: email,
			password: password,
			secondPassword: secondPassword
		},
		success: function(response){
			console.log(response);

			$('.message').removeClass('er-message');

			if(response.login.status === false){
				$('.message').toggleClass('er-message');
				$('.message').text(response.login.message);

				let dur = 0.5;
      			$('#reg-login').toggleClass('error');
      			setTimeout(() => $('#reg-login').removeClass('error'), dur * 1000);

				$('.welcome-img').attr('src', '../assets/mascot/ups.webp');	
				return;
			}

			if(response.email.status === false){
				$('.message').toggleClass('er-message');
				$('.message').text(response.email.message);
				$('.welcome-img').attr('src', '../assets/mascot/ups.webp');
				
				let dur = 0.5;
      			$('#reg-email').toggleClass('error');
      			setTimeout(() => $('#reg-email').removeClass('error'), dur * 1000);
				
				return;
			}

			if(response.password.status === false){
				$('.message').toggleClass('er-message');
				$('.message').text(response.password.message);
				$('.welcome-img').attr('src', '../assets/mascot/ups.webp');	

				let dur = 0.5;
      			$('#reg-conf-password').toggleClass('error');
      			setTimeout(() => $('#reg-conf-password').removeClass('error'), dur * 1000);

				return;
			}

			if(response.registration === true){
				$('.message').removeClass('er-message');

				$('#form-authorization').css('animation-name', 'authorization');
				$('#form-authorization').css('margin-top', '0px');

			}
		}
	})
})