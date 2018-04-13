<?php
session_start();
require_once 'SessionClass.php';
?>

<h1><a href="reg.php">Регистрация</a></h1>

<?php if (Session::has('user')) : ?>
	<h1><a href="logout.php">Выход (<?=Session::get('user'); ?>)</a></h1>
<?php else : ?>
	<h1><a href="login.php">Авторизация</a></h1>
<?php endif; ?>

<h1><a href="admin.php">Админ панель</a></h1>

<br/>

<?=isset($_GET['msg']) ? $_GET['msg'] : '';?>