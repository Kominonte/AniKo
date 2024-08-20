
// Авторизация

$('#login-btn').click(function() {

	let email = $('input[name="email"]').val(),
		password = $('input[name="password"]').val();

	$.ajax({
		url: '/auth/authorization',
		type: 'POST',
		dataType: 'text',
		data: {
			email: email,
			password: password
		},
		success: function(data){
			console.log(data);
		}
	})
})

// Регистрация

$('#register-btn').click(function() {

	let login = $('input[name="login"]').val(),
		email = $('input[name="email"]').val();
		password = $('input[name="password"]').val();
		secondPassword = $('input[name="second-password"]').val();

	$.ajax({
		url: 'vendor/authorization.php',
		type: 'POST',
		dataType: 'text',
		data: {
			login: login,
			email: email,
			password: password,
			secondPassword: secondPassword
		},
		success: function(data){
			console.log(data);
		}
	})
})