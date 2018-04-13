<?php

require_once('forms/RegistrationFormClass.php');
require_once('bd.php');
require_once('PasswordClass.php');

$db_host = '127.0.0.1';
$db_user = 'root';
$db_password = '';
$db_name = 'users';

$msg = '';

$db = new DB($db_host, $db_user, $db_password, $db_name);
$form = new RegistrationForm($_POST);

if ($_POST) {
	if ($form->validate()) {
		$email = $db->escape($form->getEmail());
		$login = $db->escape($form->getlogin());
		$password = new Password($db->escape($form->getPassword()));

		$res = $db->query("SELECT * FROM users.reg WHERE email ='{$email}'");
		if ($res) {
			$msg = 'Этот пользователь уже зарегистрирован';
		} else {
			$db->query("INSERT INTO users.reg (email, password) VALUES ('{$email}','{$password}')");
			header('location: index.php?msg=You have been registered');
		}
	} else {
		$msg = $form->passwordsMatch() ? 'Пожалуйста, заполните все поля' : 'Пароли не совпадают';
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Регистрация</title>
</head>
<body>
	<h1>Регистрация нового пользователя</h1>

	<br/>
	<form method="post">
		Email: <input type='email' name='email' value='<?=$form->getEmail(); ?>'/> <br/><br/>
		Логин: <input type='text' name='login' value='<?=$form->getlogin(); ?>'/> <br/><br/>
		Пароль: <input type='password' name='password'/> <br/><br/>
		Подтвердите пароль: <input type='password' name='ConfirmPassword'/> <br/><br/>
		<input type='submit'/>
	<form/>

</body>
</html>