
// Авторизация

$('#login-btn').click(function() {

	let email = $('input[name="email"]').val(),
		password = $('input[name="password"]').val();

	$.ajax({
		url: 'auth/authorization',
		type: 'POST',
		dataType: 'json',
		data: {
			email: email,
			password: password
		},
		success(data){
			console.log(data.message);
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
		url: 'vendor/authorization',
		type: 'POST',
		dataType: 'text',
		data: {
			login: login,
			email: email,
			password: password,
			secondPassword: secondPassword
		},
		success: function(data){
			alert(data);
		}
	})
})