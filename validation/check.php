<?php
	$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
	$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
	$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);
	
	if (mb_strlen($name) < 4 || mb_strlen($name) > 90) {
		echo "Недопустимая длина имени";
		exit();
	} else if(mb_strlen($login) < 5 || mb_strlen($login) > 40) {
		echo "Недопустимая длина логина";
		exit();
	} else if(mb_strlen($password) < 8 || mb_strlen($password) > 40) {
		echo "Недопустимая длина пароля";
		exit();
	}

	$password = md5($password. "gfhtfght4243");

	$mysql = new mysqli('localhost', 'j91717ek_cactus', 'iRoxeee_902_arb', 'j91717ek_cactus');
	$mysql->query("INSERT INTO `users` (`login`, `password`, `name`) VALUES('$login', '$password', '$name')");

	$mysql->close();

	header('Location: /auth.php');
?>