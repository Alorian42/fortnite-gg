<?php
session_start();
require_once 'SessionClass.php';

Session::destroy();

header('Location: index.php?msg=You have been logged out');