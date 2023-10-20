<?php
	$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
	$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);

	

	$password = md5($password. "gfhtfght4243");

	$mysql = new mysqli('localhost', 'j91717ek_cactus', 'iRoxeee_902_arb', 'j91717ek_cactus');

	$result = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");
	$user = $result->fetch_assoc();
	if(count((array)$user) == 0) {
		echo "Такой пользователь не найден";
		exit();
	}

	setcookie('user', $user['name'], time() + 3600, "/");

	$mysql->close();

	header('Location: /auth.php');
?>