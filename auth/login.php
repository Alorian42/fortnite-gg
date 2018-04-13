<?php
session_start(); 

require_once 'forms/LoginFormClass.php';
require_once 'bd.php';
require_once 'PasswordClass.php';
require_once 'SessionClass.php';

$db_host = 'localhost';
$db_user = 'root';
$db_password = '';
$db_name = 'users';

$msg = '';

$db = new DB($db_host, $db_user, $db_password, $db_name);
$form = new LoginForm($_POST);

if ($_POST) {
	if ($form->validate()){
		$email = $db->escape($form->getEmail());
		$password = new Password($db->escape($form->getPassword()));

		$res = $db->query("SELECT * FROM users.reg WHERE email = '{$email}' AND password = '{$password}' LIMIT 1");
		if (!$res){
			$msg = 'Пользователь не найден';
		} else {
			$user = $res[0]['email'];
			Session::set('user', $user);
			header('location: index.php?msg=You have been logged in');
		}
	} else {
		$msg = 'Пожалуйста, заполните поля';
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Авторизация</title>
</head>
<body>
	<h1>Авторизация</h1>

	<b><?=$msg; ?></b>
	<br/>
	<form method="post">
		Email: <input type='email' name='email' value='<?=$form->getEmail(); ?>'/> <br/><br/>
		Пароль: <input type='password' name='password'/> <br/><br/>
		<input type='submit'/>
	<form/>

</body>
</html>