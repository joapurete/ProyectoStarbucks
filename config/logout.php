<?php
//Libs____________________________________________________________________________________________________________________________________________________________
require_once 'config.php';
//Logout__________________________________________________________________________________________________________________________________________________________
session_start();
unset($_SESSION['user']);
setcookie('id', '', time() - 100, '/');
setcookie('type', '', time() - 100, '/');
setcookie('mail', '', time() - 100, '/');
header('Location: ' . URL . 'Login/start');
//________________________________________________________________________________________________________________________________________________________________