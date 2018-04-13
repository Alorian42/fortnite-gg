<?php
session_start();
require_once 'SessionClass.php';

if (Session::has('user')){
	echo 'Привет, ' . Session::get('user');
} else {
	echo 'Закрытая территория! Немедленно покиньте её! :D';
}